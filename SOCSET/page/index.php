<?top("Соц сеть");?>
    <div class="conteiner">
        <div id="header">
                Шапка сайта
        </div>
        <div class="middle">
            <div id="left_col">
                <? include("form/login_form.php"); include("form/register_form.php")?>
            </div>
            <div id="content">
                <? include("html/content.php")?>
            </div>   
        </div>
    </div>
    <?bottom(); ?>