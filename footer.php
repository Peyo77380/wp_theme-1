</main>


<footer>

<?php wp_nav_menu( $args = [
        'menu'                 => 'Footer Menu',
        'container'            => 'nav',
        'container_class'      => 'footerMenu',
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
        'theme_location'       => 'footer'
      ]) ?>
 

    <p>
      <?php bloginfo( 'title' ) ?> &copy; 
      <?php 
        echo date('Y');
      ?>
     </p>

</footer>

</body>

</html>

<?php wp_footer(); ?>