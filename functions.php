<?php 

    add_theme_support( 'post-thumbnails' );

    function mais_custom_header_setup() {

        add_theme_support( 'custom-header', apply_filters( 'mais_custom_header', array(
            'default-image' => get_parent_theme_file_uri( '/assets/images/header-background.png' ),
            'width' => 3000,
            'height' => 2000,
            'flex-height' => true
        ) ) );

        register_default_headers( array(

            'default-image' => array(
                'url' => '%s/assets/images/header-background.png',
                'thumbnail_url' => '%s/assets/images/header-background.png',
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

    function mais_customize_register( $wp_customize ) {
        
        $wp_customize->add_section( 'theme_options', array(
            'title'    => __( 'Theme Options', 'mais-awesome-theme' ),
            'priority' => 130
        ) );

        $wp_customize->add_setting( 'author_email', array(
            'default' => '',
            'transport' => 'postMessage'
        ) );

        $wp_customize->add_control( 'author_email', array(
            'label' => __( 'Author Email', 'mais-awesome-theme' ),
            'section' => 'theme_options',
            'type' => 'text',
            'description' => __( 'Задайте email автора блога для получения изображения.', 'mais-awesome-theme' )
        ) );

        $wp_customize->add_setting( 'author_name', array(
            'default' => '',
            'transport' => 'postMessage'
        ) );

        $wp_customize->add_control( 'author_name', array(
            'label' => __( 'Author Name', 'mais-awesome-theme' ),
            'section' => 'theme_options',
            'type' => 'text',
            'description' => __( 'Укажите краткое описание автора и его имя.', 'mais-awesome-theme' )
        ) );

    }
    add_action( 'customize_register', 'mais_customize_register' );

?>