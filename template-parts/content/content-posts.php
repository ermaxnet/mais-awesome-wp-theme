
<section class="posts-container">

    <?php 
        $posts = array(
            'posts_per_page' => 24,
            'orderby' => 'rand'
        );

        foreach ( get_posts( $posts ) as $post ) :
            setup_postdata( $post ); 
    ?>

        <div class="flex__item">
            
            <article <?php post_class( 'post' ); ?>>

                <figure class="post__image">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( 'small', array(
                            'class' => 'post-image'
                        ) ); ?>
                    </a>
                </figure>

                <div class="post__date">
                    <div class="red-line">
                        <svg>
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" 
                                xlink:href="<?php echo get_template_directory_uri() . "/assets/images/icons.svg#red-line"; ?>"></use>
                        </svg>
                    </div>
                    <time datetime="<?php the_time( 'c' ) ?>"><?php the_time( 'd F Y H:i' ) ?></time>
                    <div class="red-line">
                        <svg>
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" 
                                xlink:href="<?php echo get_template_directory_uri() . "/assets/images/icons.svg#red-line"; ?>"></use>
                        </svg>
                    </div>
                </div>

                <div class="post__title">
                    <span><?php the_title(); ?></span>
                </div>

                <div class="post__tags">
                    <ul class="post__tags-list">
                        <?php foreach ( wp_get_post_tags( $post->ID ) as $tag ) : ?>
                            
                            <li class="post__tag category_<?php echo $tag->slug; ?>">
                                <a href="<?php echo get_tag_link( $tag->term_id ); ?>">
                                    <?php echo $tag->name; ?>
                                </a>
                            </li>

                        <?php endforeach; ?>
                    </ul>
                </div>

            </article>

        </div>

    <?php 
        endforeach;
        wp_reset_postdata();
    ?>

</section>