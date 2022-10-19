<?php

class Datalandscape_Geocoder {

    public static function google_get($_address, $lang='en', $API_KEY='') {
    
        $address = urlencode($_address);
        // $url =  "https://maps.googleapis.com/maps/api/geocode/json?address=$address&key=$API_KEY";
        $url =  "https://maps.googleapis.com/maps/api/geocode/json?address=$address&language=$lang";
        
        $url.= ($API_KEY != '') ? '&key='.$API_KEY : '';

        $data = file_get_contents($url);
        
        return $data;
    }
    
    public static function parse_json_response($json_string) {
        
        $address = new stdClass();
        
        $o = json_decode($json_string);
        
        if(isset($o->status) && $o->status == 'OK') {
        
            $add_comp = (isset($o->results[0]->address_components)) ? $o->results[0]->address_components : null;

            $address->number = self::get_attribute('street_number', $add_comp);
            $address->route = self::get_attribute('route', $add_comp);
            $address->locality = self::get_attribute('locality', $add_comp);
            $address->postal_town = self::get_attribute('postal_town', $add_comp);
            $address->country = self::get_attribute('country', $add_comp);
            $address->country_code = self::get_attribute('country', $add_comp, 'short_name');
            $address->postal_code = self::get_attribute('postal_code', $add_comp);
            $address->formatted_address = $o->results[0]->formatted_address;
            $address->lat = $o->results[0]->geometry->location->lat;
            $address->lng = $o->results[0]->geometry->location->lng;
            $address->confidence = $o->results[0]->geometry->location_type;

            return $address; 
        }
        else{
            return false;
        }
    }
    
    private static function get_steet_number($a) {
        
       return self::get_attribute('street_number', $a);
    }
    
    private static function get_attribute($name, $a, $type='long_name') {
        
        foreach($a as $k=>$v) {
            if(in_array($name, $v->types)) {
                return $v->{$type};
            }
        } 
        
        return null;
    }
    
}
