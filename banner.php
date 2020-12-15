<?php 

// TODO 

?>




<!-- page d'accueil : pexels-marian-florinel-condruz-4050715 -->
<!-- relaxation : vague pexels-emiliano-arano-1295138 -->
<!-- méditation : galets -->
<div class="banner" style="background-image: url('<?php echo get_template_directory_uri(  ) ?>/img/<?php
    if (is_front_page(  )) {
        echo "pexels-marian-florinel-condruz-4050715.jpg";
    } else if (is_page( 'relaxation' )) {
        echo "pexels-emiliano-arano-1295138.jpg";
    } else {
        echo "bg-sample-picture.jpg"; 
    }

?>')">
    <div class="bgblur"
    
    ></div>
    <h2>Bienvenue sur <?php ucfirst(bloginfo( 'name' )) ?></h2>
</div>

