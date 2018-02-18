<?php get_header(); ?>

<main>

    <section>
    
        <div>
        
            <?php
            
                $catrgories = get_categories( array(
                    'orderby' => 'count',
                    'order' => 'DESC',
                    'hide_empty' => 0,
                    'number' => 12
                ) );

                foreach ( $catrgories as $category ) : 
            ?>

            <div data-category-id="<?php echo $category->term_id; ?>"> 
                <figure class="mais-tooltip"
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

        </div>
    
    </section>

    <?php get_template_part( 'template-parts/content/content', 'posts' ) ?>

</main>

<? get_footer(); ?>