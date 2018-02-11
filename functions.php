<?php 

    add_theme_support( 'post-thumbnails' );

    function mais_theme_js() {

        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'http://code.jquery.com/jquery-3.3.1.min.js', false, '3.3.1' );

        wp_scripts()->add_data( 'jquery', 'group', 1 );
        wp_scripts()->add_data( 'jquery-core', 'group', 1 );
        wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

        wp_enqueue_script( 'tooltip', get_template_directory_uri() . '/js/dist/jquery.mais-tooltip.js', array( 'jquery' ), '', true );

    }
    add_action( 'wp_enqueue_scripts', 'mais_theme_js' );

?>