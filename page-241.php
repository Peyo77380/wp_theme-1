<?php get_header(); ?>


<div class="wrapper">
    <?php  get_template_part( 'content' ); ?>

    <div class="comments">
            <?php comments_template( ) ?>
        </div>
</div>
<?php get_footer(); ?>