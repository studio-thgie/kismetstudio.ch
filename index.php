<?php

    /*

    Template Name: One-Pager
    
    */

?>

<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php the_title(); ?> - <?php bloginfo('name'); ?></title>

    <style>
        .loading-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #FFFDE5;
            z-index: 9999;

            transition: 0.5s;
        }

        .loading-screen h2 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-70%) rotate(-10deg);
            margin: 0 auto;
        }
    </style>

    <?php wp_head(); ?>

</head>

<body>

    <div class="loading-screen">
        <h2>Loading...</h2>
    </div>

    <header>
        <a href="/">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Logo Kismet">
        </a>
        <nav aria-label="Sprachwahl" id="lang">
            <ul>
                <?php foreach(/*icl_get_languages()*/[] as $lang): ?>
                    <li <?php if($lang['active']){ echo 'active'; } ?>" ><a href="<?php echo $lang['url']; ?>"><?php echo $lang['language_code']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>
    <div class="hero-header" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/hero-header.png');">
    </div>
    <main>
        <nav id="navigation">
            <ul>
                <li><a href="#Booking">Booking</a></li>
                <li><a href="#News">News</a></li>
                <li><a href="#Studio">Studio</a></li>
                <li><a href="#Kurse">Kurse</a></li>
                <li><a href="#Tarife">Tarife</a></li>
                <li><a href="#Kontakt">Kontakt</a></li>
            </ul>
        </nav>
        <section id="Booking">
            <h2>Booking</h2>
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Booking-Calendar.svg" alt="">
        </section>
        <div class="decoration news">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tri.svg">    
        </div>
        <section id="News" class="news">
            <h2>News</h2>
            <?php
                $lastposts = get_posts( array(
                    'posts_per_page' => 3
                ) );
                
                if ( $lastposts ) {
                    foreach ( $lastposts as $post ) :
                        setup_postdata( $post ); ?>
                        <article>
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                            <p class="meta">Posted on <?php echo get_the_date('d. F Y'); ?></p>
                        </article>
                    <?php
                    endforeach; 
                    wp_reset_postdata();
                }
            ?>
        </section>
        <section id="Studio" class="studio">
            <h2>Studio</h2>
            <div class="row">
                <div class="one-half">
                    &nbsp;
                </div>
                <div class="one-half">
                    <?php the_field('studio_desc'); ?>
                </div>
            </div>
            <?php 
                $images = get_field('studio_gallery');
                if( $images ): ?>
                <div class="gallery clear">
                    <?php foreach( $images as $image ): ?>
                        <div><img src="<?php echo esc_url($image['sizes']['gallery']); ?>"/></div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
        </section>
        <section id="Kurse" class="courses">
            <h2>Kurse</h2>
            <div class="row">
                <div class="one-half visual-plan">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/PLAN.svg" alt="">
                </div>
                <div class="one-half">
                    <?php
                        $courses = get_posts( array(
                            'post_type' => 'course'
                        ) );
                        
                        if ( $courses ) {
                            foreach ( $courses as $post ) :
                                setup_postdata( $post ); ?>
                                <div class="plan">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                            </div>
                            <?php
                            endforeach; 
                            wp_reset_postdata();
                        }
                    ?>
                </div>
            </div>
            <div class="decoration courses clear">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tri.svg">    
            </div>
            <div class="clear course-descriptions">
                <?php
                    $courses = get_posts( array(
                        'post_type' => 'course'
                    ) );
                    
                    if ( $courses ) {
                        foreach ( $courses as $post ) :
                            setup_postdata( $post ); ?>
                            <div class="desc">
                                <h3><?php the_title(); ?></h3>
                                <p><?php the_field('claim') ?></p>
                                <img src="<?php echo esc_url(get_field('image')['sizes']['plans']); ?>"/>
                        </div>
                        <?php
                        endforeach; 
                        wp_reset_postdata();
                    }
                ?>
            </div>
        </section>
        <div class="decoration rates">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tri.svg">    
        </div>
        <section id="Tarife" class="rates">
            <div class="tar header">
                <h2>
                    Tarife
                    <p class="em">1 Probestunde gratis</p>
                </h2>
            </div>
            <div class="rate-wrapper">
                <section class="rate">
                    <h3>Pilates Tapis</h3>
                    <p class="tac">À partir de</p>
                    <p class="price">CHF 17.– / heure</p>
                    <p>
                        Cours sans abonnement: CHF 30.- / h<br>
                        Abonnement 10x CHF 250.-
                        Abonnement 20x CHF 400.-
                        1x semaine à l’année CHF 960.-
                        2x semaine à l’année CHF 1760.-
                    </p>
                    <h3><a href="#Kontakt">Contactez-nous</a></h3>
                </section>
                <section class="rate">
                    <h3>Pilates Tapis</h3>
                    <p class="tac">À partir de</p>
                    <p class="price">CHF 17.– / heure</p>
                    <p>
                        Cours sans abonnement: CHF 30.- / h<br>
                        Abonnement 10x CHF 250.-
                        Abonnement 20x CHF 400.-
                        1x semaine à l’année CHF 960.-
                        2x semaine à l’année CHF 1760.-
                    </p>
                    <h3><a href="#Kontakt">Contactez-nous</a></h3>
                </section>
                <section class="rate">
                    <h3>Pilates Tapis</h3>
                    <p class="tac">À partir de</p>
                    <p class="price">CHF 17.– / heure</p>
                    <p>
                        Cours sans abonnement: CHF 30.- / h<br>
                        Abonnement 10x CHF 250.-
                        Abonnement 20x CHF 400.-
                        1x semaine à l’année CHF 960.-
                        2x semaine à l’année CHF 1760.-
                    </p>
                    <h3><a href="#Kontakt">Contactez-nous</a></h3>
                </section>
                <section class="rate">
                    <h3>Pilates Tapis</h3>
                    <p class="tac">À partir de</p>
                    <p class="price">CHF 17.– / heure</p>
                    <p>
                        Cours sans abonnement: CHF 30.- / h<br>
                        Abonnement 10x CHF 250.-
                        Abonnement 20x CHF 400.-
                        1x semaine à l’année CHF 960.-
                        2x semaine à l’année CHF 1760.-
                    </p>
                    <h3><a href="#Kontakt">Contactez-nous</a></h3>
                </section>
                <section class="rate">
                    <h3>Pilates Tapis</h3>
                    <p class="tac">À partir de</p>
                    <p class="price">CHF 17.– / heure</p>
                    <p>
                        Cours sans abonnement: CHF 30.- / h<br>
                        Abonnement 10x CHF 250.-
                        Abonnement 20x CHF 400.-
                        1x semaine à l’année CHF 960.-
                        2x semaine à l’année CHF 1760.-
                    </p>
                    <h3><a href="#Kontakt">Contactez-nous</a></h3>
                </section>
            </div>
        </section>
        <div class="decoration contact">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tri.svg">    
        </div>
        <section id="Kontakt" class="contact">
            <h2>
                Kontakt
                <p class="em"> Nidaugasse 8<br>2502 Bienne </p>
            </h2>
            <div class="row">
                <div class="two-third map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2713.906691485375!2d7.243161951405494!3d47.14009407905426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478e194d65f4571b%3A0x1d3fe72c9fef39c1!2sNidaugasse%208%2C%202502%20Biel!5e0!3m2!1sen!2sch!4v1583174605841!5m2!1sen!2sch"
                        width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
                <div class="one-third">
                    <p class="em">Nina +41 79 421 20 77<br><a
                            href="mailto:nina@kismetstudio.ch">nina@kismetstudio.ch</a></p>
                    <p class="em">Ahmet +41 79 562 08 11<br><a
                            href="mailto:ahmet@kismetstudio.ch">ahmet@kismetstudio.ch</a></p>
                    <p class="em">Heures d’ouverture<br>Lu-Ve: 9:00 à 20:00</p>
                </div>
            </div>
            <div class="clear"></div>
        </section>
    </main>
    <footer>
        <p>
            &copy; <?php echo date("Y"); ?> by Kismet Studio Biel/Bienne | Concept & Design: <a href="https://www.sifon.li">SIFON</a><br>
            Code: <a href="https://things.care" target="_blank">things.care</a>
        </p>
    </footer>

    <?php wp_footer(); ?> 

</body>

</html>