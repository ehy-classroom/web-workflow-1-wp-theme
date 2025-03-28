<?php

function web_workflow_enqueue_styles() {
    wp_enqueue_style('web-workflow-style', get_stylesheet_uri());
    wp_enqueue_style('inter-font', 'https://rsms.me/inter/inter.css', array(), null);
}
add_action('wp_enqueue_scripts', 'web_workflow_enqueue_styles');

function web_workflow_register_menus() {
    register_nav_menus(array(
        'main-nav' => __('Main Navigation', 'textdomain'),
        'secondary-nav' => __('Secondary Navigation', 'textdomain'),
        'mobile-nav' => __('Mobile Navigation', 'textdomain'),
    ));
}
add_action('init', 'web_workflow_register_menus');

function web_workflow_register_widget_areas() {
    register_sidebar(array(
        'name'          => __('Header Widgets', 'textdomain'),
        'id'            => 'header-widgets',
        'description'   => __('Widgets im Header-Bereich.', 'textdomain'),
        'before_widget' => '<div class="widget header-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Sidebar', 'textdomain'),
        'id'            => 'sidebar',
        'description'   => __('Widgets in der Seitenleiste.', 'textdomain'),
        'before_widget' => '<div class="widget sidebar-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widgets', 'textdomain'),
        'id'            => 'footer-widgets',
        'description'   => __('Widgets im Footer-Bereich.', 'textdomain'),
        'before_widget' => '<div class="widget footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'web_workflow_register_widget_areas');

function web_workflow_theme_setup() {
    // Unterstützung für Beitragsbilder
    add_theme_support('post-thumbnails');

    // Unterstützung für den Titel-Tag
    add_theme_support('title-tag');

    // Unterstützung für HTML5-Markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Unterstützung für benutzerdefinierte Logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Unterstützung für automatische Feed-Links
    add_theme_support('automatic-feed-links');

    // Unterstützung für Block-Editor-Stile
    add_theme_support('wp-block-styles');

    // Unterstützung für Editor-Stile
    add_theme_support('editor-styles');
    add_editor_style('style.css');
}
add_action('after_setup_theme', 'web_workflow_theme_setup');


