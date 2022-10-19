<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup templates
 */

$theme_path = drupal_get_path('theme', variable_get('theme_default', NULL));

$default_year = 2019;

?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php if ((!$page && !empty($title)) || !empty($title_prefix) || !empty($title_suffix) || $display_submitted): ?>
  <header>
    <?php print render($title_prefix); ?>
    <?php if (!$page && !empty($title)): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if ($display_submitted): ?>
    <span class="submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </span>
    <?php endif; ?>
  </header>
  <?php endif; ?>
    
    
    
  <div class="edmtool2">

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab" id="trigger_ms">Member States</a></li>
        <li role="presentation"><a href="#industries" aria-controls="messages" role="tab" data-toggle="tab" id="trigger_indu">Industries</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">
            <div class="row">
                <div class="col-sm-12 col-md-6">

                    <div class="selector-msvar">
                        <label for="msvar">Indicator:</label>
                        <select class="form-control" name="msvar" id="msvar" >

                            <option value="ms_dm_euro" data-suffix="€" data-year="<?=$default_year;?>">Data Market Value by Member State (€)</option>
                            <option value="ms_dm_share" data-suffix="%" data-year="<?=$default_year;?>">Share of Data Market on ICT Spending By Member State (%)</option>
                            <option value="ms_de_sup_euro" data-suffix="€" data-year="<?=$default_year;?>">Data Economy Value by Member State (€)</option>
                            <option value="ms_de_sup_share" data-suffix="%" data-year="<?=$default_year;?>">Data Economy Value on GDP by Member State (%)</option>
                            <option value="ms_dp_unit" data-suffix="" data-year="<?=$default_year;?>">Number of Data Professionals by Member State (units)</option>
                            <option value="ms_dp_share" data-suffix="%" data-year="<?=$default_year;?>">Employment Share of Data Professionals by Member State (%)</option>
                            <option value="ms_dc_sup_unit" data-suffix="" data-year="<?=$default_year;?>">Number of Data Suppliers by Member State (units)</option>
                            <option value="ms_dc_sup_share" data-suffix="%" data-year="<?=$default_year;?>">Share of Data Suppliers of total J and M sectors (%)</option>
                            <option value="ms_dc_user_unit" data-suffix="" data-year="<?=$default_year;?>">Data Users by Member State (units)</option>
                            <option value="ms_dc_user_share" data-suffix="%" data-year="<?=$default_year;?>">Share of data users of Total EU companies by Member State (%)</option>
                            <option value="ms_dcr_euro" data-suffix="€" data-year="<?=$default_year;?>">Data Companies' Revenues by Member State (€)</option>
                            <option value="ms_dcr_share" data-suffix="%" data-year="<?=$default_year;?>">Share of DC Revenues on total revenues in J and M sectors (%)</option>
                        </select>
                    </div>
                    <div id="hmap" ></div>
                </div>

                <div class="col-sm-12 col-md-5 col-md-offset-1">

                    <div class="row">
                        <div class="table-line col-sm-6">
                            <h3>Data Market Value 
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Value of the Data Market in the EU28 (Millions of euro)"></i>
                            </h3>
                            <div class="tline" id="tline-ndata-market"></div>
                            <div class="ttab" id="ttab-ndata-market"></div>
                        </div>

                        <div class="table-line col-sm-6">
                            <h3>Share of Data Market on ICT Spending
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Share of Data Market on ICT Spending in EU28 (percentage of spending of data market on total ICT spending)"></i>
                            </h3>
                            <div class="tline" id="tline-ndata-ictspend"></div>
                            <div class="ttab" id="ttab-ndata-ictspend"></div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="table-line col-sm-6">
                            <h3>Data Economy Value 
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Value of the Data Economy in the EU28 (Millions of euro)"></i>
                            </h3>
                            <div class="tline" id="tline-ndata-ecoval"></div>
                            <div class="ttab" id="ttab-ndata-ecoval"></div>
                        </div>

                        <div class="table-line col-sm-6">
                            <h3>Data Economy impacts on GDP
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Data Economy Value Total impacts (percentage)"></i>
                            </h3>
                            <div class="tline" id="tline-ndata-dctotal"></div>
                            <div class="ttab" id="ttab-ndata-dctotal"></div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="table-line col-sm-6">
                            <h3>Data Professionals 
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Number of Data Professionals in EU28 (units)"></i>
                            </h3>
                            <div class="tline" id="tline-ndata-prof"></div>
                            <div class="ttab" id="ttab-ndata-prof"></div>
                        </div>

                        <div class="table-line col-sm-6">
                            <h3>Employment Share of Data Professionals
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Employment Share of Data Professionals in EU28 (percentage of unit of data professional on total employment)"></i>
                            </h3>
                            <div class="tline" id="tline-ndata-empshare"></div>
                            <div class="ttab" id="ttab-ndata-empshare"></div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="table-line col-sm-6">
                            <h3>Data Suppliers
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Number of Data Suppliers in EU28 (units)"></i>
                            </h3>
                            <div class="tline" id="tline-ndata-supp"></div>
                            <div class="ttab" id="ttab-ndata-supp"></div>
                        </div>

                        <div class="table-line col-sm-6">
                            <h3>Share of Data Suppliers on Total J and M Sectors
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Number of Data Suppliers in EU28 (units)"></i>
                            </h3>
                            <div class="tline" id="tline-ndata-sharedatasuppjs"></div>
                            <div class="ttab" id="ttab-ndata-sharedatasuppjs"></div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="table-line col-sm-6">
                            <h3>Data Users 
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Number of Data Users in EU28 (units)"></i>
                            </h3>
                            <div class="tline" id="tline-ndata-users"></div>
                            <div class="ttab" id="ttab-ndata-users"></div>
                        </div>

                        <div class="table-line col-sm-6">
                            <h3>Share of data users of total EU Companies
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Share of data users of total EU Companies"></i>
                            </h3>
                            <div class="tline" id="tline-ndata-shareusercomp"></div>
                            <div class="ttab" id="ttab-ndata-shareusercomp"></div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="table-line col-sm-6">
                            <h3>Data Companies Revenues
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Data Companies Revenues in EU28 (Millions of euro)"></i>
                            </h3>
                            <div class="tline" id="tline-ndata-comprev"></div>
                            <div class="ttab" id="ttab-ndata-comprev"></div>
                        </div>

                        <div class="table-line col-sm-6">
                            <div class="h3-cont"><h3>Share of Data Companies Revenues
                                    <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                       title=""></i>
                                </h3></div>
                            <div class="tline" id="tline-ndata-sharedcjs"></div>
                            <div class="ttab" id="ttab-ndata-sharedcjs"></div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div id="placeholder-gap-ms" style="width: 100%; height: 600px;"></div>
                </div>
            </div>

        </div>
        <div role="tabpanel" class="tab-pane fade" id="industries">
            <div class="row">
                <div class="col-sm-12 col-md-7">

                    <div class="selector-msvar">
                        <label for="msvar">Indicator:</label>
                        <select class="form-control" name="induvar" id="induvar">
                            <option value="indu_dm_euro" data-suffix="€">Data Market Value by Industry (€)</option>
                            <!--<option value="indu_dm_spend_euro">ICT Spending by Industry (€)</option>-->
                            <option value="indu_dm_share" data-suffix="%">Share of Data Market by Industry (%)</option>
                            <option value="indu_dc_user_unit" data-suffix="">Number of Data Users by Industry (units)</option>
                            <option value="indu_dc_user_share" data-suffix="%">Data Users' Share on Total EU Companies by Industry (%)</option>
                            <option value="indu_dp_unit" data-suffix="">Number of Data Professionals by Industry (units)</option>
                            <option value="indu_dp_share" data-suffix="%">Employment Share of Data Professionals by Industry (%)</option>
                        </select>
                    </div>

                    <div id="indu-container" class="row">
                        <div id="indu-cont-0" class="indu-graph col-sm-6 col-md-4"></div>
                        <div id="indu-cont-1" class="indu-graph col-sm-6 col-md-4"></div>
                        <div id="indu-cont-2" class="indu-graph col-sm-6 col-md-4"></div>
                        <div id="indu-cont-3" class="indu-graph col-sm-6 col-md-4"></div>
                        <div id="indu-cont-4" class="indu-graph col-sm-6 col-md-4"></div>
                        <div id="indu-cont-5" class="indu-graph col-sm-6 col-md-4"></div>
                        <div id="indu-cont-6" class="indu-graph col-sm-6 col-md-4"></div>
                        <div id="indu-cont-7" class="indu-graph col-sm-6 col-md-4"></div>
                        <div id="indu-cont-8" class="indu-graph col-sm-6 col-md-4"></div>
                        <div id="indu-cont-9" class="indu-graph col-sm-6 col-md-4"></div>
                        <div id="indu-cont-10" class="indu-graph col-sm-6 col-md-4"></div>
                        <div id="indu-cont-11" class="indu-graph col-sm-6 col-md-4"></div>
                    </div>
                    <div id="test-indu"></div>

                </div>
                <div class="col-sm-12 col-md-5">

                    <div class="row">
                        <div class="table-line col-sm-6">
                            <h3>Data Market Value 
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Value of the Data Market in the EU28 (Millions of euro)"></i>
                            </h3>
                            <div class="tline" id="tline-indu-market"></div>
                            <div class="ttab" id="ttab-indu-market"></div>
                        </div>

                        <div class="table-line col-sm-6">
                            <h3>Share of Data Market on ICT Spending
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Share of Data Market on ICT Spending in EU28 (percentage of spending of data market on total ICT spending)"></i>
                            </h3>
                            <div class="tline" id="tline-indu-ictspend"></div>
                            <div class="ttab" id="ttab-indu-ictspend"></div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="table-line col-sm-6">
                            <h3>Data Economy Value 
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Value of the Data Economy in the EU28 (Millions of euro)"></i>
                            </h3>
                            <div class="tline" id="tline-indu-ecoval"></div>
                            <div class="ttab" id="ttab-indu-ecoval"></div>
                        </div>

                        <div class="table-line col-sm-6">
                            <h3>Data Economy impacts on GDP
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Data Economy Value Total impacts as a percentage on GDP"></i>
                            </h3>
                            <div class="tline" id="tline-indu-dctotal"></div>
                            <div class="ttab" id="ttab-indu-dctotal"></div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="table-line col-sm-6">
                            <h3>Data Professionals 
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Number of Data Professionals in EU28 (units)"></i>
                            </h3>
                            <div class="tline" id="tline-indu-prof"></div>
                            <div class="ttab" id="ttab-indu-prof"></div>
                        </div>

                        <div class="table-line col-sm-6">
                            <h3>Employment Share of Data Professionals
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Employment Share of Data Professionals in EU28 (percentage of unit of data professional on total employment)"></i>
                            </h3>
                            <div class="tline" id="tline-indu-empshare"></div>
                            <div class="ttab" id="ttab-indu-empshare"></div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="table-line col-sm-6">
                            <h3>Data Suppliers
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Number of Data Suppliers in EU28 (units)"></i>
                            </h3>
                            <div class="tline" id="tline-indu-supp"></div>
                            <div class="ttab" id="ttab-indu-supp"></div>
                        </div>

                        <div class="table-line col-sm-6">
                            <h3>Share of Data Suppliers on Total J and M Sectors
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Share of data suppliers as a percentage on total companies in sectors J and M"></i>
                            </h3>
                            <div class="tline" id="tline-indu-sharedatasuppjs"></div>
                            <div class="ttab" id="ttab-indu-sharedatasuppjs"></div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="table-line col-sm-6">
                            <h3>Data Users 
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Number of Data Users in EU28 (units)"></i>
                            </h3>
                            <div class="tline" id="tline-indu-users"></div>
                            <div class="ttab" id="ttab-indu-users"></div>
                        </div>

                        <div class="table-line col-sm-6">
                            <h3>Share of data users of total EU Companies
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Share of data users of total EU Companies"></i>
                            </h3>
                            <div class="tline" id="tline-indu-shareusercomp"></div>
                            <div class="ttab" id="ttab-indu-shareusercomp"></div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="table-line col-sm-6">
                            <h3>Data Companies Revenues
                                <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                   title="Data Companies Revenues in EU28 (Millions of euro)"></i>
                            </h3>
                            <div class="tline" id="tline-indu-comprev"></div>
                            <div class="ttab" id="ttab-indu-comprev"></div>
                        </div>

                        <div class="table-line col-sm-6">
                            <div class="h3-cont"><h3>Share of Data Companies Revenues
                                    <i class="glyphicon glyphicon-info-sign icon-right" data-toggle="tooltip" data-placement="auto top" 
                                       title="Share of data companies revenues as a percentage on total companies generated in sectors J and M"></i>
                                </h3></div>
                            <div class="tline" id="tline-indu-sharedcjs"></div>
                            <div class="ttab" id="ttab-indu-sharedcjs"></div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div id="placeholder-gap-indu" style="width: 100%; height: 600px;"></div>
                </div>
            </div>
        </div>

    </div>
</div>
    
    <div id="dataviz-notes">
        <h4 style="border-bottom: 1px solid #DDD;">Notes</h4>
        <ol style="padding-left: 16px;">
        <li>Since Brexit is now definitive (as of July 2020), 
            the authors provided an overview of data for EU27 plus the U.K. until 
            2019, and for the remaining months data are displayed for 
            EU27 in the <a href="http://datalandscape.eu/sites/default/files/report/EDM_D2_9_Data_Set_09062020.xlsx">Final Study report Dataset</a>. 
            For the purpose of continuity, the data displayed in the 
            datalandscape refers to EU28.</li>
        <li>An additional post-Covid-impact scenario with estimates on the Data 
            Market and the Data Economy in 2020 and in 2025 for the EU27 has 
            been specifically developed and included in the 
            <a href="http://datalandscape.eu/sites/default/files/report/EDM_D2_9_Data_Set_09062020.xlsx">Final Study report Dataset</a>.
        </li>
        </ol>
    </div>
    
    
    
  <?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
    print render($content);
  ?>
    
    
    
    
  <?php
    // Only display the wrapper div if there are tags or links.
    $field_tags = render($content['field_tags']);
    $links = render($content['links']);
    if ($field_tags || $links):
  ?>
   <footer>
     <?php print $field_tags; ?>
     <?php print $links; ?>
   </footer>
    <?php endif; ?>
  <?php print render($content['comments']); ?>
</article>
