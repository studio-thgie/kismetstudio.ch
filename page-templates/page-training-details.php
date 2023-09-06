<?php

    /*

    Template Name: Training Details
    
    */

    get_header();

?>

<style>

    main nav#navigation, main section {
        padding: 40px 0;
    }

</style>

<div class="hero-header" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/hero-header.png');">
</div>
<main>
    <nav id="navigation">
        <ul>
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
    <section class="courses">
        <h2><?php the_title(); ?></h2>
        <div class="course-descriptions">
            <div class="desc">
                <?php if(count(get_field('image')) == 1): ?>
                    <img src="<?php echo esc_url(get_field('image')[0]['sizes']['plans']); ?>"/>
                <?php else: ?>
                    <div class="course-gallery clear">
                        <?php foreach( get_field('image') as $image ): ?>
                            <div><img src="<?php echo esc_url($image['sizes']['plans']); ?>"/></div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php the_content(); ?>
                <div class="rate-wrapper">
                    <section class="rate">
                        <h3><?php the_title(); ?></h3>
                        <p class="price"><? _e('chf','mana'); ?> <?php the_field('price') ?></p>
                        <div class="rate_content"><?php the_field('teaser') ?></div>
                        <?php if(get_field('link')): ?>
                            <h3><a href="<?php the_field('link'); ?>"><?php _e('inscribe', 'mana'); ?></a></h3>
                        <?php endif; ?>
                        
                    </section>
                </div>
            </div>
        </div>
    </section>
    <?php get_template_part('includes/contact'); ?>
</main>

<?php get_footer(); ?>