<?php

    /*

    Template Name: One-Pager
    
    */

    get_header();

?>


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
        <section id="Booking" class="booking">
            <h2>
                Booking
                <?php if(get_field('booking_subtitle')): ?>
                    <p class="em"><?php the_field('booking_subtitle'); ?></p>
                <?php endif; ?>
            </h2>
            <div class="bookable_courses">
                <?php

                    // $courses = get_posts( array(
                    //     'post_type' => 'product',
                    //     'posts_per_page' => -1
                    // ) );
                    
                    // if ( $courses ) {

                    //     echo '<nav id="bookable_course_list"><ul>';
                    //         foreach ( $courses as $course ) :
                    //             setup_postdata( $course );
                    //             echo '<li class="bookable_course_button" data-target="'.slugify($course->post_title).'">'.$course->post_title.'</li>';
                    //         endforeach; 
                    //     echo '</ul></nav>';

                    //     foreach ( $courses as $course ) :
                    //         setup_postdata( $course );
                    //         echo '<div class="bookable_course hide '.slugify($course->post_title).'">';
                    //             echo do_shortcode('[appointment_form id="'.$course->ID.'"]');
                    //         echo '</div>';
                    //     endforeach; 
                    //     wp_reset_postdata();
                    // }

                ?>
            </div>
        </section>
        <div class="decoration news">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tri.svg">    
        </div>
        <section id="News" class="news">
            <h2>
                News
                <?php if(get_field('news_subtitle')): ?>
                    <p class="em"><?php the_field('news_subtitle'); ?></p>
                <?php endif; ?>
            </h2>
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
            <h2>
                Studio
                <?php if(get_field('studio_subtitle')): ?>
                    <p class="em"><?php the_field('studio_subtitle'); ?></p>
                <?php endif; ?>
            </h2>
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
            <h2>
                Kurse
                <?php if(get_field('courses_subtitle')): ?>
                    <p class="em"><?php the_field('courses_subtitle'); ?></p>
                <?php endif; ?>
            </h2>
            <div class="row">
                <div class="one-half visual-plan">
                    <table class="plan-table">
                        <thead>
                            <tr>
                                <td>Heure</td> <td>Lu</td> <td>Ma</td> <td>Me</td> <td>Je</td> <td>Ve</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>09:00</td> <td></td> <td></td> <td></td> <td></td> <td></td>
                            </tr>
                            <tr>
                                <td>10:00</td> <td></td> <td></td> <td></td> <td></td> <td></td>
                            </tr>
                            <tr>
                                <td>11:00</td> <td></td> <td></td> <td></td> <td></td> <td></td>
                            </tr>
                            <tr>
                                <td>12:10</td> <td></td> <td></td> <td></td> <td></td> <td></td>
                            </tr>
                            <tr>
                                <td>17:00</td> <td></td> <td></td> <td></td> <td></td> <td></td>
                            </tr>
                            <tr>
                                <td>18:00</td> <td></td> <td></td> <td></td> <td></td> <td></td>
                            </tr>
                            <tr>
                                <td>19:00</td> <td></td> <td></td> <td></td> <td></td> <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="one-half">
                    <script>

                        var plans = [];

                    </script>
                    <?php
                        $courses = get_posts( array(
                            'post_type' => 'course'
                        ) );
                        
                        if ( $courses ) {
                            foreach ( $courses as $post ) :
                                setup_postdata( $post ); ?>
                                <div class="plan" data-plan="<?php echo $post->post_name; ?>">
                                    <h3><?php the_title(); ?></h3>
                                    <?php the_content(); ?>
                                </div>
                                <script>

                                    plans['<?php echo $post->post_name; ?>'] = [
                                        [<?php the_field('monday'); ?>],
                                        [<?php the_field('tuesday'); ?>],
                                        [<?php the_field('wednesday'); ?>],
                                        [<?php the_field('thursday'); ?>],
                                        [<?php the_field('friday'); ?>]
                                    ]

                                </script>
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
                    <?php if(get_field('rate_subtitle')): ?>
                    <p class="em"><?php the_field('rate_subtitle'); ?></p>
                    <?php endif; ?>
                </h2>
            </div>
            <div class="rate-wrapper">
                <?php
                    $rates = get_posts( array(
                        'post_type' => 'rate'
                    ) );
                    
                    if ( $rates ) {
                        foreach ( $rates as $post ) :
                            setup_postdata( $post ); ?>
                            
                            <section class="rate">
                                <h3><?php the_title(); ?></h3>
                                <p class="tac">À partir de</p>
                                <p class="price">CHF <?php the_field('price') ?></p>
                                <?php the_content(); ?>
                                <h3><a href="#Kontakt">Contactez-nous</a></h3>
                            </section>
                        <?php
                        endforeach; 
                        wp_reset_postdata();
                    }
                ?>
            </div>
        </section>
        <div class="decoration contact">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tri.svg">    
        </div>
        <section id="Kontakt" class="contact">
            <h2>
                Kontakt
                <?php if(get_field('contact_subtitle')): ?>
                    <p class="em"><?php the_field('contact_subtitle'); ?></p>
                <?php endif; ?>
            </h2>
            <div class="row portraits">
                <div class="two-third tar">
                    <div class="portrait">
                        <p class="em">Nina Pigné</p>
                        <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/nina-02.jpg" alt="Nina Pigné">
                        </div>
                    </div>
                </div>
                <div class="one-third">
                    <div class="portrait">
                        <p class="em">Ahmed Akdeniz</p>
                        <div>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ahmet-02.jpg" alt="Ahmed Akdeniz">
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="row">
                <div class="two-third map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2713.906691485375!2d7.243161951405494!3d47.14009407905426!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478e194d65f4571b%3A0x1d3fe72c9fef39c1!2sNidaugasse%208%2C%202502%20Biel!5e0!3m2!1sen!2sch!4v1583174605841!5m2!1sen!2sch"
                        width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    <!-- <div id="map"></div> -->
                </div>
                <div class="one-third">
                    <?php the_field('contact_desc'); ?>
                </div>
            </div>
            <div class="clear"></div>
        </section>
    </main>

    <a id="booking-btn" href="#Booking"></a>

<?php get_footer(); ?>