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
                <li id="lang-mobile">
                    <nav aria-label="Sprachwahl" id="lang">
                        <ul>
                            <?php foreach(icl_get_languages() as $lang): ?>
                                <li <?php if($lang['active']){ echo 'active'; } ?>" ><a href="<?php echo $lang['url']; ?>"><?php echo $lang['language_code']; ?></a></li>
                            <?php endforeach; ?>
                            <!-- <li>&mdash;</li> -->
                            <?php if(is_user_logged_in('/')): ?>
                                <!-- <li><a href="<?php echo wp_logout_url(); ?>">Logout</a></li>
                                <li>&mdash;</li> -->
                            <?php endif; ?>
                            <!-- <li><a href="/mein-konto">Konto</a></li> -->
                        </ul>
                    </nav>
                </li>
            </ul>
        </nav>
        <section id="<?php sanitize_title(the_field('booking_title')); ?>" class="booking">
            <h2>
                <?php the_field('booking_title'); ?>
                <?php if(get_field('booking_subtitle')): ?>
                    <p class="em"><?php the_field('booking_subtitle'); ?></p>
                <?php endif; ?>
            </h2>
            <div class="bookable_courses">
                <iframe src="https://www.supersaas.fr/schedule/studiomana/Stundenplan_MANA?m=1" frameborder="0" scrolling="no"></iframe> 
                <div class="top_block"></div>
                <a href="https://www.supersaas.fr/schedule/studiomana/Stundenplan_MANA" target="_blank" class="bottom_gradient">
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
        <section id="<?php sanitize_title(the_field('news_title')); ?>" class="news">
            <h2>
                <?php sanitize_title(the_field('news_title')); ?>
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
        <section id="<?php sanitize_title(the_field('studio_title')); ?>" class="studio">
            <h2>
                <?php the_field('studio_title'); ?>
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
            
            <?php if(get_field('studio_video')): ?>
            <div class="video-wrapper clear">
                <?php the_field('studio_video'); ?>
            </div>
            <br>
            <?php endif; ?>
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
        <section id="<?php sanitize_title(the_field('courses_title')); ?>" class="courses">
            <h2>
                <?php the_field('courses_title'); ?>
                <?php if(get_field('courses_subtitle')): ?>
                    <p class="em"><?php the_field('courses_subtitle'); ?></p>
                <?php endif; ?>
            </h2>
            <!-- <div class="row">
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
                    <div class="courses-covid">
                        <a href="#<?php sanitize_title(the_field('booking_title')); ?>">
                            <?php the_field('courses_covid'); ?>
                        </a>
                    </div>
                </div>
                <div class="one-half">
                    <script>

                        var plans = [];

                    </script>
                    <?php
                        $courses = get_posts( array(
                            'post_type' => 'course',
                            'posts_per_page' => -1
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
            </div> -->
            <div class="decoration courses clear">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tri.svg">    
            </div>
            <div class="clear course-descriptions">
                <?php
                    $courses = get_posts( array(
                        'post_type' => 'course',
                        'posts_per_page' => -1
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
        <section id="<?php sanitize_title(the_field('portrait_title')); ?>" class="portrait">
            <h2><?php the_field('portrait_title'); ?></h2>
            <div class="portrait-wrapper">
                <div class="row">
                    <?php foreach( get_field('team') as $team ): ?>
                    <div class="one-half single-portrait-wrapper">
                        <div class="portrait-image" style="background-image: url(<?php echo $team['portrait']['url']; ?>);"></div>
                        <p class="em mb0"><?php echo $team['name']; ?></p>
                        <?php if($team['languages'] != ''): ?><p><?php echo $team['languages']; ?></p><?php endif; ?>
                        <?php if($team['phone'] != ''): ?><p class="mb0"><b><?php echo $team['phone']; ?></b></p><?php endif; ?>
                        <?php if($team['email'] != ''): ?><p><b><?php echo $team['email']; ?></b></p><?php endif; ?>
                        <?php if($team['text'] != ''): ?><?php echo $team['text']; ?><?php endif; ?>
                        <?php if(strpos($team['name'], 'Ahmet') !== false): ?>
                            <p>
                                <a href="javascript:;" class="btn video-btn" data-target="video-ahmet">Video Portrait Ahmet</a>
                            </p>
                        <?php endif; ?>
                        <?php if($team['diplomes'] != ''): ?>
                            <div>
                                <a href="javascript:;" class="diplomes-btn"><b>Diplomes ⬇︎</b></a>
                                <div class="diplomes hide">
                                    <?php echo $team['diplomes']; ?>
                                </div>  
                            </div>  
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="portrait-videos">
                <div class="video-wrapper clear video-ahmet">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/x9EqWj6wo7s" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </section>
        <section id="<?php sanitize_title(the_field('rates_title')); ?>" class="rates">
            <h2>
                <?php the_field('rates_title'); ?>
                <?php if(get_field('rate_subtitle')): ?>
                <p class="em"><?php the_field('rate_subtitle'); ?></p>
                <?php endif; ?>
            </h2>
            <div class="rate-wrapper">
                <?php
                    $rates = get_posts( array(
                        'post_type' => 'rate',
                        'posts_per_page' => -1
                    ) );
                    
                    if ( $rates ) {
                        foreach ( $rates as $post ) :
                            setup_postdata( $post ); ?>
                            
                            <section class="rate">
                                <h3><?php the_title(); ?></h3>
                                <p class="tac"><? _e('from','mana'); ?></p>
                                <p class="price"><? _e('chf','mana'); ?> <?php the_field('price') ?></p>
                                <div class="rate_content"><?php the_content(); ?></div>
                                <h3><a href="#Kontakt"><? _e('contact-us','mana'); ?></a></h3>
                            </section>
                        <?php
                        endforeach; 
                        wp_reset_postdata();
                    }
                ?>
            </div>
        </section>
        <?php get_template_part('includes/contact'); ?>
    </main>

    <a id="tryout-btn" href="mailto:info@studiomana.ch?subject=<?php echo rawurlencode(get_field('tryout_subject')); ?>"></a>
    <a id="booking-btn" href="#<?php sanitize_title(the_field('booking_title')); ?>"></a>

<?php get_footer(); ?>