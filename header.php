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
            background-color: var(--primary-color);
            z-index: 9999;

            transition: 0.5s;
        }

        .loading-screen h2 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translateX(-50%) translateY(-70%);
            margin: 0 auto;
        }
    </style>

    <?php wp_head(); ?>

    <!-- <script src='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.11.0/mapbox-gl.css' rel='stylesheet' /> -->

</head>

<body>

    <div class="loading-screen">
        <h2>Loading...</h2>
    </div>

    <div class="burger">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <header>
        <a href="/">
            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Logo Mana">
        </a>
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
    </header>