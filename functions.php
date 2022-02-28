<?php
    // Chargement des styles et des scripts Bootstrap sur WordPress
    function wpbootstrap_styles_scripts(){
        wp_enqueue_style('style', get_stylesheet_uri());
        wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
        wp_enqueue_script('jquery');
        wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), 1, true);
        wp_enqueue_script('boostrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery', 'popper'), 1, true);
    }
    add_action('wp_enqueue_scripts', 'wpbootstrap_styles_scripts');


    function wpbootstrap_after_setup_theme() {
        // On ajoute un menu
        register_nav_menu('header_menu', "Menu du header");
        // On ajoute une classe php permettant de gérer les menus Bootstrap
        require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
    }
    add_action('after_setup_theme', 'wpbootstrap_after_setup_theme');

    // On ajoute une sidebar
    function wpbootstrap_sidebar() {
        register_sidebar([
            'name'          => "Sidebar principale",
            'id'            => 'main-sidebar',
            'description'   => "La sidebar principale",
            'before_widget' => '<div id="%1$s" class="widget %2$s p-4">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title font-italic">',
            'after_title'   => '</h4>',
        ]);
    }
    add_action('widgets_init', 'wpbootstrap_sidebar');

    // On ajoute un menu
    function wpbootstrap_header_menu() {
       register_nav_menu('header_menu', "Menu du header");
       // On ajoute une classe php permettant de gérer les menus Bootstrap
       require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
       // On ajoute le support du html5 pour les listes de commentaires
       add_theme_support('html5', array('comment-list'));
    }
    add_action('after_setup_theme', 'wpbootstrap_header_menu');
?>
