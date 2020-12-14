<?php get_header(); ?>


<div class="wrapper">

    <section class="blogSection">
    
        <?php get_template_part( 'content' ); ?>

    </section>

    <aside>
    <?php if (is_active_sidebar( 'sidebar' )) : ?>

        <?php dynamic_sidebar( 'sidebar' ); ?>

    <?php endif; ?>
    </aside>
</div>

<?php get_footer(); ?>