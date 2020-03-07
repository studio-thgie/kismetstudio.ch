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

    <div class="burger">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <header>
        <a href="/">
            <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Logo Kismet">
        </a>
        <nav aria-label="Sprachwahl" id="lang">
            <ul>
                <?php foreach(/*icl_get_languages()*/[] as $lang): ?>
                    <li <?php if($lang['active']){ echo 'active'; } ?>" ><a href="<?php echo $lang['url']; ?>"><?php echo $lang['language_code']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </header>