<?php
define('ASSETS_VERSION','1');

/**
 * Enqueue scripts and styles that are used on every page
 * Dequeue unused scripts and styles
 */
function themeFiles() {
    wp_deregister_script('jquery');
    wp_dequeue_style('wp-block-library');
    
    wp_register_style('style', get_stylesheet_directory_uri() . '/assets/css/main.min.css', array(), ASSETS_VERSION, 'screen');
    wp_enqueue_style('style');

    wp_register_script('jQuery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), ASSETS_VERSION, true);
    wp_enqueue_script('jQuery');

    wp_register_style('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), ASSETS_VERSION, 'screen');
    wp_enqueue_style('slick');

    wp_register_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jQuery'), ASSETS_VERSION, true);
    wp_enqueue_script('slick');

    wp_register_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js', array(), ASSETS_VERSION, true);
    wp_enqueue_script('gsap');

    wp_register_script('observer', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/Observer.min.js', array('gsap'), ASSETS_VERSION, true);
    wp_enqueue_script('observer');

    wp_register_script('scrollTrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js', array('gsap'), ASSETS_VERSION, true);
    wp_enqueue_script('scrollTrigger');

    wp_register_script('javascript', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jQuery', 'slick', 'scrollTrigger', 'observer', 'gsap'), ASSETS_VERSION, true);
    wp_enqueue_script('javascript');

    enqueueTargetAssets(getTargetType());
}
add_action('wp_enqueue_scripts', 'themeFiles');

/**
 * Define pages that don't have template slug
 */
function getTargetType() {
    if ( is_front_page() ) {
        return "home";
    }

    return str_replace(".php", "", basename(get_page_template_slug()));
}

/**
 * Set array of files (CSS & JS) that are used on pages
 */
function enqueueTargetAssets($page) {
    $pageAssetsConfig = (object) array(
        "home" => ["javascripts" => [], "css" => ["home.min.css"], "type" => "page", "concat" => true]
    );

    if (property_exists($pageAssetsConfig, $page)) {
        $config = (object) $pageAssetsConfig->{$page};

        for ($i = 0; $i < count($config->javascripts); $i++) {
            $handle = "pl-js-{$page}-$i";
            wp_register_script($handle, get_stylesheet_directory_uri() . "/assets/js/pages/{$config->javascripts[$i]}", array(), ASSETS_VERSION, true);
            wp_enqueue_script($handle);
            if ($config->concat === false) {
                add_filter('js_do_concat', function ($do_concat, $handle) {
                if ($config->concat === false) {
                    return false;
                }
                return $do_concat;
                }, 10, 2);
            }
        }

        for ($i = 0; $i < count($config->css); $i++) {
            $handle = "pl-css-{$page}-$i";
            wp_register_style($handle, get_stylesheet_directory_uri() . "/assets/css/{$config->css[$i]}", array(), ASSETS_VERSION, "screen");
            wp_enqueue_style($handle);
            if ($config->concat === false) {
                add_filter('css_do_concat', function () {
                    return false;
                });
            }
        }
    }
}

function deleteJsAndCssEnqueueTargetAssetFromConcatenatedBundle($handle) {
    return false;
}

/**
 * Functions that call the files that the modules depend on
 */

function loadLibsScriptsForTemplate($file) {
    wp_register_script($file, get_stylesheet_directory_uri() . '/assets/lib/' . $file, array(), ASSETS_VERSION, true);
    wp_enqueue_script($file);
}

function loadModulesScriptsForTemplate($file) {
    wp_register_script($file, get_stylesheet_directory_uri() . '/assets/js/page-modules/' . $file, array(), ASSETS_VERSION, true);
    wp_enqueue_script($file);
}

function loadModulesCssForTemplate($file) {
    wp_register_style($file, get_stylesheet_directory_uri() . "/assets/css/" . $file, array(), ASSETS_VERSION, "screen");
    wp_enqueue_style($file);
}