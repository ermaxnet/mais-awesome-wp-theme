<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> <?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?> </title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="site">
        <header class="header">
            <?php get_template_part( 'template-parts/header/header', 'media' ); ?>
            <?php get_template_part( 'template-parts/header/header', 'author' ); ?>
        </header>
