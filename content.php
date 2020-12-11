
    <?php if (have_posts(  )) :  ?>
        <?php while(have_posts()) : the_post() ?>
            <article>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="floatLeft">
                        <?php the_post_thumbnail( 'small' ); ?>
                    </div>
                <?php endif; ?>
                <?php if(is_single() || is_page()) : ?>
                    <h2><?php the_title() ?></h2>
                <?php else: ?>
                    <a href="<?php the_permalink( ) ?>">
                        <h3><?php the_title() ?></h3>
                    </a>
                <?php endif; ?>
                <?php if (is_single() || is_page()) : ?>
                    <?php the_content() ?>
                <?php else : ?>
                    <?php the_excerpt() ?> 
                    <a class='button' href="<?php the_permalink() ?>">Lire la suite</a>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <?php wpautop( 'Il n\'y a pas d\'article pour l\'instant. Repassez plus tard.' ) ?>
    <?php endif; ?>
