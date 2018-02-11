<?php get_header(); ?>

    <!--?php $categoryId = get_query_var( 'cat' ); ?-->
    <section>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <article <?php post_class( 'post post-preview' ); ?>>
                <div>
                    <span><?php the_title(); ?></span>
                </div>
                <div>
                    <time datetime="<?php the_time( 'c' ) ?>"><?php the_time( 'd F Y H:i' ) ?></time>
                </div>
                <div>
                    <span><?php echo strip_tags( get_the_excerpt() ); ?></span>
                    <a href="<?php the_permalink(); ?>">Читать</a>
                </div>
            </article>

        <?php endwhile; endif; ?>

    </section>

<?php get_footer(); ?>