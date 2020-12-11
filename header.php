
<!DOCTYPE html>
<html <?php echo get_language_attributes() ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ) ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php bloginfo('title') ?></title>

  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/normalize.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri() ?>" type="text/css" />


  <link href="https://fonts.googleapis.com/css2?family=Candal&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <?php wp_head() ?>

</head>

<body>
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

    <?php get_template_part('banner') ?>

  </header>

  <main>
    <fieldset>
      <input class="searchBar" placeholder="Que recherchez-vous ?" />
    </fieldset>