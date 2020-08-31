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
                <li><a href="#<?php sanitize_title(the_field('booking_title')); ?>"><?php the_field('booking_title'); ?></a></li>
                <li><a href="#<?php sanitize_title(the_field('news_title')); ?>"><?php the_field('news_title'); ?></a></li>
                <li><a href="#<?php sanitize_title(the_field('studio_title')); ?>"><?php the_field('studio_title'); ?></a></li>
                <li><a href="#<?php sanitize_title(the_field('courses_title')); ?>"><?php the_field('courses_title'); ?></a></li>
                <li><a href="#<?php sanitize_title(the_field('portrait_title')); ?>"><?php the_field('portrait_title'); ?></a></li>
                <li><a href="#<?php sanitize_title(the_field('rates_title')); ?>"><?php the_field('rates_title'); ?></a></li>
                <li><a href="#<?php sanitize_title(the_field('contact_title')); ?>"><?php the_field('contact_title'); ?></a></li>
            </ul>
        </nav>
        <section id="<?php the_field('booking_title'); ?>" class="booking">
            <h2>
                Booking
                <?php if(get_field('booking_subtitle')): ?>
                    <p class="em"><?php the_field('booking_subtitle'); ?></p>
                <?php endif; ?>
            </h2>
            <div class="bookable_courses">
                <iframe src="https://www.supersaas.fr/schedule/kismetstudio/Stundenplan_Kismet?m=1" frameborder="0" scrolling="no"></iframe> 
                <div class="top_block"></div>
                <a href="https://www.supersaas.fr/schedule/kismetstudio/Stundenplan_Kismet" target="_blank" class="bottom_gradient">
                    <h3><?php the_field('booking_plattform_label'); ?></h3>
                </a>
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
        <section id="<?php the_field('news_title'); ?>" class="news">
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
        <section id="<?php the_field('studio_title'); ?>" class="studio">
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
        <section id="<?php the_field('courses_title'); ?>" class="courses">
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
                                <?php if(count(get_field('image')) == 1): ?>
                                    <img src="<?php echo esc_url(get_field('image')[0]['sizes']['plans']); ?>"/>
                                <?php else: ?>
                                    <div class="course-gallery clear">
                                        <?php foreach( get_field('image') as $image ): ?>
                                            <div><img src="<?php echo esc_url($image['sizes']['plans']); ?>"/></div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
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
        <section id="<?php the_field('portrait_title'); ?>" class="portrait">
            <div class="tar header">
                <h2>Portrait</h2>
            </div>
            <div class="portrait-wrapper">
                <div class="video-gallery clear">
                    <?php foreach( get_field('portrait') as $video ): ?>
                        <div>
                            <?php echo $video['video']; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section id="<?php the_field('rates_title'); ?>" class="rates">
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
        <section id="<?php the_field('contact_title'); ?>" class="contact">
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
                    <div id="map" style="width: 100%; height: 400px;"></div>
                </div>
                <div class="one-third">
                    <?php the_field('contact_desc'); ?>
                </div>
            </div>
            <div class="clear"></div>
        </section>
    </main>

    <a id="tryout-btn" href="mailto:info@kismetstudio.ch?subject=<?php echo rawurlencode(get_field('tryout_subject')); ?>"></a>
    <a id="booking-btn" href="#<?php sanitize_title(the_field('booking_title')); ?>"></a>

<?php get_footer(); ?>