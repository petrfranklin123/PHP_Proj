<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'description' ); ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <?php wp_head(); ?>

</head>
<body>
    <header class="header" style="background-image: url(<?php the_field('top_bg') ?>);">
        <div class="header_wrapper">
            <div class="header_radius">
                <div class="header_radius_two">
                    <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/Layer 19.png" alt="" class="img_header_logo">
                    <h2 class="h2_header_title">
                        <?php the_field('h2_header_title') ?>
                    </h2>
                    <span class="header_phone phone">
                        <?php the_field('phone') ?>
                    </span>
                    <h1 class="h1_header">
                        <?php the_field('h1_header') ?>
                    </h1>
                    <img src="<?php the_field('img_header_bottom') ?>" alt="" class="img_header_bottom">
                </div>
            </div>   
        </div>
    </header>