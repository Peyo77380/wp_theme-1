<?php 

class WP_Widget_Articles_Showcase extends WP_Widget {
    /*
    * Sets up a new Recent Posts widget instance.
    *
    * @since 2.8.0
    */
   public function __construct() {
       $widget_ops = array(
           'classname'                   => 'widget_slider_recent_entries',
           'description'                 => __( 'Your site&#8217;s most recent Posts with a slider.' ),
           'customize_selective_refresh' => true,
       );
       parent::__construct( 'slider_recent-posts', __( 'SliderRecent Posts' ), $widget_ops );
       $this->alt_option_name = 'widget_slider_recent_entries';
   }

   /**
    * Outputs the content for the current Recent Posts widget instance.
    *
    * @since 2.8.0
    *
    * @param array $args     Display arguments including 'before_title', 'after_title',
    *                        'before_widget', and 'after_widget'.
    * @param array $instance Settings for the current Recent Posts widget instance.
    */
   public function widget( $args, $instance ) {
       if ( ! isset( $args['widget_id'] ) ) {
           $args['widget_id'] = $this->id;
       }

       $default_title = __( 'Slider Recent Posts' );
       $title         = ( ! empty( $instance['title'] ) ) ? $instance['title'] : $default_title;

       /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
       $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

       $number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
       if ( ! $number ) {
           $number = 5;
       }
       $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;
       $show_title = isset( $instance['show_title'] ) ? $instance['show_title'] : false;
       $show_author = isset( $instance['show_author'] ) ? $instance['show_author'] : false;



       $r = new WP_Query(
           /**
            * Filters the arguments for the Recent Posts widget.
            *
            * @since 3.4.0
            * @since 4.9.0 Added the `$instance` parameter.
            *
            * @see WP_Query::get_posts()
            *
            * @param array $args     An array of arguments used to retrieve the recent posts.
            * @param array $instance Array of settings for the current widget.
            */
           apply_filters(
               'widget_posts_args',
               array(
                   'posts_per_page'      => $number,
                   'no_found_rows'       => true,
                   'post_status'         => 'publish',
                   'ignore_sticky_posts' => true,
               ),
               $instance
           )
       );

       if ( ! $r->have_posts() ) {
           return;
       }
       ?>

       <?php echo $args['before_widget']; ?>
       <div class="featured_articles">
       <?php
       if ( $title && $show_title ) {
           echo $args['before_title'] . $title . $args['after_title'];
       }

       $format = current_theme_supports( 'html5', 'navigation-widgets' ) ? 'html5' : 'xhtml';

       /** This filter is documented in wp-includes/widgets/class-wp-nav-menu-widget.php */
       $format = apply_filters( 'navigation_widgets_format', $format );

       if ( 'html5' === $format ) {
           // The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
           $title      = trim( strip_tags( $title ) );
           $aria_label = $title ? $title : $default_title;
           echo '<nav role="navigation" aria-label="' . esc_attr( $aria_label ) . '">';
       }



       $latest_post = $r->posts[0];



       $post_title   = get_the_title( $latest_post->ID );
       $title        = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );

       $post_excerpt = get_the_excerpt( $latest_post->ID );
       $excerpt = ( ! empty ($post_excerpt) ) ? $post_excerpt : __( '(no excerpt)' );

       $post_thumbnail = get_the_post_thumbnail_url( $latest_post->ID );
       $thumbnail = ( ! empty ( $post_thumbnail ) ) ? 'style="background-image: url(' . $post_thumbnail . ');"' : false;

       $post_author = get_the_author_meta( 'nicename', $latest_post->{'post_author'} );
       $author = ( ! empty ($post_author) ) ? $post_author : __( '(no author)' );

       $aria_current = '';

       if ( get_queried_object_id() === $latest_post->ID ) {
           $aria_current = ' aria-current="page"';
       }
       ?>
                <a href="<?php the_permalink( $latest_post->ID ); ?>"<?php echo $aria_current; ?> class='latest_post'>
            <div  <?php echo $thumbnail ?>>
                <h5><?php echo $title; ?></h5>
                <div class='post-excerpt'><?php echo $excerpt ?></div>
                <?php if ($show_date || $show_title) : ?>
                    <div class="post-meta">
                        Posté 
                    <?php if ( $show_date ) : ?>
                        <span class="post-date">le <?php echo get_the_date( '', $latest_post->ID ); ?></span>
                    <?php endif; ?>
                    <?php if ( $show_author ) : ?>
                        <span class="post-author">par <?php echo $author; ?></span>
                    <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </a>
       <?php

        array_shift($r->posts);
       
       ?>

       <ul class='recent_posts_slider'>

           <?php foreach ( $r->posts as $recent_post ) : ?>
               <?php
                $post_title   = get_the_title( $recent_post->ID );
                $title        = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
         
                $post_excerpt = get_the_excerpt( $recent_post->ID );
                $excerpt = ( ! empty ($post_excerpt) ) ? $post_excerpt : __( '(no excerpt)' );
         
                $post_thumbnail = get_the_post_thumbnail_url( $recent_post->ID );
                $thumbnail = ( ! empty ( $post_thumbnail ) ) ? 'style="background-image: url(' . $post_thumbnail . ');"' : false;
         
                $post_author = get_the_author_meta( 'nicename', $recent_post->{'post_author'} );
                $author = ( ! empty ($post_author) ) ? $post_author : __( '(no author)' );
         
                $aria_current = '';
         
                if ( get_queried_object_id() === $recent_post->ID ) {
                    $aria_current = ' aria-current="page"';
                }
               ?>
                        <a href="<?php the_permalink( $recent_post->ID ); ?>"<?php echo $aria_current; ?> class='recent_posts_slider_preview'>
                    <li  <?php echo $thumbnail ?>>
                        <h5><?php echo $title; ?></h5>
                        <?php if ($show_date || $show_title) : ?>
                            <div class="post-meta">
                                Posté
                            <?php if ( $show_date ) : ?>
                                <span class="post-date">le <?php echo get_the_date( '', $latest_post->ID ); ?></span>
                            <?php endif; ?>
                            <?php if ( $show_author ) : ?>
                                <span class="post-author">par <?php echo $author; ?></span>
                            <?php endif; ?>
                            </div>
                        <?php endif; ?>

                    </li>
                </a>
           <?php endforeach; ?>
       </ul>

       <?php
       if ( 'html5' === $format ) {
           echo '</nav>';
       }
       ?>
       </div>

       <?php
       echo $args['after_widget'];
   }

   /**
    * Handles updating the settings for the current Recent Posts widget instance.
    *
    * @since 2.8.0
    *
    * @param array $new_instance New settings for this instance as input by the user via
    *                            WP_Widget::form().
    * @param array $old_instance Old settings for this instance.
    * @return array Updated settings to save.
    */
   public function update( $new_instance, $old_instance ) {
       $instance              = $old_instance;
       $instance['title']     = sanitize_text_field( $new_instance['title'] );
       $instance['show_title'] = isset( $new_instance['show_title'] ) ? (bool) $new_instance['show_title'] : false;
       $instance['number']    = (int) $new_instance['number'];
       $instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
       $instance['show_author'] = isset( $new_instance['show_author'] ) ? (bool) $new_instance['show_author'] : false;
       return $instance;
   }

   /**
    * Outputs the settings form for the Recent Posts widget.
    *
    * @since 2.8.0
    *
    * @param array $instance Current settings.
    */
   public function form( $instance ) {
       $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
       $show_title = isset( $instance['show_title'] ) ? (bool) $instance['show_title'] : false;
       $number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
       $show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
       $show_author = isset( $instance['show_author'] ) ? (bool) $instance['show_author'] : false;

       var_dump($instance); 
       ?>
       <p>
           <label 
                for="<?php echo $this->get_field_id( 'title' ); ?>">
                <?php _e( 'Title:' ); ?>
            </label>
           <input 
                class="widefat" 
                id="<?php echo $this->get_field_id( 'title' ); ?>" 
                name="<?php echo $this->get_field_name( 'title' ); ?>" 
                type="text" 
                value="<?php echo $title; ?>" 
            />
       </p>

       <p>
           <input 
                class="checkbox" 
                type="checkbox"
                <?php checked( $show_title ); ?> 
                id="<?php echo $this->get_field_id( 'show_title' ); ?>" 
                name="<?php echo $this->get_field_name( 'show_title' ); ?>" />
           <label 
                for="<?php echo $this->get_field_id( 'show_title' ); ?>">
                <?php _e( 'Display Slider\'s title?' ); ?>
            </label>
       </p>

       <p>
           <label 
                for="<?php echo $this->get_field_id( 'number' ); ?>">
                <?php _e( 'Number of posts to show:' ); ?>
            </label>
           <input 
                class="tiny-text" 
                id="<?php echo $this->get_field_id( 'number' ); ?>" 
                name="<?php echo $this->get_field_name( 'number' ); ?>" 
                type="number" 
                step="1" 
                min="1" 
                value="<?php echo $number; ?>" 
                size="3" 
            />
       </p>

       <p>
           <input 
                class="checkbox" 
                type="checkbox"
                <?php checked( $show_date ); ?> 
                id="<?php echo $this->get_field_id( 'show_date' ); ?>" 
                name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
           <label 
                for="<?php echo $this->get_field_id( 'show_date' ); ?>">
                <?php _e( 'Display post date?' ); ?>
            </label>
       </p>

       <p>
           <input 
                class="checkbox" 
                type="checkbox"
                <?php checked( $show_author ); ?> 
                id="<?php echo $this->get_field_id( 'show_author' ); ?>" 
                name="<?php echo $this->get_field_name( 'show_author' ); ?>" />
           <label 
                for="<?php echo $this->get_field_id( 'show_author' ); ?>">
                <?php _e( 'Display post author?' ); ?>
            </label>
       </p>
       <?php
   }
}

?>