
<div class="header-author">
    
    <div class="header-author__avatar">
        <?php
            $avatarLink = get_avatar_url( 
                get_theme_mod( 'author_email' ),
                array(
                    'size' => 170,
                    'rating' => 'G'
                )
            );
        ?>
        <img src="<?php echo $avatarLink; ?>" alt="<?php echo get_theme_mod( 'author_name' ); ?>" />
    </div>

    <div class="header-author__name">
        <span><?php bloginfo( 'name' ); ?></span>
    </div>

    <div class="header-author__about">
        <span><?php bloginfo( 'description' ); ?></span>
    </div>

</div>