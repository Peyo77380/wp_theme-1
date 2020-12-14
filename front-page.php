<?php get_header(); ?>


<div class="wrapper">
  
  <?php $welcomeArticle = get_post( 1 ) ; ?>
  <?php if (have_posts( $welcomeArticle )) : ?>
    <section>
      <article>
        <h2><?php echo $welcomeArticle->post_title; ?></h2>
        <?php echo $welcomeArticle->post_content; ?>
      </article>
    </section>
  <?php endif; ?> 

  <?php if (is_active_sidebar( 'sidebar' )) : ?>
    <aside>
      <?php dynamic_sidebar( 'sidebar' ) ?>
    </aside>
  <?php endif; ?>
  
 

</div>


<?php if (is_active_sidebar( 'article_showcase' )) : ?>
  <div class="wrapper">
      
        <?php dynamic_sidebar( 'article_showcase' ) ?>
      
  </div>
<?php endif; ?>
<?php get_footer() ?>