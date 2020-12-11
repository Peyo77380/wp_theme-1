<?php get_header(); ?>

<div class="wrapper">

  <section>
    <?php dynamic_sidebar( 'article_showcase' ) ?>
  </section>
  <section>
    <?php $welcomeArticle = get_post( 1 ) ; ?>
    <?php if (have_posts( $welcomeArticle )) : ?>
      <article>
        <h2><?php echo $welcomeArticle->post_title; ?></h2>
        <?php echo $welcomeArticle->post_content; ?>
      </article>
    <?php endif; ?> 
  </section>

</div>


      <!-- <h2>Notre solution en 3 points</h2>
      <div class="fadeBox">
        <article class="card">
          <i class="fa fa-cogs"></i>
          <h3>Configuration</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, dolorum.</p>
        </article>
        <article class="card">
          <i class="fa fa-area-chart"></i>
          <h3>Monitoring</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, dolorum.</p>
        </article>
        <article class="card">
          <i class="fa fa-database"></i>
          <h3>Sauvegarde</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, dolorum.</p>
        </article>

      </div>
    </section>
    <section>
      <h2>Choisissez votre style d'hébergement</h2>
      <div class="fadeBox">
        <article class="card">
          <i class="fa fa-users"></i>
          <h3>Serveur Mutualisé</h3>
          <div class="price">19€ / mois</div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, dolorum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, dolorum.</p>
        </article>
        <article class="card">
          <i class="fa fa-user"></i>
          <h3>Serveur Dédié</h3>
          <div class="price">39€ / mois</div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, dolorum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, dolorum.</p>
        </article>
        <article class="card">
          <i class="fa fa-cloud"></i>
          <h3>Service Cloud</h3>
          <div class="price">49€ / mois</div>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, dolorum.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla, dolorum.</p>
        </article>
      </div>
    -->

 <?php get_footer(); ?>