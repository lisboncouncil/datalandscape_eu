<?php

/**
 * @file
 * template.php
 */
function datalandscape01_preprocess_html(&$variables) {
  drupal_add_css(
    '//fonts.googleapis.com/css?family=PT+Sans Narrow:400,700',
    array('type' => 'external')
  );
  drupal_add_css(
    '//fonts.googleapis.com/css?family=PT+Sans:400,700',
    array('type' => 'external')
  );
  
  // add in a hook_init or preprocess function
  $path = drupal_get_path('theme', variable_get('theme_default', NULL));
  drupal_add_js(array(
    'edmtool' => array(
      'path' => $path,
    ),
  ), 'setting');
  
}

function datalandscape01_status_messages($variables){
  $display = $variables['display'];
  $output = '';

  $status_heading = array(
    'status' => t('Status message'),
    'error' => t('Error message'),
    'warning' => t('Warning message'),
  );
  foreach (drupal_get_messages($display) as $type => $messages) {
    $output .= "<div class=\"messages $type\">\n";
    if (!empty($status_heading[$type])) {
      $output .= '<h2 class="element-invisible">' . $status_heading[$type] . "</h2>\n";
    }
    if (count($messages) > 1) {
      $output .= " <ul>\n";
      foreach ($messages as $message) {
        $output .= '  <li>' . $message . "</li>\n";
      }
      $output .= " </ul>\n";
    }
    else {
      $output .= reset($messages);
    }
    $output .= "</div>\n";
  }
  return $output;
}