<?php




if (comments_open( )) : ?>
<h3>Commentaires :</h3>
<div class="formBlock">

<?php

    $comments_args = array(
        // Change the title of send button 
        'label_submit' => __( 'Send', 'textdomain' ),
        // Change the title of the reply section
        'title_reply' => __( 'Ecrivez un commentaire', 'textdomain' ),
        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_after' => '',
        // Redefine your own textarea (the comment body).
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
    );
    comment_form( $comments_args );

    ?>
    
    <?php wpautop( 'Soyez le premier à commenter !' ) ?>


    <?php wp_comment_form_unfiltered_html_nonce(  ) ?>





</div>
<div class="commentsBlock">
    

<?php
function format_comment($comment, $args, $depth) {
    
    $GLOBALS['comment'] = $comment; ?>
    
     <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
         <div class="comment-main">    
            <div class="comment-intro">
                <p class="comment-author"><?php printf(__('%s'), get_comment_author_link()) ?></p>
                <?php echo get_avatar( get_the_author_meta( 'ID'), 60 ); ?>
            </div>
            
            <div class="comment-body">
                <a class="comment-permalink" href="<?php echo htmlspecialchars ( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf(__('%1$s'), get_comment_date(), get_comment_time()) ?></a>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Your comment is awaiting moderation.') ?></em><br />
                <?php endif; ?>
                
                <?php comment_text(); ?>
                <div class="reply">
                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?> 
                    
                </div>
            </div>
         </div>
         
<?php } 
?>
<?php wp_list_comments('type=comment&callback=format_comment'); ?>
</div>



<?php else : ?>

<?php wpautop( 'La section des commentaires est fermée pour cet articlé.' ) ?>

<?php endif ; ?>