<?php
require("config.php");

$current_theme = isset($_GET['theme']) ? $_GET['theme'] : '';
$theme_found = false;

include('theme_list.php');

if (!isset($redirect)) :
    foreach ($theme_array as $i => $theme) {
        $theme_config = array_merge([
            'id' => 'Untitled',
            'url' => 'https://zootemplate.com',
            'docs' => '#',
            'purchase' => '#',
            'responsive' => 'yes',
            'thumb' => '',
            'type' => 'wordpress-theme',
        ], $theme);
        if ($theme['id'] == $current_theme) {
            $current_theme_name = ucfirst($theme_config['id']);
            $current_theme_url = $theme_config['url'];
            $current_theme_docs_url = $theme_config['docs'];
            $current_theme_purchase_url = $theme_config['purchase'];
            $responsive = $theme_config['responsive'];
            $theme_found = true;
        }
    }
    if ($theme_found == false) {
        $current_theme_name = ucfirst($theme_array[0]['id']);
        $current_theme_url = $theme_array[0]['url'];
        $current_theme_docs_url = $theme_array[0]['docs'];
        $current_theme_purchase_url = $theme_array[0]['purchase'];
        $responsive = $theme_array[0]['responsive'];
    }
    ?>
    <!doctype html>
    <html>
    <head>
        <title><?php if ($theme_found == false) {
                echo $description;
            } else {
                echo $current_theme_name;
            } ?></title>

        <!-- meta -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="<?php echo $author; ?>">
        <meta name="description" content="<?php echo $description; ?>">

        <link href="assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon"/>

        <link rel="stylesheet" href="assets/slick/slick.css"/>
        <link rel="stylesheet" href="assets/clever-font/style.css"/>
        <link rel="stylesheet" href="assets/css/styles.css" media="all"/>

        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/slick/slick.min.js"></script>
        <script type="text/javascript" src="assets/js/application.js"></script>
    </head>

    <body>
    <!-- push div to control slideout -->


    <!-- main wrapper -->
    <div id="wrapper">

        <!-- theme switcher bar -->
        <div id="switcher">
            <div class="wrap-left">
                <!-- logo -->
                <a class="logo" href="<?php echo $site_url; ?>" title="<?php echo $author; ?>">
                    <img src="assets/img/logo.png" alt="<?php echo $author; ?>"/>
                </a>
                <!-- /logo -->
                <div class="choose-theme">
                    <a class="themes-open" href="javascript:void(0)"><?php echo $current_theme_name;?><i
                                class="cs-font clever-icon-down"></i></a>
                    <?php
                    $number_item = floor(count($theme_array) / 4);
                    if (count($theme_array) % 4) {
                        $number_item += 1;
                    }

                    ?>
                    <div class="theme-list">
                        <ul class="wrap-theme-list">
                            <?php foreach ($theme_array as $i => $theme) : ?>
                                <li class="type-<?php echo $theme['type'] ?>">
                                    <a href="?theme=<?php echo $theme['id']; ?>"
                                       rel="<?php echo $theme['url']; ?>,<?php echo $theme['purchase']; ?>">
                                        <span class="theme-name"> <?php echo isset($theme['title']) ? $theme['title'] : $theme['id']; ?></span>
                                        <span class="item-tag <?php echo $theme['type']; ?>"> <?php echo ucwords(str_replace('-', ' ', $theme['type'])); ?></span>
                                        <?php if ($theme['thumb'] != '') { ?>
                                            <span class="theme-thumb"><img src="<?php echo $theme['thumb']; ?>"
                                                                           alt="Theme Thumbnail"/></span>
                                        <?php } ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- preview thumbnails -->
                    <img id="preview" src="" alt="Preview"/>
                    <!-- /preview thumbnails -->
                    <!-- slideout theme switcher -->
                </div>

                <!-- /theme selector toggle -->
            </div>

            <!-- responsive theme preview icons -->
            <div id="responsive" class="right">
                <ul>
                    <li><a href="javascript:void(0)" class="d" title="Desktop View"><img
                                    src="assets/img/icon-desktop.png" alt="Desktop"/></a></li>
                    <li><a href="javascript:void(0)" class="t" title="Tablet View"><img src="assets/img/icon-tablet.png"
                                                                                        alt="Tablet"/></a></li>
                    <li><a href="javascript:void(0)" class="m" title="Mobile View"><img src="assets/img/icon-mobile.png"
                                                                                        alt="Mobile"/></a></li>
                </ul>
            </div>
            <!-- /responsive theme preview icons -->

            <!-- purchase / close frame buttons -->
            <ul class="right list-action-links">
                <li class="support-link"><a href="<?php echo $support_url ?>"><i class="cs-font clever-icon-help"></i>
                        Support</a></li>
                <li class="docs-link"><a href="<?php echo $current_theme_docs_url ?>"><i
                                class="cs-font clever-icon-tab"></i> Documentation</a></li>
                <li class="purchase" rel="<?php echo $current_theme_purchase_url; ?>">
                    <a href="<?php echo $current_theme_purchase_url; ?>" target="_blank" title="Purchase Theme">
                        <i class="cs-font clever-icon-cart-10"></i> Purchase Now
                    </a>
                </li>
                <li class="remove_frame" rel="<?php echo $current_theme_url; ?>">
                    <a href="<?php echo $current_theme_url; ?>" title="Remove Frame"><i
                                class="cs-font clever-icon-up"></i></a>
                </li>
            </ul>
            <ul class="right list-action-links stick-button">
                <li class="purchase" rel="<?php echo $current_theme_purchase_url; ?>">
                    <a href="<?php echo $current_theme_purchase_url; ?>" target="_blank" title="Purchase Theme">
                        <i class="cs-font clever-icon-cart-10"></i>
                    </a>
                </li>
                <li class="remove_frame" rel="<?php echo $current_theme_url; ?>">
                    <a href="<?php echo $current_theme_url; ?>" title="Remove Frame"><i
                                class="cs-font clever-icon-down"></i></a>
                </li>
            </ul>
            <!-- /purchase / close frame buttons -->

        </div>
        <!-- /theme switcher -->

    </div>
    <!-- /main wrapper -->

    <!-- iframe wrapper that loads theme preview -->
    <div id="frame_wrapper" class="loading">
        <iframe id="iframe" src="<?php echo $current_theme_url; ?>" frameborder="0" width="100%"></iframe>
        <div class="wrap-loader">
            <div class="cube-wrapper">
                <div class="cube-folding">
                    <span class="leaf1"></span>
                    <span class="leaf2"></span>
                    <span class="leaf3"></span>
                    <span class="leaf4"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- /iframe wrapper that loads theme preview -->

    </body>
    </html>
<?php endif; ?>
