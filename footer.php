</main>


<footer>

    <?php wp_nav_menu( 'footer menu' ); ?>



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