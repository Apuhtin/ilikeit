<?php Head("Like | Принять вызов")?>

<body>

<?php Menu(1)?> 
                   
    <article>        
            <div class="DivDual">

        <h1>Что вкуснее?</h1>


        <div class="DivDualBlock">
           
            <div class="DivDualImg">                
                <div class="DivDualImgBr">
                    <img class="ImgDual" src="../images/img1.jpg" title="Рисунок 1" />
                </div>                         
            </div> 
            <div>
                <img class="ImgAvatar" src="../images/photo.png"/>
                <div class="DivAvatarName">
                    <p>Иванов Иван Иванович</p>                       
                </div> 

                <!--<img class="ImgPlus" src="../images/plus2.png"/>-->

                    <a href="#">
<!--                        <img class="ImgPlus" src="../images/plus7_3.png"  
                        onmouseover="this.src='../images/plus7_2.png'" 
                        onmouseout="this.src='../images/plus7_3.png'" />-->
                    </a>


            </div>

        </div>


        <div class="DivDualBlock">
      
            <div class="DivDualImg">
                <div class="DivDualImgBr">
                    <!--<img class="ImgDual" src="../images/nofotob.png" title="Рисунок 2" />-->
                </div>
            </div>  
            <div>
                <img class="ImgAvatar" src="../images/photo.png"/>
                <div class="DivAvatarName">
                    <!--<p>Петров Петр Петрович</p>-->

                </div> 
<!--                    <a href="#">
                        <img class="ImgPlus" src="../images/plus7_3.png"  
                        onmouseover="this.src='../images/plus7_2.png'" 
                        onmouseout="this.src='../images/plus7_3.png'" />
                    </a>-->
            </div>
        </div>


    </div>      
        
        
        
        <div class="DivDual">
            <form action="?mode=accept" method="POST" >
                <h1>Принять вызов</h1>

                <!--<fieldset id="inputs">-->
                <p>Id поединка</p>
                <p><input type="number" name="Id" placeholder="Id"></p> 
                
                <p>Id поединка 1</p>
                <p><input type="number" name="IdBatltle1" placeholder="IdBatltle1"></p>                 
                    
<!--                <p>Заголовок</p>
                <p><input type="text" name="Title" maxlength="100" placeholder="Заголовок" autofocus  required></p>             -->

                <p>Описание</p>
                <textarea cols="54" rows="5" placeholder="Сообщение" name="Text"></textarea>                 

<!--                <p>Тип контента</p>
                <input type="radio"checked name="Type" value="Foto">Фото
                <input type="radio" name="Type" value="Video">Видео</br>-->

<!--                <p>Категория жанра</p>

                <select name="Category">
                    <option selected value="1">Все</option>
                    <option value="2">Кулинария</option>
                    <option value="3">Aвтомобили</option>
                    <option value="4">Другое...</option>
                </select>-->



                <p>Хэш теги</p>
                <p><input type="text" name="Tags" placeholder="Хэш теги" ></p>                   


<!--                <p>Количество дней битвы. Введите число от 1 до 30</p>
                <p><input type="text" name="Day" placeholder="Количество дней битвы" autofocus  required></p>                 -->

<!--                <p>Ставка. Введите число от 1 до 100</p>
                <input id="username" type="number" maxlength="3" placeholder="Ставка" required name="Stavka"></br> -->

<!--                <p>Тип битвы</p>
                <input type="radio" checked name="TypeBattle" value="Star">Звезды
                <input type="radio" name="TypeBattle" value="Money">Деньги<Br>                -->

                <p>Ссылка на Фото/Видео</p>
                <input id="username" type="url" placeholder="Ссылка на Фото/Видео" name="Link1"></br> 


                <!--</fieldset>-->
                <!--<fieldset id="actions">-->
                <input type="submit" class="ButtonInput" value="Предварительный просмотр" name="PreView"> 
                <input type="submit" class="ButtonInput" value="Сохранить" name="Save"> 
                <input type="submit" class="ButtonInput" value="Старт" name="StartBattle">   
                <?php MessageShow() ?>  
                <!--</fieldset>-->

            </form>

        </div>       
    </article>  
    <?php Footer()?> 
    </body>
</html>
