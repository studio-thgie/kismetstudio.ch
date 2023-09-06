<div class="decoration contact">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/tri.svg">    
</div>
<section id="<?php sanitize_title(the_field('contact_title', get_option('page_on_front'))); ?>" class="contact">
    <h2>
        <?php sanitize_title(the_field('contact_title', get_option('page_on_front'))); ?>
        <?php if(get_field('contact_subtitle')): ?>
            <p class="em"><?php the_field('contact_subtitle', get_option('page_on_front')); ?></p>
        <?php endif; ?>
    </h2>
    <div class="portraits">
        <?php foreach( get_field('team', get_option('page_on_front')) as $team ): ?>
            <div class="portrait">
                <p class="em"><?php echo $team['name']; ?></p>
                <div style="background-image: url(<?php echo $team['portrait']['url']; ?>);"></div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="row">
        <div class="two-third map">
            <div id="map" style="width: 100%; height: 400px;"></div>
            <a href="https://www.google.com/maps/dir/Studio+Mana,+Rue+de+Nidau+8,+2502+Bienne" target="_blank" id="directions-btn">
                <?php _e('directions', 'mana'); ?>
            </a>
        </div>
        <div class="one-third">
            <?php the_field('contact_desc', get_option('page_on_front')); ?>
            <div class="social-media">
                <a target="_blank" href="https://www.instagram.com/studio_mana_biel_bienne/">
                    <?php echo file_get_contents( get_template_directory_uri() . '/assets/images/Instagram.svg' ); ?>
                </a>
                <a target="_blank" href="https://www.facebook.com/kismetstudio">
                    <?php echo file_get_contents( get_template_directory_uri() . '/assets/images/Facebook.svg' ); ?>
                </a>
                <a target="_blank" href="https://www.youtube.com/channel/UCosei1621m8QyltHxoOC8cA">
                    <?php echo file_get_contents( get_template_directory_uri() . '/assets/images/Youtube.svg' ); ?>
                </a>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</section>