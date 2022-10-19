<?php

function _reparse_event($event){
    
    $o = new stdClass();
    $o->uid=$event->uid['value'];
    $o->url=$event->url['value'];
    $o->title=$event->summary['value'];
    $o->location=$event->location['value'];
    $o->geo=$event->geo['value'];
    $o->dstart= sprintf("%04d-%02d-%02d", 
            $event->dtstart['value']['year'], 
            $event->dtstart['value']['month'], 
            $event->dtstart['value']['day']);
    $o->dtend= sprintf("%04d-%02d-%02d", 
            $event->dtend['value']['year'], 
            $event->dtend['value']['month'], 
            $event->dtend['value']['day']);
    $d = explode('\n', $event->description[0]['value']);
    $o->description=$d[0];
    
    return json_encode($o);
}

$xml = simplexml_load_file("./test.xml");
var_dump($xml);

foreach($xml as $record){
    print_r($record);
}


$ical_url = "http://lanyrd.com/topics/big-data/in/europe/big-data-in-europe.ics";

require_once '../../../libraries/iCalcreator/iCalcreator.class.php';

$config = array( "unique_id" => "datalandscape.eu" );
$v = new vcalendar( $config );
$v->setConfig( "url", $ical_url );
  // iCalcreator also support remote files
$v->parse();

foreach($v->components as $event){
    print_r($event);
    print reparse_event($event);
    break;
}

