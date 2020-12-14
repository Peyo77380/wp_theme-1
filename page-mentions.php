<?php

/*
    Template name: Mentions légales

*/


?>

<?php get_header(); ?>

<div class="wrapper">
    <section>
        <article class="box">
            <h3>Hébergeur</h3>
            <h4>Scaleway</h4>
            <address>
                8 rue de la Ville l’Evêque, 75008 Paris
            </address>
        </article>

        <article class="box">
            <h3>Editeur du thème Wordpress</h3>
            <h4>Pierre Guichard</h4>
            <address>

                Vous pouvez contacter l'auteur <a href="http://www.somedomain.com/contact">
                www.somedomain.com</a>.<br>
                Vous pouvez remonter les bugs et anomalies à cette adresse : <a href="mailto:webmaster@somedomain.com">
                contact webmaster</a>.<br>
                
            </address>
        </article>

        <article>
            <h3>Utilisation de vos données personnelles et vie privée</h3>
            <p>Les coordonnées transmises via le formulaire de contact serviront seulement à vous répondre et ne seront en aucun cas transmises à un tiers.
            Pour exercer vos droits sur vos données personnelles, merci de me contacter à l’adresse mail suivante : <a mailto:"contact@larr-abesk.fr">contact@larr-abesk.fr</a></p>
        </article>


    </section>

    <aside>
    <?php if (is_active_sidebar( 'sidebar' )) : ?>

        <?php dynamic_sidebar( 'sidebar' ); ?>

    <?php endif; ?>
    </aside>
</div>

<?php get_footer(); ?>




<?php