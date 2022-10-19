<?php
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or
 *   'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see bootstrap_preprocess_html()
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */

$theme_path = drupal_get_path('theme', variable_get('theme_default', NULL));


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces;?>>
<head profile="<?php print $grddl_profile; ?>">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  
  <link href="<?=$theme_path;?>/edmassets/gapms-bubble/libs/vizabi.css" rel="stylesheet" type="text/css" >
  <link href="<?=$theme_path;?>/edmassets/gapms-bubble/libs/bubblechart.css" rel="stylesheet" type="text/css">
  <link href="<?=$theme_path;?>/edmassets/css/edmtool.css" rel="stylesheet" type="text/css">
  
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div id="wrap">
  <div id="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
  </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/4.13.0/d3.min.js"></script>
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <!--<script src="https://code.highcharts.com/maps/modules/exporting.js"></script>-->
    <!--<script src="https://code.highcharts.com/mapdata/custom/european-union.js"></script>-->
    <script src="<?=$theme_path;?>/edmassets/js/european-union.js"></script>
    <script src="<?=$theme_path;?>/edmassets/js/libedm.js"></script>

    <script src="<?=$theme_path;?>/edmassets/gapms-bubble/libs/vizabi.js"></script>
    <script src="<?=$theme_path;?>/edmassets/gapms-bubble/libs/bubblechart.js"></script>

    <script src="<?=$theme_path;?>/edmassets/gapms-bubble/libs/vizabi-ddfcsv-reader.js"></script>
    <script src="<?=$theme_path;?>/edmassets/gapms-bubble/config.js"></script>
    <script src="<?=$theme_path;?>/edmassets/gapms-bubble/config-indu.js"></script>

    <script src="<?=$theme_path;?>/edmassets/js/edm.js"></script>
    <script src="<?=$theme_path;?>/edmassets/js/copygraph.js"></script>
</body>
</html>
