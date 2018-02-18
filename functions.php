<?php 

    add_theme_support( 'post-thumbnails' );

    function mais_custom_header_setup() {

        add_theme_support( 'custom-header', apply_filters( 'mais_custom_header', array(
            'default-image' => get_parent_theme_file_uri( '/assets/images/header-background.jpg' ),
            'width' => 3000,
            'height' => 2000,
            'flex-height' => true
        ) ) );

        register_default_headers( array(

            'default-image' => array(
                'url' => '%s/assets/images/header-background.jpg',
                'thumbnail_url' => '%s/assets/images/header-background.jpg',
                'description' => __( 'Default Headere Image', 'maisawesomeblog' )
            )

        ) );

    }
    add_action( 'after_setup_theme', 'mais_custom_header_setup' );

    function mais_header_image_tag( $html, $header, $attr ) {
        if ( isset( $attr['sizes'] ) ) {
            $html = str_replace( $attr['sizes'], '100vw', $html );
        }
        return $html;
    }
    add_filter( 'get_header_image_tag', 'mais_header_image_tag', 10, 3 );


    function mais_theme_assets() {

        wp_enqueue_style( 'maisawesomeblog-style', get_stylesheet_uri() );
        wp_enqueue_style( 'mais-theme', get_theme_file_uri( '/assets/css/styles.css' ), array( 'maisawesomeblog-style' ), '1.0' );

        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'http://code.jquery.com/jquery-3.3.1.min.js', false, '3.3.1' );

        wp_scripts()->add_data( 'jquery', 'group', 1 );
        wp_scripts()->add_data( 'jquery-core', 'group', 1 );
        wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

        wp_enqueue_script( 'tooltip', get_template_directory_uri() . '/js/dist/jquery.mais-tooltip.js', array( 'jquery' ), '', true );

    }
    add_action( 'wp_enqueue_scripts', 'mais_theme_assets' );

?>