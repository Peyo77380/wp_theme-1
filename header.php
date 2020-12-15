
<!DOCTYPE html>
<html <?php echo get_language_attributes() ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ) ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('title') ?></title>

  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/normalize.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>" type="text/css" />

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet"> 
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">



  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Mali&display=swap" rel="stylesheet"> 
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet"> 
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet"> 
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet"> 
  <?php wp_head() ?>

</head>

<body <?php body_class() ?>>
  <header>
    <div class="bar">
      <a id="activeIcon" href="<?php echo get_home_url() ?>">
          <h1><?php bloginfo('title') ?></h1>
          <?php bloginfo('description') ?>
      </a>
      <?php wp_nav_menu( $args = [
        'menu'                 => 'Primary Menu',
        'container'            => 'nav',
        'container_class'      => '',
        'container_id'         => '',
        'container_aria_label' => '',
        'menu_class'           => 'menu',
        'menu_id'              => '',
        'echo'                 => true,
        'fallback_cb'          => 'wp_page_menu',
        'before'               => '',
        'after'                => '',
        'link_before'          => '',
        'link_after'           => '',
        'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
        'item_spacing'         => 'preserve',
        'depth'                => 0,
        'walker'               => '',
        'theme_location'       => ''
      ]) ?>
    </div>
  </header>
  <?php if(is_front_page()||is_page('relaxation')||is_page('meditation')) : ?>
    <?php get_template_part('banner') ?>
  <?php endif; ?>

  <main>
    <form action="<?php site_url() ?>" method="get">
      <fieldset>
        <input class="searchBar" placeholder="Que recherchez-vous ?" name="s" />
      </fieldset>
    </form>