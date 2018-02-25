<?php get_header(); ?>

<main class="page-content">

    <section class="categories">

        <h1 class="section-header">
            <span><?php echo __( 'Категории', 'mais-awesome-theme' ) ?></span>
        </h1>

        <?php
                
            $catrgories = get_categories( array(
                'orderby' => 'count',
                'order' => 'DESC',
                'hide_empty' => 0,
                'number' => 12
            ) );

            foreach ( $catrgories as $category ) : 
        ?>

            <div class="category category-preview" data-category-id="<?php echo $category->term_id; ?>"> 
                <figure class="category-image mais-tooltip"
                    data-name="<?php echo $category->name; ?>"
                    data-description="<?php echo $category->description; ?>"
                    data-posts-count="<?php echo $category->count ?>"
                >
                    <a href="<?php echo get_category_link( $category->term_id ) ?>">
                        <?php
                            $image = array(
                                'class' => ''
                            );
                            z_taxonomy_image( $category->term_id, 'full', $image );
                        ?>
                    </a>
                </figure>
            </div>

        <?php endforeach; ?>
    </section>

    <?php get_template_part( 'template-parts/content/content', 'posts' ) ?>

</main>

<? get_footer(); ?>