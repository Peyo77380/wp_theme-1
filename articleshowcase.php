<div class="articlesShowcase">
<?php 
    // the query
    $the_query = new WP_Query( array(
        'posts_per_page' => 4,
    )); 
  ?>

  <?php if ( $the_query->have_posts() ) : ?>
  <?php $i = 0; ?>
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

        <?php if($i === 0) : ?>
            <article class="latestPost">
     
        <?php elseif ($i === 1) : ?>
            <div class="latestPostsSlider">
                

        <?php endif; ?>
            <?php if ($i > 0) : ?>
                 <article class="slider_thumbnail">
            <?php endif; ?>
            <?php $i++ ?>
                <?php if (has_post_thumbnail()): ?>
                    <?php the_post_thumbnail( ); ?>
                <?php endif; ?>
                    <a href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink() ?>">Lire la suite...</a>
            </article>
        
    <?php endwhile; ?>
    </div>
    <?php wp_reset_postdata(); ?>

  <?php else : ?>
    <p><?php wpautop("Il n'y a pas d'article pour l'instant"); ?></p>
  <?php endif; ?>
  </div>