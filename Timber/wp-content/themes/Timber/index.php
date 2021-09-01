<?php get_header(); ?>
    <section class="section_content">
        <div class="content">
            <div class="content_info_title">
                <?php the_field('content_info_title') ?>
            </div>
            <div class="content_info_text_path_one content_text">
                <?php the_field('content_info_text_path_one') ?>
            </div>
            <div class="content_info_text_path_two content_text">
                <?php the_field('content_info_text_path_two') ?>
            </div>
            <div class="content_info_text_path_tree content_text">
                <?php the_field('content_info_text_path_tree') ?>
            </div>
            <div class="content_info_garant content_text">
                <?php the_field('content_info_garant') ?> 
            </div>
        </div>
        <div class="block_img">
            <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/Layer 22.png" alt="" class="img_block_content">
        </div>
        <div class="content">
            <div class="project_title">
                 <?php bloginfo( 'project_title' ); ?>
            </div>
                <section class="primer">
                    <div class="primer_title">
                        <?php bloginfo( 'primer_title' ); ?>
                    </div>
                    <div class="primer_size primer_text">
                         <?php bloginfo( 'primer_size' ); ?>
                    </div>
                    <div class="primer_plosh primer_text">
                         <?php bloginfo( 'primer_plosh' ); ?>
                    </div>
                    <div class="primer_price primer_text">
                         <?php bloginfo( 'primer_price' ); ?>
                    </div>
                    <div class="img_primer_one">
                        <img src="img/house1_1.jpg" alt="" class="img_primer_house">
                    </div>
                    <div class="img_primer_two">
                        <img src="img/house1_2.jpg" alt="" class="img_primer_plan">
                    </div>
                </section>
                <section class="primer">
                    <div class="primer_title">
                        Дом #2
                    </div>
                    <div class="primer_size primer_text">
                        Размер дома: 6 x 7,5
                    </div>
                    <div class="primer_plosh primer_text">
                        Общая площадь дома: 72 кв. м
                    </div>
                    <div class="primer_price primer_text">
                        Стоимость - 457 000 рублей
                    </div>
                    <div class="img_primer_one">
                        <img src="img/house2_1.jpg" alt="" class="img_primer_house">
                    </div>
                    <div class="img_primer_two">
                        <img src="img/house2_2.jpg" alt="" class="img_primer_plan">
                    </div>
                </section>
                <section class="primer">
                    <div class="primer_title">
                        Дом #3
                    </div>
                    <div class="primer_size primer_text">
                        Размер дома: 8 х 7,5
                    </div>
                    <div class="primer_plosh primer_text">
                        Общая площадь дома: 92 кв. м
                    </div>
                    <div class="primer_price primer_text">
                        Стоимость - 635 000 рублей
                    </div>
                    <div class="img_primer_one">
                        <img src="<?php the_field('img_primer_house') ?>" alt="" class="img_primer_house">
                    </div>
                    <div class="img_primer_two">
                        <img src="<?php the_field('img_primer_plan') ?>" alt="" class="img_primer_plan">
                    </div>
                </section>
        </div>
        <section class="download">
            <div class="img_dowload">
                <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/download.png" alt="" class="img_dowload_house">
            </div>
            <a href="#" dowload class="a_dowload"><?php the_field('a_dowload') ?> </a>
        </section>
        <section class="popup">
            <div class="content">
            <div class="popup_title">
                 <?php the_field('popup_title') ?>
            </div>
            <div class="popup_text">
                 <?php the_field('popup_text') ?>
            </div>
            <div class="gallery_inner">
            
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
                <a href="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg"><img src="<?php bloginfo( 'template_url' ); ?>/assets/img/item_1.jpg" alt=""></a>
            </div>
        </section>
        <div class="block_img">
            <img src="<?php bloginfo( 'template_url' ); ?>/assets/img/Layer 22.png" alt="" class="img_block_content">
        </div>
        </div>
    </section>
    <?php get_footer(); ?>