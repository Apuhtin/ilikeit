<!DOCTYPE HTML>


<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />	
	<title>ILikeit</title>
        <meta name="keywords" content="Поединок, батл, конкурс, турнир"/>
	<meta name="description" content="Кто лучше!"/>
	<meta name="author" content=""/>
	<meta name="robots" content="all,index,follow"/>
	<meta name="distribution" content="global"/>
	
	<!-- Adopt website to current screen -->
	<meta name="viewport" content="user-scalable=yes, width=device-width, initial-scale=1.0, maximum-scale=1.0">
	
	<link rel="stylesheet" href="/css/style.css">
	<link rel="icon" href="/images/favicon.ico" type="image/x-icon">
            

</head>
<body>

    <header>   
  

        
        <div id="DivLogotip">
            
            <a href="?mode=index"><img id="ImgLogotip" src="../images/Logotip19.png"/></a>
                                                 
        </div> 
<!--        <div id="DivSettings">            
            <a href="?mode=index"><img id="ImgSettings" src="../images/menu4.png"/></a>
        </div>        -->
        <span class="SpanHeadLeft"> 
          
            <form action="" method="POST" >
                <input type="search" maxlength="" placeholder="Введите запрос" name="search_query">    
                    <input type="submit" id="ButtonSearch" value="Найти" name="search">
            </form>                        
        </span> 
        
        
        
        <div class="SpanHeadRight"> 

                <?php 
                
                if(isset($_SESSION['Login'])) {
                    echo 
                        '<a href="?mode=profilef"><img class="ImgLogin" src="../ImgAvatar/S_'.$_SESSION['UserId'].'.png"/></a>
                            <ul>
                            <li class = "LiInput"><a href="?mode=profilef">'.$_SESSION['Login'].'</a></li> 
                            <li class = "LiInput"><a href="?mode=output">Выход</a></li>                        
                            </ul>';
                }
                else {   
                    echo 
                        '<a href="?mode=profilef"><img class="ImgLogin" src="../ImgAvatar/snofoto.png"/></a>
                            <ul>
                            <li class = "LiInput"><a href="?mode=regf">Регистрация</a></li>
                            <li class = "LiInput"><a href="?mode=inputf">Вход</a></li>                            
                            </ul>'; 
                }
                ?>
                
            <!-- </ul> -->
        </div> 

        <span class="SpanHeadRight">  
            <ul>
                                
<!--                <li><a href="?mode=listf"><img class="ImgLogin" src="../images/bonus48x48.png" title="Поединки"/></a></li>                               
                <li><a href="?mode=waitf"><img class="ImgLogin" src="../images/wait08.png" title="Список ожидающих"/></a></li>-->
                <?php 
                
                if(isset($_SESSION['Login'])) {
                    echo 
                        '<li><a href="?mode=listuserbattles"><img class="ImgLogin" src="../images/arh04.png" title="Список поединков"/></a></li>
                        <li><a href="?mode=createf"><img class="ImgLogin" src="../images/create01.png" title="Создать поединок"/></a></li>';

                }
                else {
                    echo 
                        '<li><a href="?mode=arhf"><img class="ImgLogin" src="../images/arh04.png" title="Архив поединков"/></a></li>';                    
                }
                ?>                
                 
                 <!--<li><a href="?mode=message"><img class="ImgLogin" src="../images/message05.png" title="Оповещения"/></a></li>-->


            </ul>       
        </span> 



    </header>

    <article>
        
        <div class="DivDual">

            <h1>Что вкуснее?</h1>
            <h1>Осталось 12:59</h1>
            
            <div class="DivDualBlock">
                <h1>123 321</h1>
                <div class="DivDualImg">                
                    <div class="DivDualImgBr">
                        <img class="ImgDual" src="../images/img1.jpg" title="Рисунок 1" />
                    </div>                         
                </div> 
                <div class="DivText">
                    <img class="ImgAvatar" src="../images/photo.png"/>
                    <div class="DivAvatarName">
                        <p>Иванов Иван Иванович</p>                       
                    </div> 
            
                        <a href="#">
                            <img class="ImgPlus" src="../images/plus7_3.png"  
                            onmouseover="this.src='../images/plus7_2.png'" 
                            onmouseout="this.src='../images/plus7_3.png'" />
                        </a>
                                        
                </div> 
                <div class="DivText">Блок описания Фото/Видео</div>
            </div>
                      
            <div class="DivDualBlock">
                <h1>123 321</h1>
                <div class="DivDualImg">
                    <div class="DivDualImgBr">
                        <img class="ImgDual" src="../images/img2.jpg" title="Рисунок 2" />
                    </div>
                </div>  
                <div class="DivText">
                    <img class="ImgAvatar" src="../images/photo.png"/>
                    <div class="DivAvatarName">
                        <p>Петров Петр Петрович</p>
                        
                    </div> 
                        <a href="#">
                            <img class="ImgPlus" src="../images/plus7_3.png"  
                            onmouseover="this.src='../images/plus7_2.png'" 
                            onmouseout="this.src='../images/plus7_3.png'" />
                        </a>
                </div>
                <div class="DivText">Блок описания Фото/Видео</div>
            </div>
            
            <div class="divHr">
                <hr>
            </div>

            <center>
                <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,gplus,twitter,blogger,digg,reddit,linkedin,lj,tumblr,viber,whatsapp">Строка социальных закладок</div>
            </center>

        </div>

        <div class="DivDual">
            Коментарии
        </div>

                  
    </article>        
    
<!--	<nav>
		<a href="/">Главная</a>
		<a href="">Создание сайтов</a>
		<a href="">Создание игр</a>
		<a href="">Магазин</a>
		<a href="">Разное</a>
	</nav>-->
    
    


	<footer> &copy; 2016 Like, LLC 
            <div>О сервисе, Услоаия использования, Отправить отзыв, Справка</div>
<!--		<div id="rights">
			Все права защищены &copy;
		</div>
		<div id="social">
			<a href="" title="Канал на YouTube"><img src="img/social/youtube.png" alt="Канал на YouTube" /></a>
			<a href="" title="Группа FaceBook"><img src="img/social/FaceBook.png" alt="Группа FaceBook" /></a>
			<a href="" title="Группа Вконтакте"><img src="img/social/vk.png" alt="Группа Вконтакте" /></a>
		</div>-->
	</footer>
</body>
</html>