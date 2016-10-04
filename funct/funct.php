 <?php
 /**
 * Файл с пользовательскими функциями
 */
 
 
 /**Функция защиты от скриптов
 *@param string $P1
 */ 
function FormChar($P1)
{
   return nl2br(htmlspecialchars(trim($P1),ENT_QUOTES), false);
}

 
 /**Функция экранирования вносимых данных
 *@param array $data
 */
// function escape_str($data)
// {
//    if(is_array($data))
//    {
//        if(get_magic_quotes_gpc())
//           $strip_data = array_map("stripslashes", $data);
//           $result = array_map("mysql_real_escape_string", $strip_data);
//           return  $result;
//    }
//    else
//    {
//        if(get_magic_quotes_gpc())
//           $data = stripslashes($data);
//           $result = mysql_real_escape_string($data);
//           return $result;
//    }
// }
 
 /**Отпровляем сообщение на почту
 * @param string  $to
 * @param string  $from
 * @param string  $title
 * @param string  $message
 */
 function sendMessageMail($to, $from, $title, $message)
 {


   //Формируем заголовки для почтового сервера
   $headers = "Content-type: text/html; charset=\"utf-8\"\r\n";
   $headers .= "From: ILikeit.one <". $from .">\r\n";
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Date: ". date('D, d M Y h:i:s O') ."\r\n";
   $headers .= "X-Mailer: PHPMail Tool\n";
   
   //Отправляем данные на ящик админа сайта
   if(!mail($to, $title, $message, $headers)){
        return 'Ошибка отправки письма!';}  
   else { 
        return true;}  
 }
 
 
  /**Отпровляем сообщение c вложением
 * @param string  $from
 * @param string  $to
 * @param string  $subj
 * @param string  $text
 * @param string  $filename
 */
function xmail( $from, $to, $subj, $text, $filename) 
{
    $f         = fopen($filename,"rb");
    $un        = strtoupper(uniqid(time()));
    
    $head      = "Content-type: text/html; charset=\"utf-8\"\r\n";
    $head     .= "From: Like <". $from .">\r\n";
//    $head     .= "To: $to\n";
    $head     .= "Subject: $subj\n";
//    $head     .= "X-Mailer: PHPMail Tool\n";
//    $head     .= "Reply-To: $from\n"; //Ответить на
    $head     .= "Mime-Version: 1.0\n";
    $head     .= "Date: ". date('D, d M Y h:i:s O') ."\r\n";
    $head     .= "Content-Type:multipart/mixed;";
    $head     .= "boundary=\"----------".$un."\"\n\n";
    
    $zag       = "------------".$un."\nContent-Type:text/html;\n";
    $zag      .= "Content-type: text/html; charset=\"utf-8\"\r\n";
    $zag      .= "Content-Transfer-Encoding: 8bit\n\n$text\n\n";
    $zag      .= "------------".$un."\n";
    $zag      .= "Content-Type: application/octet-stream;";
    $zag      .= "name=\"".basename($filename)."\"\n";
    $zag      .= "Content-Transfer-Encoding:base64\n";
    $zag      .= "Content-Disposition:attachment;";
    $zag      .= "filename=\"".basename($filename)."\"\n\n";
    $zag      .= chunk_split(base64_encode(fread($f,filesize($filename))))."\n";
 
    return mail($to, $subj, $zag, $head);
}
 

 

 
 /**Простой генератор соли
 * @param string  $sql
 */
 function salt()
 {
	$salt = substr(md5(uniqid()), -8);
	return $salt;
 }

 
 /**Функция вывода заголовка
 *@param string $P1
 */ 
function Head($P1, $P2 = 0)
{

   $Meta = ""; 
   if ($P2 == 1){
//       $Meta = '<meta http-equiv="Cache-Control" content="no-cache">'; //Запрет кэширования страницы
   }  
//    
//    <META NAME="ROBOTS" CONTENT="NOINDEX">  //запрет индексации страници
//    
//   if ($P2 == 2){
//       $Meta = '<meta name="keywords" content="zakupki, тендеры в один клик, 1czakupki, 44-ФЗ, 223-ФЗ"/>
//                <meta name="description" content="Поиск тендеров из 1С" />';
//   }     
//  
//   if ($P2 == 3){
//       $Meta = '<meta name="keywords" content="закупки, аукционы, тендеры за сегодня, 1czakupki, 44-ФЗ, 223-ФЗ"/>
//                <meta name="description" content="Актуальные тендеры по 1С" />';
//   }       
   
   echo 
   
   '<!DOCTYPE HTML>

    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
	<meta charset="utf-8" />	
	<title>'.$P1.'</title>
        <meta name="keywords" content="I like it, battle, competition, tournament"/>
        '.$Meta.'
	<meta name="description" content="I like it!"/>
	<meta name="author" content=""/>
	<meta name="robots" content="all,index,follow"/>
	<meta name="distribution" content="global"/>
	<meta name="yandex-verification" content="69fe6104faad269b" />

	<!-- Adopt website to current screen -->
	<meta name="viewport" content="user-scalable=yes, width=device-width, initial-scale=1.0, maximum-scale=1.0">
	
	<link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/pf_style.css">
        <link rel="stylesheet" href="/css/bt_style.css">
        <link rel="stylesheet" href="/css/com_style.css">
	<link rel="icon" href="/images/favicon.ico" type="image/x-icon"> 
        <script src="/js/jquery-latest.js" type="text/javascript"></script>

    </head>';
   
   
   
//    '<!DOCTYPE HTML>
//    <html>
//    <head>
//    <title>'.$P1.'</title>
//    
//    <meta charset="utf-8" /> '.$Meta.'
// 
//    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
//    
//    <noscript>
//        <link rel="stylesheet" href="css/5grid/core.css">
//        <link rel="stylesheet" href="css/5grid/core-desktop.css">
//        <link rel="stylesheet" href="css/5grid/core-1200px.css">
//        <link rel="stylesheet" href="css/5grid/core-noscript.css">
//        <link rel="stylesheet" href="css/style.css">
//        <link rel="stylesheet" href="css/style-desktop.css">
//    </noscript>
//
//    <script src="css/5grid/jquery.js"></script>
//    <script src="css/5grid/init.js?use=mobile,desktop,1000px&amp;mobileUI=1&amp;mobileUI.theme=none"></script>
  
//    </head>'; 

       
               
 }

 /**Функция вывода меню
 *
 */
function Menu($poz_menu=1)
{
    
    if(isset($_SESSION['Login'])) {
        $textInput =   '<ul>
                            <li class = "LiInput"><a href="?mode=profilef">'.$_SESSION['Login'].'</a></li> 
                            <li class = "LiInput"><a href="?mode=output">'.$GLOBALS['Dict']['Mnu_Exit'].'</a></li>                        
                        </ul>';
        
        $textMenu =    '<li><a href="?mode=index"><img class="ImgLogin" src="../images/bonus48x48.png" title="'.$GLOBALS['Dict']['Mnu_Like'].'"/></a></li>
                        <li><a href="?mode=listuserbattles"><img class="ImgLogin" src="../images/arh04.png" title="'.$GLOBALS['Dict']['Mnu_List'].'"/></a></li>
                        <li><a href="?mode=createf"><img class="ImgLogin" src="../images/create01.png" title="'.$GLOBALS['Dict']['Mnu_Upload'].'"/></a></li>';
    
        if (isset($_SESSION['UserAvatar']) and $_SESSION['UserAvatar'] >0){
            $ImgLogin = '/ImgAvatar/S_'.$_SESSION['UserId'].'.png';
        }
        else {
            $ImgLogin = '/ImgAvatar/snofoto.png';
        }
    }
    else {   
        $textInput =    '<ul>
                            <li class = "LiInput"><a href="?mode=regf">'.$GLOBALS['Dict']['Mnu_Reg'].'</a></li>
                            <li class = "LiInput"><a href="?mode=inputf">'.$GLOBALS['Dict']['Mnu_Input'].'</a></li>                            
                        </ul>'; 
        
        $textMenu = '<li><a href="?mode=index"><img class="ImgLogin" src="../images/bonus48x48.png" title="'.$GLOBALS['Dict']['Mnu_Like'].'"/></a></li>';  
        
        $ImgLogin = '/ImgAvatar/snofoto.png';
    }

    $textGogle ="<script>
                    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
                    ga('create', 'UA-78521698-2', 'auto');
                    ga('send', 'pageview');
                </script>";
            
    
    
    $text = '       
        <header>   

        <a href="?mode=index"><div id="DivLogotip">            
            <img id="ImgLogotip" src="../images/Logotip19.png"/>                                                 
        </div></a> 
    
        <span class="SpanHeadLeft">
        <!-- <form action="" method="POST"> --> 

                
                <a href="?mode=lang"><div id="ButtonLang" name="Lang"><img class="ImgLang" src="../Lang/'.$_SESSION['Lang'].'/'.$_SESSION['Lang'].'.png"/></div></a>
           
        <!-- </form> --> 
        

        </span>

          
        <div class="MenuUserBlok"> 
            <span class="SpanHeadRight">
                <a href="?mode=profilef"><img class="ImgLogin" src="'.$ImgLogin.'"/></a>
                '.$textInput.'       
            </span>
        </div> 

        <span class="SpanHeadRight">  
            <ul>                                
               
               '.$textMenu.'              
            </ul>       
        </span>
        
    </header>';
    
    $text = $textGogle.$text;
    
    
    echo $text;
 
// Блок поиска временно закоментирован    
//        <span class="SpanHeadLeft"> 
//          
//            <form action="" method="POST" >
//                <input type="search" maxlength="" placeholder="'.$GLOBALS['Dict']['Mnu_Search'].'" name="search_query">    
//                <input type="submit" id="ButtonSearch" name="search">
//            </form>                        
//        </span> 
//         
    
    
    
//На будующее развитие сервиса А пока только поединки от первого лица    
//    <li><a href="?mode=listf"><img class="ImgLogin" src="../images/bonus48x48.png" title="Поединки"/></a></li>                               
//    <li><a href="?mode=waitf"><img class="ImgLogin" src="../images/wait08.png" title="Список ожидающих"/></a></li>
    
    
//    $pf1='';
//    $pf2='';
//    $pf3='';
//    $pf4='';
//    $pf5='';
//    $pf6='';
//    $pf7='';
//    
//    if ($poz_menu==1) {$pf1 = 'class="current_page_item"';}
//    if ($poz_menu==2) {$pf2 = 'class="current_page_item"';}
//    if ($poz_menu==3) {$pf3 = 'class="current_page_item"';}
//    if ($poz_menu==4) {$pf4 = 'class="current_page_item"';}
//    if ($poz_menu==5) {$pf5 = 'class="current_page_item"';}
//    if ($poz_menu==6) {$pf6 = 'class="current_page_item"';}
//    if ($poz_menu==7) {$pf7 = 'class="current_page_item"';}
//
//    if (!empty($_SESSION['user_in']) and $_SESSION['user_in']== 1){
//        $Menu = '<li '.$pf6.'><a href="?mode=kabinet">Кабинет</a></li>
//		 <li'.$pf7.'><a href="?mode=output">Выход</a></li>';
//    }
//    else{
//        $Menu = '<li '.$pf5.'><a href="?mode=input">Вход</a></li>';
//    }
//    echo  '<header id="header">
//    <div class="5grid-layout">
//      <div class="row">
//        <div class="12u" id="logo">     
//        
// <!-- Qui quaerit, reperit-->
//
//            <h1><a href="?mode=index" class="mobileUI-site-name">СИСТЕМА ПОИСКА ТЕНДЕРОВ</a></h1>
//            <h2><a href="?mode=tendersf&Day=0">Кто ищет, тот всегда найдёт</a><h2>
//        </div>
//      </div>
//    </div>
//    <div class="5grid-layout">
//      <div class="row">
//        <div class="12u" id="menu">
//          <div id="menu-wrapper">
//            <nav class="mobileUI-site-nav">
//              <ul>
//                <li '.$pf1.'> <a href="?mode=index">Главная</a></li>
//                <li '.$pf2.'><a href="?mode=about">Описание</a></li>
//                <li '.$pf3.'><a href="?mode=market">Цены</a></li>
//                <li '.$pf4.'><a href="?mode=contactsf">Контакты</a></li>'
//                .$Menu.   
//              '</ul>
//            </nav>
//          </div>
//        </div>
//      </div>
//    </div>
//  </header>';   
}

 /**Функция вывода подвала
 *
 */
function Footer()
{
    echo 
    
   	'<footer> &copy; 2016 ILikeit, LLC 
        <div>           
            <sapn class="FooterSpan"><a href="?mode=contactsf">'.$GLOBALS['Dict']['Futer_Send'].'</a></span>
        </div>


<!--        <div>О сервисе, Условия использования, Отправить отзыв, Справка</div>
		<div id="rights">
			Все права защищены &copy;
		</div>
		<div id="social">
			<a href="" title="Канал на YouTube"><img src="img/social/youtube.png" alt="Канал на YouTube" /></a>
			<a href="" title="Группа FaceBook"><img src="img/social/FaceBook.png" alt="Группа FaceBook" /></a>
			<a href="" title="Группа Вконтакте"><img src="img/social/vk.png" alt="Группа Вконтакте" /></a>
		</div>-->
                
	</footer>
        
        <!-- Yandex.Metrika counter --> <script type="text/javascript"> (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter39610880 = new Ya.Metrika({ id:39610880, clickmap:true, trackLinks:true, accurateTrackBounce:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks"); </script> <noscript><div><img src="https://mc.yandex.ru/watch/39610880" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
        '; 
    
    

}

 /**ФункцияОтправкиСообщения
 * @param int       $P1
 * @param string    $P2
 */
 function MessageSend($P1, $P2)
 {
     //Ошибка
    if ($P1 ==1) {
        $_SESSION['message'] = '<div style="color:red; text-align:center;">'.$P2.'</div>';
    }
     //Простое сообщение
    else if ($P1 ==0){
        $_SESSION['message'] = $P2;
    }
    else if ($P1 ==2){
        $_SESSION['message'] = '<div style="color:red; text-align:center; margin-top: 10px;">'.$P2.'</div>';
    }
//    else if ($P1 ==3){
//        $_SESSION['message'] = '<div style="color:red; text-align:center; margin-top: 8px;">'.$P2.'</div>';
//    }
//     
//    else if ($P1 ==4){
//        $_SESSION['message'] = '<div style="color:red; margin: 11px 0px 0px 170px;">'.$P2.'</div>';
//    }
     exit(header('Location:'.$_SERVER['HTTP_REFERER'])); 
 }
 
 /**ФункцияВыводаСообщения
 */
 function MessageShow()
 {
    if(!empty($_SESSION['message'])){ 
        if ($_SESSION['message']) {
            $Message = $_SESSION['message'];
            echo $Message;
            $_SESSION['message'] = array();
        }
    }
 }
 
  /**ФункцияДоступностиКабинета
 */
 function AcessKabinet()
 {
    if(!isset($_SESSION['user_in']) or $_SESSION['user_in'] != 1){ 

        exit (header('Location:'. AD_HOST .'?mode=index'));

    }

 }
 
 


 
 
 /**ФункцияЗаполненияПоКукам
 */ 
function InputCookie() {
 
    if(isset($_COOKIE["input1"])){
        if(isset($_COOKIE["input2"])){
            $flogin = 'value="'. $_COOKIE["input1"].'"';
            $fpas = 'value="'. base64_decode($_COOKIE["input2"]).'"';
            $chbx = 'checked';
        }   
    }
    else {
        $flogin = '';
        $fpas = '';
        $chbx = '';
    }
    echo 
        '<h2>Форма входа</h2>
        <h3>Е-mail</h3>
        <div class="text-wrap" ><input type="email" placeholder="E-mail"  required class="text" name="email"' .$flogin. '/>
        </div>
        <h3>Пароль</h3>
        <div class="text-wrap"><input type="password" placeholder="Пароль" required class="text" name="pass"' .$fpas. '/>
        </div>
        <input type="checkbox" ' .$chbx. ' name="remember"/>Запомнить';   
}


//Вход пользователя на сервер
function InputUser($fdb_connect, $email, $pass ){
		
    /*Проверяем существует ли у нас такой пользователь в БД*/
    $sql = "SELECT * 
    FROM `reg`
    WHERE `Login` = '$email'";

    $row = mysqli_fetch_assoc(mysqli_query ($fdb_connect, $sql));       

    //Проверка Логина, Проля, Статуса
    if($row['Login']) {
        If ($row['Activate'] == 1) {               
            if(md5(md5($pass).$row['Salt']) == $row['Password']) {
                
                $_SESSION['Email'] = $row['Login'];
                $_SESSION['Login'] = $row['NikName'];
                $_SESSION['user_in'] = 1;                            
                $_SESSION['UserId'] = $row['Id'];
                $_SESSION['UserAvatar'] = $row['Avatar'];

                return 200;

            } else {
                return $GLOBALS['Dict']['Input_Err'];  
            }
        } else {
            return $GLOBALS['Dict']['Input_ErrActivate'];
        }
    } else {
        return $GLOBALS['Dict']['Input_Err'];
    }
      
}





?>