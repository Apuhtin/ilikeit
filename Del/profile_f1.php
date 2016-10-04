<?php 
AcessKabinet();
Head("Like | Профиль пользователя")?>

<body>

<?php Menu(1)?> 
 
    <script language="javascript" type="text/javascript">
    function SaveUser(){
        var UserId = $('#UserId').val();
        var NikName = $('#NikName').val();
        var Name = $('#Name').val();
        var LastName = $('#LastName').val();
        var SecondName = $('#SecondName').val();
        var Sex = $('#Sex').val();
        var Lang = $('#Lang').val();

        $.ajax({
            type: "POST",
            url: "?mode=profile&SaveUser=1",
            data: {UserId:UserId, NikName:NikName, Name:Name, LastName:LastName, SecondName:SecondName, Sex:Sex, Lang:Lang}
        }).done(function( result )
            {
                $("#msgSaveUser").html(result);
            });
    }
    
    function SaveUser(){
        var UserId = $('#UserId').val();
        var NikName = $('#NikName').val();
        var Name = $('#Name').val();
        var LastName = $('#LastName').val();
        var SecondName = $('#SecondName').val();
        var Sex = $('#Sex').val();
        var Lang = $('#Lang').val();

        $.ajax({
            type: "POST",
            url: "?mode=profile&SaveUser=1",
            data: {UserId:UserId, NikName:NikName, Name:Name, LastName:LastName, SecondName:SecondName, Sex:Sex, Lang:Lang}
        }).done(function( result )
            {
                $("#msgSaveUser").html(result);
            });
    }    
    
    </script>    
    
    <article>        
                 
    <div class="FormGroup">
        <?php MessageShow()?> 
   
        <h2>Аватар</h2>
        <div class="DivAvatar200">
            <div class="DivBrAvatar200">
                <img class ="Avatar200" class=" thumbnail" src="<?php if(isset($_SESSION['UserId'])) {
                                                                        echo '../ImgAvatar/B_'.$_SESSION['UserId'].'.png';} 
                                                                ?>">
            </div>
        </div>
        
        <form action="?mode=profile" method="post" enctype="multipart/form-data">
            <input type="hidden" name="UserId" <?php if(isset($_SESSION['UserId'])) {
                                                        echo 'value ="'.$_SESSION['UserId'].'"';} 
                                                ?>>            
            <input type="file" id="ButtonDownload" name="filename">
            <input type="submit" class="ButtonInput" value="Загрузить" name="DownloadFile">

        </form>  
        <div class = "FormGroupTxt">
                Рекомендуемый размер картинки 200х200 пикселей.</br> 
                Допустимые форматы кртинки: JPG(JPEG), PNG.</br>
                Размер файла не более 2 Мб. 
        </div> 
    </div> 

    <div class="FormGroup">
        
        <h2>Персональные данные</h2>
        <!--<form action="?mode=profile" method="POST">-->
            <input type="hidden" name="UserId"  id="UserId" <?php if(isset($_SESSION['UserId'])) {
                                                        echo 'value ="'.$_SESSION['UserId'].'"';} 
                                                ?>>
            <div class="FormElements">
                <div class="ColLabel">
                    Login <span style="color:red;">*</span>								
                </div>
                <div class="ColInput">
                    <input  type="text" name="NikName" id="NikName" maxlength="100" placeholder="Логин" autofocus value="apuhtin_denis">                        
                </div>
            </div>
            <div class="FormElements">
                <div class="ColLabel">
                    Имя							
                </div>
                <div class="ColInput">
                    <input  type="text" name="Name" id="Name" maxlength="100" placeholder="Имя"  value="Денис">                        
                </div>
            </div>            
            <div class="FormElements">
                <div class="ColLabel">
                    Фамилия							
                </div>
                <div class="ColInput">
                    <input  type="text" name="LastName" id="LastName" maxlength="100" placeholder="Фамилия"  value="Апухтин">                        
                </div>
            </div>                
            <div class="FormElements">
                <div class="ColLabel">
                    Отчество							
                </div>
                <div class="ColInput">
                    <input  type="text" name="SecondName" id="SecondName" maxlength="100" placeholder="Отчество"  value="">                        
                </div>
            </div>   
            <div class="FormElements">
                <div class="ColLabel">
                    Пол							
                </div>
                <div class="ColInput"> 
                    <select name="Sex" id="Sex" class="select">
                        <option selected value="0">Не определен</option>
                        <option value="1">Мужской</option>
                        <option value="2">Женский</option>
                    </select>  
                </div> 
            </div>          
            <div class="FormElements">
                <div class="ColLabel">
                    Язык							
                </div>
                <div class="ColInput"> 
                    <select name="Lang" id="Lang" class="select">
                        <option selected value="0">Русский</option>
                        <option value="1">Английский</option>
                    </select>  
                </div> 
            </div> 
            
            <input type="button" name="InputSaveUser" class="ButtonProfile" id="submit" value="Сохранить" onClick = "SaveUser()" />
            <div class="Msg" id="msgSaveUser"></div>
            <!--<input type="submit" class="ButtonProfile" value="Сохранить" name="SaveUser">-->
        <!--</form>-->
         
        
    </div>
    <div class="FormGroup">
        
        <h2>Контактная информация</h2>
        <form action="?mode=profile" method="POST">
            <input type="hidden" name="UserId" <?php if(isset($_SESSION['UserId'])) {
                                                        echo 'value ="'.$_SESSION['UserId'].'"';} 
                                                ?>>
            <div class="FormElements">
                <div class="ColLabel">
                    Email <span style="color:red;">*</span>							
                </div>                            
                <div class="ColInput">
                    <input disabled="disabled" type="email" placeholder="E-mail" <?php if(isset($_SESSION['Email'])) {
                                                                            echo 'value ="'.$_SESSION['Email'].'"';} 
                                                                           ?>  required name="email">                                  
                </div>
            </div>
            <div class="FormElements">
                <div class="ColLabel">
                        Телефон							
                </div>
                <div class="ColInput">
                           <input  type="text" name="Tel" maxlength="100" placeholder="Телефон"  value="">                        
                </div>
            </div>     
            <div class="FormElements">
                <div class="ColLabel">
                    Скайп							
                </div>
                <div class="ColInput">
                    <input  type="text" name="Skype" maxlength="100" placeholder="Скайп"  value="">                        
                </div>
            </div>                
            <div class="FormElements">
                <div class="ColLabel">
                    ISQ							
                </div>
                <div class="ColInput">
                    <input  type="text" name="ISQ" maxlength="100" placeholder="ISQ"  value="">                        
                </div>
            </div>                    
            <input type="submit" class="ButtonProfile" value="Сохранить" name="SaveContact">
        </form>
    </div>

    <div class="FormGroup">
        <h2>Уведомления на почту</h2>
        <form action="?mode=profile" method="POST">
            <input type="hidden" name="UserId" <?php if(isset($_SESSION['UserId'])) {
                                                        echo 'value ="'.$_SESSION['UserId'].'"';} 
                                                ?>>                
            <div class="FormElements">
                <div class="ColInput100"> 
                    <select name="MessageEmal" class="select">
                        <option selected value="0" >Отправлять</option>
                        <option value="1">Не отправлять</option>

                    </select>  
                </div> 
            </div>           
            <input type="submit" class="ButtonProfile" value="Сохранить" name="SaveMessage">
        </form>
    </div>

    <div class="FormGroup">
  
        <h2>Изменить пароль</h2>
        <form action="?mode=recovery2" method="POST">                
            <input type="hidden" name="UserId" <?php if(isset($_SESSION['UserId'])) {
                                                        echo 'value ="'.$_SESSION['UserId'].'"';} 
                                                ?>>                

            <div class="FormElements">
                <div class="ColInput100">
                    <input id="password" type="password" placeholder="Новый пароль" autofocus required name="pass">
                </div>
            </div>
            <div class="FormElements">
                <div class="ColInput100">
                    <input type="password" placeholder="Подтверждение пароля" name="pass2"> 
                </div>
            </div>
            <input type="submit" class="ButtonProfile" value="Сохранить" name="SavePassword">                      
        </form>
    </div>

    <div class="FormGroup">
        <form action="?mode=profile" method="POST">
            <input type="hidden" name="UserId" <?php if(isset($_SESSION['UserId'])) {
                                                        echo 'value ="'.$_SESSION['UserId'].'"';} 
                                                ?>>          
            <input type="submit" class="ButtonProfile" value="Удалить аккаунт" name="DeleteUser">
        </form>    
    </div>
<!--            <div class="FormElements">
                <div class="ColLabel">
                    Пол							</div>
                <div class="ColInputwrap-gender">

                    <div class="select2-container select2" id="s2id_autogen1" style="width: 100%;"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen select2-unactive" id="select2-chosen-2">Мужской</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen2" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-2" id="s2id_autogen2"><div class="select2-drop select2-display-none">   <div class="select2-search" style="display: none;">       <label for="s2id_autogen2_search" class="select2-offscreen"></label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-2" id="s2id_autogen2_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-2">   </ul></div></div><select class="select2 select2-offscreen" name="PERSONAL_GENDER" tabindex="-1" title="">
                        <option value=" " selected="" disabled="">Пол</option>
                        <option selected="selected" value="M">Мужской</option>
                        <option value="F">Женский</option>

                    </select>
                </div>
            </div>

            <div class="FormElements">
                <div class="ColLabel">
                    Город<span style="color:red;">*</span>						</div>
                <div class="col-md-9">

                    <div class="select2-container select2" id="s2id_autogen3" style="width: 100%;"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen select2-unactive" id="select2-chosen-4">Иваново</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen4" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-4" id="s2id_autogen4"><div class="select2-drop select2-display-none">   <div class="select2-search" style="display: block;">       <label for="s2id_autogen4_search" class="select2-offscreen"></label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-4" id="s2id_autogen4_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-4">   </ul></div></div><select class="select2 select2-offscreen" data-select-search="true" name="PERSONAL_CITY" tabindex="-1" title="">
                        <option value="0">Город</option>
                        <option value="Абаза">Абаза</option><option value="Абакан">Абакан</option><option value="Абдулино">Абдулино</option><option value="Абинск">Абинск</option><option value="Агидель">Агидель</option><option value="Агрыз">Агрыз</option><option value="Адыгейск">Адыгейск</option><option value="Азнакаево">Азнакаево</option><option value="Азов">Азов</option><option value="Ак-Довурак">Ак-Довурак</option><option value="Аксай">Аксай</option><option value="Актау">Актау</option><option value="Актобе">Актобе</option><option value="Алагир">Алагир</option><option value="Алапаевск">Алапаевск</option><option value="Алатырь">Алатырь</option><option value="Алдан">Алдан</option><option value="Алейск">Алейск</option><option value="Александров">Александров</option><option value="Александровск">Александровск</option><option value="Александровск-Сахалинский">Александровск-Сахалинский</option><option value="Алексеевка">Алексеевка</option><option value="Алексин">Алексин</option><option value="Алзамай">Алзамай</option><option value="Алматы">Алматы</option><option value="Альметьевск">Альметьевск</option><option value="Амурск">Амурск</option><option value="Анадырь">Анадырь</option><option value="Анапа">Анапа</option><option value="Ангарск">Ангарск</option><option value="Андреаполь">Андреаполь</option><option value="Анжеро-Судженск">Анжеро-Судженск</option><option value="Анива">Анива</option><option value="Апатиты">Апатиты</option><option value="Апрелевка">Апрелевка</option><option value="Апшеронск">Апшеронск</option><option value="Аральск">Аральск</option><option value="Арамиль">Арамиль</option><option value="Аргун">Аргун</option><option value="Ардатов">Ардатов</option><option value="Ардон">Ардон</option><option value="Арзамас">Арзамас</option><option value="Аркадак">Аркадак</option><option value="Армавир">Армавир</option><option value="Арсеньев">Арсеньев</option><option value="Арск">Арск</option><option value="Артем">Артем</option><option value="Артемовск">Артемовск</option><option value="Артемовский">Артемовский</option><option value="Архангельск">Архангельск</option><option value="Асбест">Асбест</option><option value="Асино">Асино</option><option value="Астана">Астана</option><option value="Астрахань">Астрахань</option><option value="Аткарск">Аткарск</option><option value="Атырау">Атырау</option><option value="Ахтубинск">Ахтубинск</option><option value="Ачинск">Ачинск</option><option value="Аша">Аша</option><option value="Бабаево">Бабаево</option><option value="Бабушкин">Бабушкин</option><option value="Бавлы">Бавлы</option><option value="Багратионовск">Багратионовск</option><option value="Байкальск">Байкальск</option><option value="Байконур">Байконур</option><option value="Байконур">Байконур</option><option value="Баймак">Баймак</option><option value="Бакал">Бакал</option><option value="Баксан">Баксан</option><option value="Баку">Баку</option><option value="Балабаново">Балабаново</option><option value="Балаково">Балаково</option><option value="Балахна">Балахна</option><option value="Балашиха">Балашиха</option><option value="Балашов">Балашов</option><option value="Балей">Балей</option><option value="Балтийск">Балтийск</option><option value="Балхаш">Балхаш</option><option value="Барабинск">Барабинск</option><option value="Барнаул">Барнаул</option><option value="Барыш">Барыш</option><option value="Батайск">Батайск</option><option value="Батуми">Батуми</option><option value="Бежецк">Бежецк</option><option value="Белая Калитва">Белая Калитва</option><option value="Белая Холуница">Белая Холуница</option><option value="Белгород">Белгород</option><option value="Белебей">Белебей</option><option value="Белев">Белев</option><option value="Белинский">Белинский</option><option value="Белово">Белово</option><option value="Белогорск">Белогорск</option><option value="Белозерск">Белозерск</option><option value="Белокуриха">Белокуриха</option><option value="Беломорск">Беломорск</option><option value="Белорецк">Белорецк</option><option value="Белореченск">Белореченск</option><option value="Белоусово">Белоусово</option><option value="Белоярский">Белоярский</option><option value="Белый">Белый</option><option value="Бердск">Бердск</option><option value="Березники">Березники</option><option value="Березовский (Кемеровская обл.)">Березовский (Кемеровская обл.)</option><option value="Березовский (Свердловская обл.)">Березовский (Свердловская обл.)</option><option value="Беслан">Беслан</option><option value="Бийск">Бийск</option><option value="Бикин">Бикин</option><option value="Билибино">Билибино</option><option value="Биробиджан">Биробиджан</option><option value="Бирск">Бирск</option><option value="Бирюсинск">Бирюсинск</option><option value="Бирюч">Бирюч</option><option value="Бишкек">Бишкек</option><option value="Благовещенск (Амурская область)">Благовещенск (Амурская область)</option><option value="Благовещенск (Башкортостан)">Благовещенск (Башкортостан)</option><option value="Благодарный">Благодарный</option><option value="Бобров">Бобров</option><option value="Бобруйск">Бобруйск</option><option value="Богданович">Богданович</option><option value="Богородицк">Богородицк</option><option value="Богородск">Богородск</option><option value="Боготол">Боготол</option><option value="Богучар">Богучар</option><option value="Бодайбо">Бодайбо</option><option value="Бокситогорск">Бокситогорск</option><option value="Болгар">Болгар</option><option value="Бологое">Бологое</option><option value="Болотное">Болотное</option><option value="Болохово">Болохово</option><option value="Болхов">Болхов</option><option value="Большой Камень">Большой Камень</option><option value="Бор">Бор</option><option value="Борзя">Борзя</option><option value="Борисоглебск">Борисоглебск</option><option value="Боровичи">Боровичи</option><option value="Боровск">Боровск</option><option value="Бородино">Бородино</option><option value="Братск">Братск</option><option value="Брест">Брест</option><option value="Бронницы">Бронницы</option><option value="Брянск">Брянск</option><option value="Бугульма">Бугульма</option><option value="Бугуруслан">Бугуруслан</option><option value="Буденновск">Буденновск</option><option value="Бузулук">Бузулук</option><option value="Буинск">Буинск</option><option value="Буй">Буй</option><option value="Буйнакск">Буйнакск</option><option value="Бутурлиновка">Бутурлиновка</option><option value="Валдай">Валдай</option><option value="Валуйки">Валуйки</option><option value="Велиж">Велиж</option><option value="Великие Луки">Великие Луки</option><option value="Великие Луки-1">Великие Луки-1</option><option value="Великий Новгород">Великий Новгород</option><option value="Великий Устюг">Великий Устюг</option><option value="Вельск">Вельск</option><option value="Венев">Венев</option><option value="Вентспилс">Вентспилс</option><option value="Верещагино">Верещагино</option><option value="Верея">Верея</option><option value="Верхнеуральск">Верхнеуральск</option><option value="Верхний Тагил">Верхний Тагил</option><option value="Верхний Уфалей">Верхний Уфалей</option><option value="Верхняя Пышма">Верхняя Пышма</option><option value="Верхняя Салда">Верхняя Салда</option><option value="Верхняя Тура">Верхняя Тура</option><option value="Верхотурье">Верхотурье</option><option value="Верхоянск">Верхоянск</option><option value="Весьегонск">Весьегонск</option><option value="Ветлуга">Ветлуга</option><option value="Видное">Видное</option><option value="Вильнюс">Вильнюс</option><option value="Вилюйск">Вилюйск</option><option value="Вилючинск">Вилючинск</option><option value="Винница">Винница</option><option value="Витебск">Витебск</option><option value="Вихоревка">Вихоревка</option><option value="Вичуга">Вичуга</option><option value="Владивосток">Владивосток</option><option value="Владикавказ">Владикавказ</option><option value="Владимир">Владимир</option><option value="Волгоград">Волгоград</option><option value="Волгодонск">Волгодонск</option><option value="Волгореченск">Волгореченск</option><option value="Волжск">Волжск</option><option value="Волжский">Волжский</option><option value="Вологда">Вологда</option><option value="Володарск">Володарск</option><option value="Волоколамск">Волоколамск</option><option value="Волосово">Волосово</option><option value="Волхов">Волхов</option><option value="Волчанск">Волчанск</option><option value="Вольск">Вольск</option><option value="Вольск-18">Вольск-18</option><option value="Воркута">Воркута</option><option value="Воронеж">Воронеж</option><option value="Воронеж-45">Воронеж-45</option><option value="Ворсма">Ворсма</option><option value="Воскресенск">Воскресенск</option><option value="Воткинск">Воткинск</option><option value="Всеволожск">Всеволожск</option><option value="Вуктыл">Вуктыл</option><option value="Выборг">Выборг</option><option value="Выкса">Выкса</option><option value="Высоковск">Высоковск</option><option value="Высоцк">Высоцк</option><option value="Вытегра">Вытегра</option><option value="Вышний Волочек">Вышний Волочек</option><option value="Вяземский">Вяземский</option><option value="Вязники">Вязники</option><option value="Вязьма">Вязьма</option><option value="Вятские Поляны">Вятские Поляны</option><option value="Гаврилов Посад">Гаврилов Посад</option><option value="Гаврилов-Ям">Гаврилов-Ям</option><option value="Гагарин">Гагарин</option><option value="Гаджиево">Гаджиево</option><option value="Гай">Гай</option><option value="Галич">Галич</option><option value="Гатчина">Гатчина</option><option value="Гвардейск">Гвардейск</option><option value="Гдов">Гдов</option><option value="Геленджик">Геленджик</option><option value="Георгиевск">Георгиевск</option><option value="Глазов">Глазов</option><option value="Голицыно">Голицыно</option><option value="Гомель">Гомель</option><option value="Горбатов">Горбатов</option><option value="Горно-Алтайск">Горно-Алтайск</option><option value="Горнозаводск">Горнозаводск</option><option value="Горняк">Горняк</option><option value="Городец">Городец</option><option value="Городище">Городище</option><option value="Городовиковск">Городовиковск</option><option value="Гороховец">Гороховец</option><option value="Горячий Ключ">Горячий Ключ</option><option value="Грайворон">Грайворон</option><option value="Гремячинск">Гремячинск</option><option value="Гродно">Гродно</option><option value="Грозный">Грозный</option><option value="Грязи">Грязи</option><option value="Грязовец">Грязовец</option><option value="Губаха">Губаха</option><option value="Губкин">Губкин</option><option value="Губкинский">Губкинский</option><option value="Гудермес">Гудермес</option><option value="Гуково">Гуково</option><option value="Гулькевичи">Гулькевичи</option><option value="Гурьевск (Калининградская обл.)">Гурьевск (Калининградская обл.)</option><option value="Гурьевск (Кемеровская обл.)">Гурьевск (Кемеровская обл.)</option><option value="Гусев">Гусев</option><option value="Гусиноозерск">Гусиноозерск</option><option value="Гусь-Хрустальный">Гусь-Хрустальный</option><option value="Гянджа">Гянджа</option><option value="Давлеканово">Давлеканово</option><option value="Дагестанские Огни">Дагестанские Огни</option><option value="Далматово">Далматово</option><option value="Дальнегорск">Дальнегорск</option><option value="Дальнереченск">Дальнереченск</option><option value="Данилов">Данилов</option><option value="Данков">Данков</option><option value="Даугавпилс">Даугавпилс</option><option value="Дегтярск">Дегтярск</option><option value="Дедовск">Дедовск</option><option value="Демидов">Демидов</option><option value="Дербент">Дербент</option><option value="Десногорск">Десногорск</option><option value="Дзержинск">Дзержинск</option><option value="Дзержинский">Дзержинский</option><option value="Дивногорск">Дивногорск</option><option value="Дигора">Дигора</option><option value="Димитровград">Димитровград</option><option value="Дмитриев">Дмитриев</option><option value="Дмитров">Дмитров</option><option value="Дмитровск">Дмитровск</option><option value="Днепродзержинск">Днепродзержинск</option><option value="Днепропетровск">Днепропетровск</option><option value="Дно">Дно</option><option value="Добрянка">Добрянка</option><option value="Долгопрудный">Долгопрудный</option><option value="Долинск">Долинск</option><option value="Домодедово">Домодедово</option><option value="Донецк (Россия)">Донецк (Россия)</option><option value="Донецк (Украина)">Донецк (Украина)</option><option value="Донской">Донской</option><option value="Дорогобуж">Дорогобуж</option><option value="Дрезна">Дрезна</option><option value="Дубна">Дубна</option><option value="Дубовка">Дубовка</option><option value="Дудинка">Дудинка</option><option value="Духовщина">Духовщина</option><option value="Дюртюли">Дюртюли</option><option value="Дятьково">Дятьково</option><option value="Егорьевск">Егорьевск</option><option value="Ейск">Ейск</option><option value="Екатеринбург">Екатеринбург</option><option value="Елабуга">Елабуга</option><option value="Елгава">Елгава</option><option value="Елец">Елец</option><option value="Елизово">Елизово</option><option value="Ельня">Ельня</option><option value="Еманжелинск">Еманжелинск</option><option value="Емва">Емва</option><option value="Енисейск">Енисейск</option><option value="Ереван">Ереван</option><option value="Ермолино">Ермолино</option><option value="Ершов">Ершов</option><option value="Ессентуки">Ессентуки</option><option value="Ефремов">Ефремов</option><option value="Жаркент">Жаркент</option><option value="Жезказган">Жезказган</option><option value="Железноводск">Железноводск</option><option value="Железногорск (Красноярский край.)">Железногорск (Красноярский край.)</option><option value="Железногорск (Курская обл.)">Железногорск (Курская обл.)</option><option value="Железногорск-Илимский">Железногорск-Илимский</option><option value="Железнодорожный">Железнодорожный</option><option value="Жердевка">Жердевка</option><option value="Жигулевск">Жигулевск</option><option value="Жиздра">Жиздра</option><option value="Жирновск">Жирновск</option><option value="Житомир">Житомир</option><option value="Жуков">Жуков</option><option value="Жуковка">Жуковка</option><option value="Жуковский">Жуковский</option><option value="Завитинск">Завитинск</option><option value="Заводоуковск">Заводоуковск</option><option value="Заволжск">Заволжск</option><option value="Заволжье">Заволжье</option><option value="Задонск">Задонск</option><option value="Заинск">Заинск</option><option value="Закаменск">Закаменск</option><option value="Заозерный">Заозерный</option><option value="Заозерск">Заозерск</option><option value="Западная Двина">Западная Двина</option><option value="Заполярный">Заполярный</option><option value="Запорожье">Запорожье</option><option value="Зарайск">Зарайск</option><option value="Заречный (Пензенская обл.)">Заречный (Пензенская обл.)</option><option value="Заречный (Свердловская обл.)">Заречный (Свердловская обл.)</option><option value="Заринск">Заринск</option><option value="Звенигово">Звенигово</option><option value="Звенигород">Звенигород</option><option value="Зверево">Зверево</option><option value="Зеленогорск (Красноярский край)">Зеленогорск (Красноярский край)</option><option value="Зеленогорск (Ленинградская обл.)">Зеленогорск (Ленинградская обл.)</option><option value="Зеленоград">Зеленоград</option><option value="Зеленоградск">Зеленоградск</option><option value="Зеленодольск">Зеленодольск</option><option value="Зеленокумск">Зеленокумск</option><option value="Зерноград">Зерноград</option><option value="Зея">Зея</option><option value="Зима">Зима</option><option value="Златоуст">Златоуст</option><option value="Злынка">Злынка</option><option value="Змеиногорск">Змеиногорск</option><option value="Знаменск">Знаменск</option><option value="Зубцов">Зубцов</option><option value="Зуевка">Зуевка</option><option value="Зыряновск">Зыряновск</option><option value="Ивангород">Ивангород</option><option selected="selected" value="Иваново">Иваново</option><option value="Ивантеевка">Ивантеевка</option><option value="Ивдель">Ивдель</option><option value="Игарка">Игарка</option><option value="Ижевск">Ижевск</option><option value="Избербаш">Избербаш</option><option value="Изобильный">Изобильный</option><option value="Иланский">Иланский</option><option value="Инза">Инза</option><option value="Инсар">Инсар</option><option value="Инта">Инта</option><option value="Ипатово">Ипатово</option><option value="Ирбит">Ирбит</option><option value="Иркутск">Иркутск</option><option value="Иркутск-45">Иркутск-45</option><option value="Иртышск">Иртышск</option><option value="Исилькуль">Исилькуль</option><option value="Искитим">Искитим</option><option value="Истра">Истра</option><option value="Ишим">Ишим</option><option value="Ишимбай">Ишимбай</option><option value="Йошкар-Ола">Йошкар-Ола</option><option value="Кадников">Кадников</option><option value="Казань">Казань</option><option value="Калач">Калач</option><option value="Калач-на-Дону">Калач-на-Дону</option><option value="Калачинск">Калачинск</option><option value="Калининград">Калининград</option><option value="Калининск">Калининск</option><option value="Калтан">Калтан</option><option value="Калуга">Калуга</option><option value="Калязин">Калязин</option><option value="Камбарка">Камбарка</option><option value="Каменка">Каменка</option><option value="Каменногорск">Каменногорск</option><option value="Каменск-Уральский">Каменск-Уральский</option><option value="Каменск-Шахтинский">Каменск-Шахтинский</option><option value="Камень-на-Оби">Камень-на-Оби</option><option value="Камешково">Камешково</option><option value="Камызяк">Камызяк</option><option value="Камышин">Камышин</option><option value="Камышлов">Камышлов</option><option value="Канаш">Канаш</option><option value="Кандалакша">Кандалакша</option><option value="Канск">Канск</option><option value="Карабаново">Карабаново</option><option value="Карабаш">Карабаш</option><option value="Карабулак">Карабулак</option><option value="Караганда">Караганда</option><option value="Карасук">Карасук</option><option value="Карачаевск">Карачаевск</option><option value="Карачев">Карачев</option><option value="Каргат">Каргат</option><option value="Каргополь">Каргополь</option><option value="Карпинск">Карпинск</option><option value="Карталы">Карталы</option><option value="Касимов">Касимов</option><option value="Касли">Касли</option><option value="Каспийск">Каспийск</option><option value="Катав-Ивановск">Катав-Ивановск</option><option value="Катайск">Катайск</option><option value="Каунас">Каунас</option><option value="Качканар">Качканар</option><option value="Кашин">Кашин</option><option value="Кашира">Кашира</option><option value="Кедровый">Кедровый</option><option value="Кемерово">Кемерово</option><option value="Кемь">Кемь</option><option value="Киев">Киев</option><option value="Кизел">Кизел</option><option value="Кизилюрт">Кизилюрт</option><option value="Кизляр">Кизляр</option><option value="Кимовск">Кимовск</option><option value="Кимры">Кимры</option><option value="Кингисепп">Кингисепп</option><option value="Кинель">Кинель</option><option value="Кинешма">Кинешма</option><option value="Киреевск">Киреевск</option><option value="Киренск">Киренск</option><option value="Киржач">Киржач</option><option value="Кириллов">Кириллов</option><option value="Кириши">Кириши</option><option value="Киров (Калужская обл.)">Киров (Калужская обл.)</option><option value="Киров (Кировская обл.)">Киров (Кировская обл.)</option><option value="Кировград">Кировград</option><option value="Кирово-Чепецк">Кирово-Чепецк</option><option value="Кировоград">Кировоград</option><option value="Кировск (Ленинградская обл.)">Кировск (Ленинградская обл.)</option><option value="Кировск (Мурманская обл.)">Кировск (Мурманская обл.)</option><option value="Кирс">Кирс</option><option value="Кирсанов">Кирсанов</option><option value="Киселевск">Киселевск</option><option value="Кисловодск">Кисловодск</option><option value="Кишинев">Кишинев</option><option value="Клайпеда">Клайпеда</option><option value="Климовск">Климовск</option><option value="Клин">Клин</option><option value="Клинцы">Клинцы</option><option value="Княгинино">Княгинино</option><option value="Ковдор">Ковдор</option><option value="Ковров">Ковров</option><option value="Ковылкино">Ковылкино</option><option value="Когалым">Когалым</option><option value="Кодинск">Кодинск</option><option value="Козельск">Козельск</option><option value="Козловка">Козловка</option><option value="Козьмодемьянск">Козьмодемьянск</option><option value="Кола">Кола</option><option value="Кологрив">Кологрив</option><option value="Коломна">Коломна</option><option value="Колпашево">Колпашево</option><option value="Колпино">Колпино</option><option value="Кольчугино">Кольчугино</option><option value="Коммунар">Коммунар</option><option value="Комсомольск">Комсомольск</option><option value="Комсомольск-на-Амуре">Комсомольск-на-Амуре</option><option value="Конаково">Конаково</option><option value="Кондопога">Кондопога</option><option value="Кондрово">Кондрово</option><option value="Константиновск">Константиновск</option><option value="Копейск">Копейск</option><option value="Кораблино">Кораблино</option><option value="Кореновск">Кореновск</option><option value="Коркино">Коркино</option><option value="Королев">Королев</option><option value="Короча">Короча</option><option value="Корсаков">Корсаков</option><option value="Коряжма">Коряжма</option><option value="Костанай">Костанай</option><option value="Костерево">Костерево</option><option value="Костомукша">Костомукша</option><option value="Кострома">Кострома</option><option value="Котельники">Котельники</option><option value="Котельниково">Котельниково</option><option value="Котельнич">Котельнич</option><option value="Котлас">Котлас</option><option value="Котово">Котово</option><option value="Котовск">Котовск</option><option value="Кохма">Кохма</option><option value="Красавино">Красавино</option><option value="Красноармейск (Московская обл.)">Красноармейск (Московская обл.)</option><option value="Красноармейск (Саратовская обл.)">Красноармейск (Саратовская обл.)</option><option value="Красновишерск">Красновишерск</option><option value="Красногорск">Красногорск</option><option value="Краснодар">Краснодар</option><option value="Красное Село">Красное Село</option><option value="Краснозаводск">Краснозаводск</option><option value="Краснознаменск (Калининградская обл.)">Краснознаменск (Калининградская обл.)</option><option value="Краснознаменск (Московская обл.)">Краснознаменск (Московская обл.)</option><option value="Краснокаменск">Краснокаменск</option><option value="Краснокамск">Краснокамск</option><option value="Краснослободск (Волгоградская обл.)">Краснослободск (Волгоградская обл.)</option><option value="Краснослободск (Мордовия респ.)">Краснослободск (Мордовия респ.)</option><option value="Краснотурьинск">Краснотурьинск</option><option value="Красноуральск">Красноуральск</option><option value="Красноуфимск">Красноуфимск</option><option value="Красноярск">Красноярск</option><option value="Красный Кут">Красный Кут</option><option value="Красный Сулин">Красный Сулин</option><option value="Красный Холм">Красный Холм</option><option value="Кременки">Кременки</option><option value="Кривой Рог">Кривой Рог</option><option value="Кронштадт">Кронштадт</option><option value="Кропоткин">Кропоткин</option><option value="Крымск">Крымск</option><option value="Кстово">Кстово</option><option value="Кубинка">Кубинка</option><option value="Кувандык">Кувандык</option><option value="Кувшиново">Кувшиново</option><option value="Кудымкар">Кудымкар</option><option value="Кузнецк">Кузнецк</option><option value="Кузнецк-12">Кузнецк-12</option><option value="Кузнецк-8">Кузнецк-8</option><option value="Куйбышев">Куйбышев</option><option value="Кулебаки">Кулебаки</option><option value="Кумертау">Кумертау</option><option value="Кунгур">Кунгур</option><option value="Купино">Купино</option><option value="Курган">Курган</option><option value="Курганинск">Курганинск</option><option value="Курильск">Курильск</option><option value="Курлово">Курлово</option><option value="Куровское">Куровское</option><option value="Курск">Курск</option><option value="Куртамыш">Куртамыш</option><option value="Курчатов (Курская обл.)">Курчатов (Курская обл.)</option><option value="Курчатов (Ямало-Ненецкий АО)">Курчатов (Ямало-Ненецкий АО)</option><option value="Куса">Куса</option><option value="Кушва">Кушва</option><option value="Кызыл">Кызыл</option><option value="Кыштым">Кыштым</option><option value="Кяхта">Кяхта</option><option value="Лабинск">Лабинск</option><option value="Лабытнанги">Лабытнанги</option><option value="Лагань">Лагань</option><option value="Ладушкин">Ладушкин</option><option value="Лаишево">Лаишево</option><option value="Лакинск">Лакинск</option><option value="Лангепас">Лангепас</option><option value="Лахденпохья">Лахденпохья</option><option value="Лебедянь">Лебедянь</option><option value="Лениногорск (Казахстан)">Лениногорск (Казахстан)</option><option value="Лениногорск (Россия)">Лениногорск (Россия)</option><option value="Ленинск">Ленинск</option><option value="Ленинск-Кузнецкий">Ленинск-Кузнецкий</option><option value="Ленск">Ленск</option><option value="Лермонтов">Лермонтов</option><option value="Лесной">Лесной</option><option value="Лесозаводск">Лесозаводск</option><option value="Лесосибирск">Лесосибирск</option><option value="Ливны">Ливны</option><option value="Лиепая">Лиепая</option><option value="Ликино-Дулево">Ликино-Дулево</option><option value="Липецк">Липецк</option><option value="Липки">Липки</option><option value="Лисаковск">Лисаковск</option><option value="Лиски">Лиски</option><option value="Лихославль">Лихославль</option><option value="Лобня">Лобня</option><option value="Лодейное Поле">Лодейное Поле</option><option value="Ломоносов">Ломоносов</option><option value="Лосино-Петровский">Лосино-Петровский</option><option value="Луга">Луга</option><option value="Луганск">Луганск</option><option value="Луза">Луза</option><option value="Лукоянов">Лукоянов</option><option value="Луховицы">Луховицы</option><option value="Лысково">Лысково</option><option value="Лысьва">Лысьва</option><option value="Лыткарино">Лыткарино</option><option value="Львов">Львов</option><option value="Льгов">Льгов</option><option value="Любань">Любань</option><option value="Люберцы">Люберцы</option><option value="Любим">Любим</option><option value="Людиново">Людиново</option><option value="Лянтор">Лянтор</option><option value="Магадан">Магадан</option><option value="Магас">Магас</option><option value="Магнитогорск">Магнитогорск</option><option value="Майкоп">Майкоп</option><option value="Майский">Майский</option><option value="Макаров">Макаров</option><option value="Макарьев">Макарьев</option><option value="Макушино">Макушино</option><option value="Малая Вишера">Малая Вишера</option><option value="Малгобек">Малгобек</option><option value="Малмыж">Малмыж</option><option value="Малоархангельск">Малоархангельск</option><option value="Малоярославец">Малоярославец</option><option value="Мальборк">Мальборк</option><option value="Мамадыш">Мамадыш</option><option value="Мамоново">Мамоново</option><option value="Мантурово">Мантурово</option><option value="Мариинск">Мариинск</option><option value="Мариинский Посад">Мариинский Посад</option><option value="Мариуполь">Мариуполь</option><option value="Маркс">Маркс</option><option value="Махачкала">Махачкала</option><option value="Мглин">Мглин</option><option value="Мегион">Мегион</option><option value="Медвежьегорск">Медвежьегорск</option><option value="Медногорск">Медногорск</option><option value="Медынь">Медынь</option><option value="Межгорье">Межгорье</option><option value="Междуреченск">Междуреченск</option><option value="Мезень">Мезень</option><option value="Меленки">Меленки</option><option value="Мелеуз">Мелеуз</option><option value="Менделеевск">Менделеевск</option><option value="Мензелинск">Мензелинск</option><option value="Мещовск">Мещовск</option><option value="Миасс">Миасс</option><option value="Микунь">Микунь</option><option value="Миллерово">Миллерово</option><option value="Мингечаур">Мингечаур</option><option value="Минеральные Воды">Минеральные Воды</option><option value="Минск">Минск</option><option value="Минусинск">Минусинск</option><option value="Миньяр">Миньяр</option><option value="Мирный (Архангельская обл.)">Мирный (Архангельская обл.)</option><option value="Мирный (респ. Якутия)">Мирный (респ. Якутия)</option><option value="Михайлов">Михайлов</option><option value="Михайловка">Михайловка</option><option value="Михайловск (Свердловская обл.)">Михайловск (Свердловская обл.)</option><option value="Михайловск (Ставропольский край)">Михайловск (Ставропольский край)</option><option value="Мичуринск">Мичуринск</option><option value="Могилев">Могилев</option><option value="Могоча">Могоча</option><option value="Можайск">Можайск</option><option value="Можга">Можга</option><option value="Моздок">Моздок</option><option value="Мончегорск">Мончегорск</option><option value="Морозовск">Морозовск</option><option value="Моршанск">Моршанск</option><option value="Мосальск">Мосальск</option><option value="Москва">Москва</option><option value="Московский">Московский</option><option value="Муравленко">Муравленко</option><option value="Мураши">Мураши</option><option value="Мурманск">Мурманск</option><option value="Муром">Муром</option><option value="Мценск">Мценск</option><option value="Мыски">Мыски</option><option value="Мытищи">Мытищи</option><option value="Мышкин">Мышкин</option><option value="Набережные Челны">Набережные Челны</option><option value="Навашино">Навашино</option><option value="Наволоки">Наволоки</option><option value="Надым">Надым</option><option value="Назарово">Назарово</option><option value="Назрань">Назрань</option><option value="Называевск">Называевск</option><option value="Нальчик">Нальчик</option><option value="Нарва">Нарва</option><option value="Нариманов">Нариманов</option><option value="Наро-Фоминск">Наро-Фоминск</option><option value="Нарткала">Нарткала</option><option value="Нарьян-Мар">Нарьян-Мар</option><option value="Нахичевань">Нахичевань</option><option value="Находка">Находка</option><option value="Невель">Невель</option><option value="Невельск">Невельск</option><option value="Невинномысск">Невинномысск</option><option value="Невьянск">Невьянск</option><option value="Нелидово">Нелидово</option><option value="Неман">Неман</option><option value="Нерехта">Нерехта</option><option value="Нерчинск">Нерчинск</option><option value="Нерюнгри">Нерюнгри</option><option value="Нестеров">Нестеров</option><option value="Нефтегорск">Нефтегорск</option><option value="Нефтекамск">Нефтекамск</option><option value="Нефтекумск">Нефтекумск</option><option value="Нефтеюганск">Нефтеюганск</option><option value="Нея">Нея</option><option value="Нижневартовск">Нижневартовск</option><option value="Нижнекамск">Нижнекамск</option><option value="Нижнеудинск">Нижнеудинск</option><option value="Нижние Серги">Нижние Серги</option><option value="Нижние Серги-3">Нижние Серги-3</option><option value="Нижний Ломов">Нижний Ломов</option><option value="Нижний Новгород">Нижний Новгород</option><option value="Нижний Тагил">Нижний Тагил</option><option value="Нижняя Салда">Нижняя Салда</option><option value="Нижняя Тура">Нижняя Тура</option><option value="Николаев">Николаев</option><option value="Николаевск">Николаевск</option><option value="Николаевск-на-Амуре">Николаевск-на-Амуре</option><option value="Никольск (Вологодская обл.)">Никольск (Вологодская обл.)</option><option value="Никольск (Пензенская обл.)">Никольск (Пензенская обл.)</option><option value="Никольское">Никольское</option><option value="Новая Ладога">Новая Ладога</option><option value="Новая Ляля">Новая Ляля</option><option value="Новоалександровск">Новоалександровск</option><option value="Новоалтайск">Новоалтайск</option><option value="Новоаннинский">Новоаннинский</option><option value="Нововоронеж">Нововоронеж</option><option value="Новодвинск">Новодвинск</option><option value="Новозыбков">Новозыбков</option><option value="Новокубанск">Новокубанск</option><option value="Новокузнецк">Новокузнецк</option><option value="Новокуйбышевск">Новокуйбышевск</option><option value="Новомичуринск">Новомичуринск</option><option value="Новомосковск">Новомосковск</option><option value="Новопавловск">Новопавловск</option><option value="Новоржев">Новоржев</option><option value="Новороссийск">Новороссийск</option><option value="Новосибирск">Новосибирск</option><option value="Новосиль">Новосиль</option><option value="Новосокольники">Новосокольники</option><option value="Новотроицк">Новотроицк</option><option value="Новоузенск">Новоузенск</option><option value="Новоульяновск">Новоульяновск</option><option value="Новоуральск">Новоуральск</option><option value="Новохоперск">Новохоперск</option><option value="Новочебоксарск">Новочебоксарск</option><option value="Новочеркасск">Новочеркасск</option><option value="Новошахтинск">Новошахтинск</option><option value="Новый Оскол">Новый Оскол</option><option value="Новый Уренгой">Новый Уренгой</option><option value="Ногинск">Ногинск</option><option value="Нолинск">Нолинск</option><option value="Норильск">Норильск</option><option value="Ноябрьск">Ноябрьск</option><option value="Нурлат">Нурлат</option><option value="Нытва">Нытва</option><option value="Нюрба">Нюрба</option><option value="Нягань">Нягань</option><option value="Нязепетровск">Нязепетровск</option><option value="Няндома">Няндома</option><option value="Облучье">Облучье</option><option value="Обнинск">Обнинск</option><option value="Обоянь">Обоянь</option><option value="Обь">Обь</option><option value="Одесса">Одесса</option><option value="Одинцово">Одинцово</option><option value="Ожерелье">Ожерелье</option><option value="Озерск (Калининградская обл.)">Озерск (Калининградская обл.)</option><option value="Озерск (Челябинская обл.)">Озерск (Челябинская обл.)</option><option value="Озеры">Озеры</option><option value="Октябрьск">Октябрьск</option><option value="Октябрьский">Октябрьский</option><option value="Окуловка">Окуловка</option><option value="Олекминск">Олекминск</option><option value="Оленегорск">Оленегорск</option><option value="Оленегорск-1">Оленегорск-1</option><option value="Оленегорск-2">Оленегорск-2</option><option value="Оленегорск-4">Оленегорск-4</option><option value="Олонец">Олонец</option><option value="Омск">Омск</option><option value="Омутнинск">Омутнинск</option><option value="Онега">Онега</option><option value="Опочка">Опочка</option><option value="Орел">Орел</option><option value="Оренбург">Оренбург</option><option value="Орехово-Зуево">Орехово-Зуево</option><option value="Орлов">Орлов</option><option value="Орск">Орск</option><option value="Оса">Оса</option><option value="Осинники">Осинники</option><option value="Осташков">Осташков</option><option value="Остров">Остров</option><option value="Островной">Островной</option><option value="Острогожск">Острогожск</option><option value="Отрадное">Отрадное</option><option value="Отрадный">Отрадный</option><option value="Оха">Оха</option><option value="Оханск">Оханск</option><option value="Очер">Очер</option><option value="Павлово">Павлово</option><option value="Павловск (Воронежская обл.)">Павловск (Воронежская обл.)</option><option value="Павловск (Ленинградская обл.)">Павловск (Ленинградская обл.)</option><option value="Павловский Посад">Павловский Посад</option><option value="Павлодар">Павлодар</option><option value="Палласовка">Палласовка</option><option value="Партизанск">Партизанск</option><option value="Певек">Певек</option><option value="Пенза">Пенза</option><option value="Первомайск">Первомайск</option><option value="Первоуральск">Первоуральск</option><option value="Перевоз">Перевоз</option><option value="Пересвет">Пересвет</option><option value="Переславль-Залесский">Переславль-Залесский</option><option value="Пермь">Пермь</option><option value="Пестово">Пестово</option><option value="Петергоф">Петергоф</option><option value="Петров Вал">Петров Вал</option><option value="Петровск">Петровск</option><option value="Петровск-Забайкальский">Петровск-Забайкальский</option><option value="Петрозаводск">Петрозаводск</option><option value="Петропавловск-Камчатский">Петропавловск-Камчатский</option><option value="Петухово">Петухово</option><option value="Петушки">Петушки</option><option value="Печора">Печора</option><option value="Печоры">Печоры</option><option value="Пикалево">Пикалево</option><option value="Пионерский">Пионерский</option><option value="Питкяранта">Питкяранта</option><option value="Плавск">Плавск</option><option value="Пласт">Пласт</option><option value="Плес">Плес</option><option value="Поворино">Поворино</option><option value="Подольск">Подольск</option><option value="Подпорожье">Подпорожье</option><option value="Покачи">Покачи</option><option value="Покров">Покров</option><option value="Покровск">Покровск</option><option value="Полевской">Полевской</option><option value="Полесск">Полесск</option><option value="Полтава">Полтава</option><option value="Полысаево">Полысаево</option><option value="Полярные Зори">Полярные Зори</option><option value="Полярный">Полярный</option><option value="Поронайск">Поронайск</option><option value="Порхов">Порхов</option><option value="Похвистнево">Похвистнево</option><option value="Почеп">Почеп</option><option value="Починок">Починок</option><option value="Пошехонье">Пошехонье</option><option value="Правдинск">Правдинск</option><option value="Приволжск">Приволжск</option><option value="Приморск (Калининградская обл.)">Приморск (Калининградская обл.)</option><option value="Приморск (Ленинградская обл.)">Приморск (Ленинградская обл.)</option><option value="Приморско-Ахтарск">Приморско-Ахтарск</option><option value="Приозерск">Приозерск</option><option value="Прокопьевск">Прокопьевск</option><option value="Пролетарск">Пролетарск</option><option value="Протвино">Протвино</option><option value="Прохладный">Прохладный</option><option value="Псков">Псков</option><option value="Пугачев">Пугачев</option><option value="Пудож">Пудож</option><option value="Пустошка">Пустошка</option><option value="Пучеж">Пучеж</option><option value="Пушкин">Пушкин</option><option value="Пушкино">Пушкино</option><option value="Пущино">Пущино</option><option value="Пыталово">Пыталово</option><option value="Пыть-Ях">Пыть-Ях</option><option value="Пятигорск">Пятигорск</option><option value="Радужный (Владимирская обл.)">Радужный (Владимирская обл.)</option><option value="Радужный (Ханты-Мансийский  АО)">Радужный (Ханты-Мансийский  АО)</option><option value="Райчихинск">Райчихинск</option><option value="Раменское">Раменское</option><option value="Рассказово">Рассказово</option><option value="Ревда">Ревда</option><option value="Реж">Реж</option><option value="Реутов">Реутов</option><option value="Ржев">Ржев</option><option value="Рига">Рига</option><option value="Родники">Родники</option><option value="Рославль">Рославль</option><option value="Россошь">Россошь</option><option value="Ростов">Ростов</option><option value="Ростов-на-Дону">Ростов-на-Дону</option><option value="Рошаль">Рошаль</option><option value="Ртищево">Ртищево</option><option value="Рубцовск">Рубцовск</option><option value="Рудня">Рудня</option><option value="Руза">Руза</option><option value="Рузаевка">Рузаевка</option><option value="Рыбинск">Рыбинск</option><option value="Рыбное">Рыбное</option><option value="Рыльск">Рыльск</option><option value="Ряжск">Ряжск</option><option value="Рязань">Рязань</option><option value="Салават">Салават</option><option value="Салаир">Салаир</option><option value="Салехард">Салехард</option><option value="Сальск">Сальск</option><option value="Самара">Самара</option><option value="Санкт-Петербург">Санкт-Петербург</option><option value="Саранск">Саранск</option><option value="Сарапул">Сарапул</option><option value="Саратов">Саратов</option><option value="Саров">Саров</option><option value="Сасово">Сасово</option><option value="Сатка">Сатка</option><option value="Сафоново">Сафоново</option><option value="Саяногорск">Саяногорск</option><option value="Саянск">Саянск</option><option value="Светлогорск">Светлогорск</option><option value="Светлоград">Светлоград</option><option value="Светлый">Светлый</option><option value="Светогорск">Светогорск</option><option value="Свирск">Свирск</option><option value="Свободный">Свободный</option><option value="Себеж">Себеж</option><option value="Севастополь">Севастополь</option><option value="Северо-Курильск">Северо-Курильск</option><option value="Северобайкальск">Северобайкальск</option><option value="Северодвинск">Северодвинск</option><option value="Североморск">Североморск</option><option value="Североуральск">Североуральск</option><option value="Северск">Северск</option><option value="Севск">Севск</option><option value="Сегежа">Сегежа</option><option value="Сельцо">Сельцо</option><option value="Семенов">Семенов</option><option value="Семикаракорск">Семикаракорск</option><option value="Семилуки">Семилуки</option><option value="Семипалатинск">Семипалатинск</option><option value="Сенгилей">Сенгилей</option><option value="Серафимович">Серафимович</option><option value="Сергач">Сергач</option><option value="Сергиев Посад">Сергиев Посад</option><option value="Сердобск">Сердобск</option><option value="Серебрянск">Серебрянск</option><option value="Серов">Серов</option><option value="Серпухов">Серпухов</option><option value="Сертолово">Сертолово</option><option value="Сестрорецк">Сестрорецк</option><option value="Сибай">Сибай</option><option value="Сим">Сим</option><option value="Симферополь">Симферополь</option><option value="Сковородино">Сковородино</option><option value="Скопин">Скопин</option><option value="Славгород">Славгород</option><option value="Славск">Славск</option><option value="Славянск-на-Кубани">Славянск-на-Кубани</option><option value="Сланцы">Сланцы</option><option value="Слободской">Слободской</option><option value="Слюдянка">Слюдянка</option><option value="Смоленск">Смоленск</option><option value="Снежинск">Снежинск</option><option value="Снежногорск">Снежногорск</option><option value="Собинка">Собинка</option><option value="Советск (Калининградская обл.)">Советск (Калининградская обл.)</option><option value="Советск (Кировская обл.)">Советск (Кировская обл.)</option><option value="Советск (Тульская обл.)">Советск (Тульская обл.)</option><option value="Советская Гавань">Советская Гавань</option><option value="Советский">Советский</option><option value="Сокол">Сокол</option><option value="Солигалич">Солигалич</option><option value="Соликамск">Соликамск</option><option value="Солнечногорск">Солнечногорск</option><option value="Солнечногорск-2">Солнечногорск-2</option><option value="Солнечногорск-25">Солнечногорск-25</option><option value="Солнечногорск-30">Солнечногорск-30</option><option value="Солнечногорск-7">Солнечногорск-7</option><option value="Соль-Илецк">Соль-Илецк</option><option value="Сольвычегодск">Сольвычегодск</option><option value="Сольцы">Сольцы</option><option value="Сольцы 2">Сольцы 2</option><option value="Сорочинск">Сорочинск</option><option value="Сорск">Сорск</option><option value="Сортавала">Сортавала</option><option value="Сосенский">Сосенский</option><option value="Сосновка">Сосновка</option><option value="Сосновоборск">Сосновоборск</option><option value="Сосновый Бор">Сосновый Бор</option><option value="Сосногорск">Сосногорск</option><option value="Сочи">Сочи</option><option value="Спас-Деменск">Спас-Деменск</option><option value="Спас-Клепики">Спас-Клепики</option><option value="Спасск">Спасск</option><option value="Спасск-Дальний">Спасск-Дальний</option><option value="Спасск-Рязанский">Спасск-Рязанский</option><option value="Среднеколымск">Среднеколымск</option><option value="Среднеуральск">Среднеуральск</option><option value="Сретенск">Сретенск</option><option value="Ставрополь">Ставрополь</option><option value="Старая Купавна">Старая Купавна</option><option value="Старая Русса">Старая Русса</option><option value="Старица">Старица</option><option value="Стародуб">Стародуб</option><option value="Старый Оскол">Старый Оскол</option><option value="Стерлитамак">Стерлитамак</option><option value="Стрежевой">Стрежевой</option><option value="Строитель">Строитель</option><option value="Струнино">Струнино</option><option value="Ступино">Ступино</option><option value="Суворов">Суворов</option><option value="Суджа">Суджа</option><option value="Судогда">Судогда</option><option value="Суздаль">Суздаль</option><option value="Сумгаит">Сумгаит</option><option value="Сумы">Сумы</option><option value="Суоярви">Суоярви</option><option value="Сураж">Сураж</option><option value="Сургут">Сургут</option><option value="Суровикино">Суровикино</option><option value="Сурск">Сурск</option><option value="Сусуман">Сусуман</option><option value="Сухиничи">Сухиничи</option><option value="Сухой Лог">Сухой Лог</option><option value="Сухуми">Сухуми</option><option value="Сызрань">Сызрань</option><option value="Сыктывкар">Сыктывкар</option><option value="Сысерть">Сысерть</option><option value="Сычевка">Сычевка</option><option value="Сясьстрой">Сясьстрой</option><option value="Тавда">Тавда</option><option value="Таганрог">Таганрог</option><option value="Тайга">Тайга</option><option value="Тайшет">Тайшет</option><option value="Талдом">Талдом</option><option value="Талдыкорган">Талдыкорган</option><option value="Талица">Талица</option><option value="Таллинн">Таллинн</option><option value="Тамбов">Тамбов</option><option value="Тара">Тара</option><option value="Тараз">Тараз</option><option value="Тарко-Сале">Тарко-Сале</option><option value="Таруса">Таруса</option><option value="Татарск">Татарск</option><option value="Таштагол">Таштагол</option><option value="Тбилиси">Тбилиси</option><option value="Тверь">Тверь</option><option value="Теберда">Теберда</option><option value="Тейково">Тейково</option><option value="Темиртау">Темиртау</option><option value="Темников">Темников</option><option value="Темрюк">Темрюк</option><option value="Терек">Терек</option><option value="Тетюши">Тетюши</option><option value="Тимашевск">Тимашевск</option><option value="Тирасполь">Тирасполь</option><option value="Тихвин">Тихвин</option><option value="Тихорецк">Тихорецк</option><option value="Тобольск">Тобольск</option><option value="Тогучин">Тогучин</option><option value="Тольятти">Тольятти</option><option value="Томари">Томари</option><option value="Томмот">Томмот</option><option value="Томск">Томск</option><option value="Топки">Топки</option><option value="Торжок">Торжок</option><option value="Торопец">Торопец</option><option value="Тосно">Тосно</option><option value="Тотьма">Тотьма</option><option value="Трехгорный">Трехгорный</option><option value="Трехгорный-1">Трехгорный-1</option><option value="Троицк (Московская обл.)">Троицк (Московская обл.)</option><option value="Троицк (Ярославская обл.)">Троицк (Ярославская обл.)</option><option value="Трубчевск">Трубчевск</option><option value="Туапсе">Туапсе</option><option value="Туймазы">Туймазы</option><option value="Тула">Тула</option><option value="Тулун">Тулун</option><option value="Туран">Туран</option><option value="Туринск">Туринск</option><option value="Тутаев">Тутаев</option><option value="Тында">Тында</option><option value="Тырныауз">Тырныауз</option><option value="Тюкалинск">Тюкалинск</option><option value="Тюмень">Тюмень</option><option value="Уварово">Уварово</option><option value="Углегорск">Углегорск</option><option value="Углич">Углич</option><option value="Удачный">Удачный</option><option value="Удомля">Удомля</option><option value="Ужур">Ужур</option><option value="Узловая">Узловая</option><option value="Улан-Удэ">Улан-Удэ</option><option value="Ульяновск">Ульяновск</option><option value="Унеча">Унеча</option><option value="Урай">Урай</option><option value="Уральск">Уральск</option><option value="Урень">Урень</option><option value="Уржум">Уржум</option><option value="Урус-Мартан">Урус-Мартан</option><option value="Урюпинск">Урюпинск</option><option value="Усинск">Усинск</option><option value="Усмань">Усмань</option><option value="Усолье">Усолье</option><option value="Усолье-Сибирское">Усолье-Сибирское</option><option value="Уссурийск">Уссурийск</option><option value="Усть-Джегута">Усть-Джегута</option><option value="Усть-Илимск">Усть-Илимск</option><option value="Усть-Каменогорск">Усть-Каменогорск</option><option value="Усть-Катав">Усть-Катав</option><option value="Усть-Кут">Усть-Кут</option><option value="Усть-Лабинск">Усть-Лабинск</option><option value="Устюжна">Устюжна</option><option value="Уфа">Уфа</option><option value="Ухта">Ухта</option><option value="Учалы">Учалы</option><option value="Уяр">Уяр</option><option value="Фатеж">Фатеж</option><option value="Фокино (Брянская обл.)">Фокино (Брянская обл.)</option><option value="Фокино (Приморский край)">Фокино (Приморский край)</option><option value="Фролово">Фролово</option><option value="Фрязино">Фрязино</option><option value="Фурманов">Фурманов</option><option value="Хабаровск">Хабаровск</option><option value="Хадыженск">Хадыженск</option><option value="Ханты-Мансийск">Ханты-Мансийск</option><option value="Харабали">Харабали</option><option value="Харовск">Харовск</option><option value="Харьков">Харьков</option><option value="Хасавюрт">Хасавюрт</option><option value="Хвалынск">Хвалынск</option><option value="Херсон">Херсон</option><option value="Хилок">Хилок</option><option value="Химки">Химки</option><option value="Хмельницкий">Хмельницкий</option><option value="Холм">Холм</option><option value="Холмск">Холмск</option><option value="Хотьково">Хотьково</option><option value="Цивильск">Цивильск</option><option value="Цимлянск">Цимлянск</option><option value="Чадан">Чадан</option><option value="Чайковский">Чайковский</option><option value="Чапаев">Чапаев</option><option value="Чапаевск">Чапаевск</option><option value="Чаплыгин">Чаплыгин</option><option value="Чебаркуль">Чебаркуль</option><option value="Чебоксары">Чебоксары</option><option value="Чегем">Чегем</option><option value="Чекалин">Чекалин</option><option value="Челябинск">Челябинск</option><option value="Чердынь">Чердынь</option><option value="Черемхово">Черемхово</option><option value="Черепаново">Черепаново</option><option value="Череповец">Череповец</option><option value="Черкасcы">Черкасcы</option><option value="Черкесск">Черкесск</option><option value="Чермоз">Чермоз</option><option value="Чернигов">Чернигов</option><option value="Черноголовка">Черноголовка</option><option value="Черногорск">Черногорск</option><option value="Чернушка">Чернушка</option><option value="Черняховск">Черняховск</option><option value="Чехов">Чехов</option><option value="Чехов-2">Чехов-2</option><option value="Чехов-3">Чехов-3</option><option value="Чехов-8">Чехов-8</option><option value="Чистополь">Чистополь</option><option value="Чита">Чита</option><option value="Чкаловск">Чкаловск</option><option value="Чудово">Чудово</option><option value="Чулым">Чулым</option><option value="Чулым-3">Чулым-3</option><option value="Чусовой">Чусовой</option><option value="Чухлома">Чухлома</option><option value="Шагонар">Шагонар</option><option value="Шадринск">Шадринск</option><option value="Шали">Шали</option><option value="Шарыпово">Шарыпово</option><option value="Шарья">Шарья</option><option value="Шатура">Шатура</option><option value="Шахтерск">Шахтерск</option><option value="Шахтинск">Шахтинск</option><option value="Шахты">Шахты</option><option value="Шахунья">Шахунья</option><option value="Шацк">Шацк</option><option value="Шебекино">Шебекино</option><option value="Шеки">Шеки</option><option value="Шелехов">Шелехов</option><option value="Шенкурск">Шенкурск</option><option value="Шилка">Шилка</option><option value="Шимановск">Шимановск</option><option value="Шиханы">Шиханы</option><option value="Шлиссельбург">Шлиссельбург</option><option value="Шу">Шу</option><option value="Шульбинск">Шульбинск</option><option value="Шумерля">Шумерля</option><option value="Шумиха">Шумиха</option><option value="Шуя">Шуя</option><option value="Шымкент">Шымкент</option><option value="Щекино">Щекино</option><option value="Щелково">Щелково</option><option value="Щербинка">Щербинка</option><option value="Щигры">Щигры</option><option value="Щучье">Щучье</option><option value="Экибастуз">Экибастуз</option><option value="Электрогорск">Электрогорск</option><option value="Электросталь">Электросталь</option><option value="Электроугли">Электроугли</option><option value="Элиста">Элиста</option><option value="Энгельс">Энгельс</option><option value="Энгельс-19">Энгельс-19</option><option value="Энгельс-2">Энгельс-2</option><option value="Эртиль">Эртиль</option><option value="Юбилейный">Юбилейный</option><option value="Югорск">Югорск</option><option value="Южа">Южа</option><option value="Южно-Сахалинск">Южно-Сахалинск</option><option value="Южно-Сухокумск">Южно-Сухокумск</option><option value="Южноуральск">Южноуральск</option><option value="Юрга">Юрга</option><option value="Юрмала">Юрмала</option><option value="Юрьев-Польский">Юрьев-Польский</option><option value="Юрьевец">Юрьевец</option><option value="Юрюзань">Юрюзань</option><option value="Юхнов">Юхнов</option><option value="Юхнов-1">Юхнов-1</option><option value="Юхнов-2">Юхнов-2</option><option value="Ядрин">Ядрин</option><option value="Якутск">Якутск</option><option value="Ялуторовск">Ялуторовск</option><option value="Янаул">Янаул</option><option value="Яранск">Яранск</option><option value="Яровое">Яровое</option><option value="Ярославль">Ярославль</option><option value="Ярцево">Ярцево</option><option value="Ясногорск">Ясногорск</option><option value="Ясный">Ясный</option><option value="Яхрома">Яхрома</option>							</select>
                </div>
            </div>


            <div class="FormElements">
                <div class="ColLabel">
                    Специализация<span style="color:red;">*</span>						</div>
                <div class="ColInputwrap-specialization">

                    <div class="select2-container select2" id="s2id_autogen5" style="width: 100%;"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen select2-unactive" id="select2-chosen-6">  Программист 1С</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen6" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-6" id="s2id_autogen6"><div class="select2-drop select2-display-none">   <div class="select2-search" style="display: none;">       <label for="s2id_autogen6_search" class="select2-offscreen"></label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-6" id="s2id_autogen6_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-6">   </ul></div></div><select class="select2 select2-offscreen" name="UF_SPECIALIZATION" tabindex="-1" title="">
                        <option value=" " selected="" disabled="">Специализация</option>
                        <optgroup label="Бухгалтерия">
                            <option value="16507">  Бухгалтер</option>
                            <option value="16506">  Главный бухгалтер</option>
                            <option value="16508">  Кассир</option>
                            <option value="16509">  Оператор ПК</option>
                            <option value="16510">  Секретарь-делопроизводитель</option>
                        </optgroup>									<optgroup label="Дизайн">
                            <option value="16503">  3D дизайнер</option>
                            <option value="16504">  Flash-аниматор</option>
                            <option value="16502">  Верстальщик интерфейсов</option>
                            <option value="16501">  Дизайнер интерфейсов</option>
                            <option value="16505">  Дизайнер полиграфии</option>
                            <option value="16499">  Директор по дизайну</option>
                            <option value="16500">  Проектировщик интерфейсов</option>
                        </optgroup>									<optgroup label="Закупки">
                            <option value="16522">  Менеджер по закупкам</option>
                            <option value="16521">  Руководитель отдела</option>
                        </optgroup>									<optgroup label="ИТ">
                            <option value="16498">  SEO-специалист</option>
                            <option value="16489">  Unix\Linux администратор</option>
                            <option value="16488">  Windows администратор</option>
                            <option value="16492">  Администратор БД MS SQL</option>
                            <option value="16491">  Администратор БД ORACLE</option>
                            <option value="16480">  ИТ-директор</option>
                            <option value="16495">  Контент-менеджер</option>
                            <option value="16482">  Менеджер проекта</option>
                            <option selected="selected" value="16483">  Программист 1С</option>
                            <option value="16485">  Программист UNIX-приложений</option>
                            <option value="16484">  Программист WEB-приложений</option>
                            <option value="16486">  Программист WIN-приложений</option>
                            <option value="16487">  Программист мобильных приложений</option>
                            <option value="16497">  Сервисный инженер</option>
                            <option value="16490">  Системный администратор</option>
                            <option value="16481">  Системный архитектор</option>
                            <option value="16494">  Сотрудник техподдержки</option>
                            <option value="16493">  Тестировщик</option>
                            <option value="16496">  Технический копирайтер</option>
                        </optgroup>									<optgroup label="Маркетинг и PR">
                            <option value="16526">  PR-менеджер</option>
                            <option value="16527">  SMM-менеджер</option>
                            <option value="16524">  Бренд-маркетолог</option>
                            <option value="16523">  Директор по маркетингу</option>
                            <option value="16525">  Интернет-маркетолог</option>
                            <option value="16529">  Копирайтер</option>
                        </optgroup>									<optgroup label="Персонал">
                            <option value="16531">  HR-Директор</option>
                            <option value="16532">  Менеджер по персоналу</option>
                            <option value="16533">  Преподаватель курсов</option>
                        </optgroup>									<optgroup label="Продажи">
                            <option value="16517">  Консультант</option>
                            <option value="16520">  Менеджер по логистике</option>
                            <option value="16518">  Менеджер по продажам</option>
                            <option value="16519">  Оператор Call-center</option>
                            <option value="16516">  Руководитель отдела продаж</option>
                        </optgroup>									<optgroup label="Управление">
                            <option value="19288">  Генеральный директор</option>
                            <option value="19289">  Исполнительный директор</option>
                            <option value="16512">  Коммерческий директор</option>
                            <option value="19290">  Секретарь-референт </option>
                            <option value="16511">  Финансовый директор</option>
                        </optgroup>									<optgroup label="Финансы">
                            <option value="16513">  Аналитик</option>
                            <option value="16514">  Экономист</option>
                            <option value="16515">  Юрист</option>
                        </optgroup></select>
                </div>
            </div>

            <div class="FormElements">
                <div class="ColLabel">
                    Отрасль<span style="color:red;">*</span>						</div>
                <div class="ColInputwrap-industry">

                    <div class="select2-container select2" id="s2id_autogen7" style="width: 100%;"><a href="javascript:void(0)" class="select2-choice" tabindex="-1">   <span class="select2-chosen select2-unactive" id="select2-chosen-8">Автоматизация учета и управления</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen8" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-8" id="s2id_autogen8"><div class="select2-drop select2-display-none">   <div class="select2-search" style="display: none;">       <label for="s2id_autogen8_search" class="select2-offscreen"></label>       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-8" id="s2id_autogen8_search" placeholder="">   </div>   <ul class="select2-results" role="listbox" id="select2-results-8">   </ul></div></div><select class="select2 select2-offscreen" name="UF_INDUSTRY" tabindex="-1" title="">
                        <option value=" " selected="" disabled="">Отрасль</option>
                        <option value="6769">Не имеет значения</option>
                        <option selected="selected" value="16425">Автоматизация учета и управления</option>
                        <option value="1827">Автомобили, автосервисы</option>
                        <option value="1904">Аудит и бухгалтерские услуги, юриспруденция</option>
                        <option value="1828">Банки, финансовые услуги, инвестиции</option>
                        <option value="1844">Бытовые услуги, сервис</option>
                        <option value="1890">Военно-промышленный комплекс</option>
                        <option value="1842">Горнодобывающая промышленность</option>
                        <option value="1897">Гостиничный бизнес</option>
                        <option value="1891">Государственные, бюджетные структуры</option>
                        <option value="6673">Домашние учет и финансы</option>
                        <option value="1837">Здравоохранение, медицина, стоматология</option>
                        <option value="1843">Издательство, полиграфия, упаковка</option>
                        <option value="1913">Информационные технологии, веб-сервисы</option>
                        <option value="6765">Кадровые агентства, обучение, курсы</option>
                        <option value="1907">Консалтинг, бизнес-тренинг, курсы</option>
                        <option value="1905">Легкая промышленность, мода и одежда</option>
                        <option value="1901">Лесное и деревообрабатывающее хозяйство </option>
                        <option value="1903">Машиностроение и приборостроение</option>
                        <option value="1906">Металлургическая промышленность </option>
                        <option value="1847">Недвижимость, риэлторская деятельность</option>
                        <option value="1836">Нефтегазовая промышленность </option>
                        <option value="1899">Общественные и некоммерческие структуры </option>
                        <option value="1852">Оптовая торговля, дистрибуция, логистика</option>
                        <option value="1910">Пищевая промышленность</option>
                        <option value="1909">Развлечения, искусство, спорт</option>
                        <option value="1900">Реклама, PR и маркетинг</option>
                        <option value="1898">Рестораны, кафе и фаст-фуд</option>
                        <option value="1848">Розничная и сетевая торговля (FMCG)</option>
                        <option value="1896">Связь, сети и телекоммуникации</option>
                        <option value="1826">Сельское хозяйство  и рыболовство</option>
                        <option value="1841">СМИ, телевидение и радиовещание</option>
                        <option value="1838">Страхование</option>
                        <option value="1830">Строительство</option>
                        <option value="1850">Транспорт, автопарки, такси</option>
                        <option value="1851">Туризм и путешествия</option>
                        <option value="1894">Фармацевтика, аптеки</option>
                        <option value="1829">Химическая промышленность</option>
                        <option value="1895">Электротехника и микроэлектроника </option>
                        <option value="1833">Энергетика и ЖКХ</option>
                        <option value="1893">Ювелирная промышленность и торговля</option>
                    </select>
                </div>
            </div>-->

               
    </div> 
        
    
    </article>  
    <?php Footer()?> 
    </body>
</html>


<!-- для проверки адресов электронной почты -->
<!--<input type="text" title="электронный адрес" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" />-->

<!-- для паролей -->
<!--<input type="text" title="по крайней мере восемь символов, содержащих хотя бы одну цифру, один символ нижнего и верхнего регистра" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />-->

<!-- для проверки телефонного номера -->
<!--<input type="text" required pattern="(\+?\d[- .]*){7,13}" title="интернациональный, национальный или местный номер телефона"/>-->