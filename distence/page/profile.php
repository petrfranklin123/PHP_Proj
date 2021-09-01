<? top("Профиль"); ?>
<? header_bar(); ?>
    <div class="conteiner">
        <div class="wrapper">
            <?left_bar();?>

            <section class="profile">
                <div class="profile_header">
                    <div class="profile_header_img" style="background-image: url(img/fon1.jpg);">
                        
                    </div>
                    <div class="profile_header_bar">
                        <div class="profile_header_bar_img" style="background-image: url(img/img_profile.jpg);">
                            
                        </div>
                        <div class="profile_header_bar_buttom">
                            <a href="" class="profile_header_buttom">
                                <span class="header_buttom_col">271</span>
                                <span class="header_buttom_title">Подписчики</span>
                            </a>
                            <a href="" class="profile_header_buttom">
                                <span class="header_buttom_col">98</span>
                                <span class="header_buttom_title">Подписки</span>
                            </a>
                            <a href="" class="profile_header_buttom">
                                <span class="header_buttom_col">46</span>
                                <span class="header_buttom_title">Фотографии</span>
                            </a>
                            <a href="" class="profile_header_buttom">
                                <span class="header_buttom_col">11</span>
                                <span class="header_buttom_title">Избранные</span>
                            </a>                            
                        </div>
                    </div>
                </div>
                <section class="info_profile">
                    <div class="conteiner_info_profile">
                        <p id="name_profile" class="p_info_profile">
                            Нет имени
                        </p>
                        <input type="text" class="input_edit_profile" id="input_name" name="input_name">
                        <p id="famale_profile" class="p_info_profile">
                            Нет фамилии
                        </p>
                        <input type="text" class="input_edit_profile" id="input_famale" name="input_famale">
                        <p id="how_old_profile" class="p_info_profile">
                            Вам 
                        </p>
                        <div class="select" id="select_how_old">
                            <div class="select_header">
                                <span id="select_how_old" class="select_current">Укажите дату рождения</span>
                            </div>
                            <!--<div class="select_icon">&times;</div>-->
                            <div class="select_body">
                                <?
                                    for($i = 2020; $i > 1900; $i--){
                                        echo"<div value=".$i." class='select_item'>".$i."</div>";
                                    }
                                ?>

                            </div>
                        </div>                        
                        <div class="conteiner_a_edit">
                            <a href="" class="edit_profile" id="a_edit_profile">Редактировать</a>
                            <a href="" class="edit_profile" id="a_save_profile">Сохранить</a>                              
                        </div>

                        <div id="test">
                            
                        </div>
                    </div>
                </section>
            </section>

    </div>
</div>
<?bottom(); ?>