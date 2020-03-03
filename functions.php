<?php

    if ( ! isset( $content_width ) ) {
        $content_width = 1280;
    }

    add_filter('jpeg_quality', function($arg){return 95;});
 
    if ( ! function_exists( 'kismet_setup' ) ) {
        function kismet_setup() {
        
            /**
             * Make theme available for translation.
             * Translations can be placed in the /languages/ directory.
             */
            load_theme_textdomain( 'kismet', get_template_directory() . '/languages' );
        
            /**
             * Add support for two custom navigation menus.
             */
            register_nav_menus( array(
                'main'   => __( 'Main Menu', 'kismet' )
            ) );

            /**
             * Enable support for post thumbnails and featured images.
             */
            add_theme_support( 'post-thumbnails' );

            /**
             * Add Custom Image Sizes
             */
            add_image_size( 'gallery', 1000, 500 );
            add_image_size( 'plans', 1100, 380 );

        }
    }
    add_action( 'after_setup_theme', 'kismet_setup' );

    function enqueue_stuff() {
        wp_enqueue_style( 'normalize', get_template_directory_uri() . '/assets/normalize.css', array(), '8.0.1', 'all');
        wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Roboto:300,300i,700,700i&display=swap', array(), '1.0', 'all');
        wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/slick-1.8.1/slick/slick.css', array(), '1.8.1', 'all');
        wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/slick-1.8.1/slick/slick-theme.css', array(), '1.8.1', 'all');
        wp_enqueue_style( 'style', get_stylesheet_uri() );

        wp_deregister_script('jquery');

        wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-1.11.0.min.js', array(), null, true);
        wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/slick-1.8.1/slick/slick.min.js', array(), '1.8.1', true);
        wp_enqueue_script( 'kismet', get_template_directory_uri() . '/assets/kismet.js', array(), '1.0', true); 
    }

    add_action( 'wp_enqueue_scripts', 'enqueue_stuff' ); 

?>