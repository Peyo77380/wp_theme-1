<?php if (is_archive(  )) : ?>

    <h2><?php single_cat_title( "Articles de la catégorie ", true ) ; ?></h2>

<?php endif; ?>


<?php if ( is_search(  ) ) : ?>

    <h2>Résultat de votre recherche</h2>

    

<?php endif; ?>



    
    
    <?php if (have_posts(  )) :  ?>
        <?php if ( is_search() ) : ?>
            <p>Vous avez cherché : <?php the_search_query() ?>.</p>
        <?php endif; ?>
        
        <?php if (! is_single() && ! is_page()  ) : ?>
            <div class="fadeBox">
        <?php endif; ?>


        <?php while(have_posts()) : the_post() ?>

            <?php if (is_single() || is_page() ) : ?>
                <article>
            <?php else : ?>
                <article class="card">
                    <?php if (has_post_thumbnail()) : ?>
                        
                        <?php the_post_thumbnail( 'small' ); ?>
                        
                    <?php endif; ?>
            <?php endif; ?>

            
           
            
        
            <?php if(is_single() || is_page()) : ?>
                <h2><?php the_title() ?></h2>
                <?php if (has_post_thumbnail()) : ?>
                        
                        <?php the_post_thumbnail( 'small' ); ?>
                        
                    <?php endif; ?>
            <?php else: ?>
                <div>
                    <a href="<?php the_permalink( ) ?>">
                        <h3><?php the_title() ?></h3>
                    </a>
            <?php endif; ?>

            <?php if (is_single() || is_page()) : ?>
                    <?php the_content() ?>
                <?php else : ?>
                    <?php the_excerpt() ?> 
                    <a class='button' href="<?php the_permalink() ?>">Lire la suite</a>
                </div>
            <?php endif; ?>
        </article>



        <?php if (is_page( ) || is_single( )) : ?>

            <?php if (have_comments( the_post() )) : ?>
                <?php while (have_comments( )) : ?>
                    <?php the_comment(  )?>
                <?php endwhile; ?>
            <?php endif; ?>

        <?php endif; ?>
        

      
        <?php endwhile; ?>

        <?php if (! is_single() && ! is_page() ) : ?>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <section>
        <?php if ( is_search() ) : ?>
            
            <p>Il n'y a pas de résultat pour la recherche " <?php the_search_query(  )  ?>".</p>

        <?php elseif (is_page() || is_single() ) : ?>
            <p>Quelque chose ne s'est pas passé comme prévu.</p>
            

        <?php else : ?>

            <p>Il n'y a pas d'article pour l'instant. Repassez plus tard.</p>
           

        <?php endif; ?>
        </section>
            <a class="button" href="<?php echo get_home_url( "/" ) ?>">Retourner à l'accueil.</a>
    <?php endif; ?>


   