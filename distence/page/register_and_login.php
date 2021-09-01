<? top("Вход или регистрация"); ?>


    <header class="header">
        <div class="header_block">
            <div class="search">
                <input type="text" class="search-input" placeholder="Search">
                <a href="#" class="search_link"></a>
            </div>
            
        </div>
    </header>
    <div class="conteiner">
        <div class="wrapper_register activation_absolute">
            
            <div class="register_info">

            <? activation_akkaunt(); ?>
            </div>
            <section class="register_flex">
                <div class="register_form_register">
                    <div class="register_and_login_flex">
                        <div class="reg_form">
                            <p class="register_title p_register">Быстрая регистрация</p>
                            <div id="inform"></div>
                            <input class="input_style" type="text" placeholder="Email" name="email" id="email"><br>
                            <input class="input_style" type="password" placeholder="Введите пароль" name="password" id="password"><br>
                            <input class="input_style" type="password" placeholder="Повторите пароль" name="password_2" id="password_2"><br>
                            <input id="register_submit" class="register_submit" type="submit" name="enter" class="submit" value="Зарегистрироваться">
                        </div>
                    </div>
                </div>
                <div class="register_form_login">
                    <div class="register_and_login_flex">
                        <div class="form_login">
                            <p class="login_title p_register">Войти в профиль</p>
                            <div id="inform_2"></div>
                            <input class="input_style" type="text" placeholder="Email" name="email_2" id="email_2"><br>
                            <input class="input_style" type="password" placeholder="Введите пароль" name="password_3" id="password_3"><br>
                            <input id="login_submit" class="register_submit" type="submit" name="enter" class="submit_2" value="Войти">    
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
<?bottom(); ?>