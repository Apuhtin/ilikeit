<?php

//Запускаем сессию

    session_start();

    //Устанавливаем кодировку и вывод всех ошибок
    header('Content-Type: text/html; charset=UTF8');
    error_reporting(E_ALL);

    //Включаем буферизацию содержимого
    ob_start();

//	$user = isset($_SESSION['user_in']) ? $_SESSION['user_in'] : 0;
//	$err = array();

    //Устанавливаем ключ защиты
//	define('AD_KEY', true);

    //Подключаем конфигурационный файл
    include_once './config.php';

    //Выбор языка сайта
    if (isset($_GET['Lang'])) {
        $date = time()+ 3600*24*365;
        setcookie('Lang', $_GET['Lang'], $date);
        $_SESSION['Lang'] = $_GET['Lang'];

    } else if (isset($_COOKIE['Lang'])) {
        $_SESSION['Lang'] = $_COOKIE['Lang'];

    } else {
        $_SESSION['Lang'] = 'En';    
    }
        
    $Filename = './Lang/'.$_SESSION['Lang'].'/'.$_SESSION['Lang'].'.ini';
    


    
//        echo $Filename;       
//        exit();

    //Глобальный массив
    if (file_exists($Filename)){ 
      
        $GLOBALS['Dict'] = parse_ini_file($Filename);
        
//        echo $GLOBALS['Dict']['Mnu_Reg'];
//        echo $GLOBALS['Dict']['Mnu_Input'];
//        
//        exit();
    }
    else{
        //Резервный файл ini если такого языка еще нет
        $Filename = './Lang/En/En.ini';
        $GLOBALS['Dict'] = parse_ini_file($Filename);
    }
//    echo $Filename;
//    exit();
    
    //Подключаем скрипт с функциями
    include_once './funct/funct.php';
    include_once './funct/functBD.php';
    include_once './funct/functHTML.php';
    include_once './funct/functImg.php';

    //подключаем MySQL
    $db_connect = mysqli_connect(AD_DBSERVER, AD_DBUSER, AD_DBPASSWORD, AD_DATABASE);                                 
    mysqli_set_charset($db_connect, "utf8");

    //mysql_query("set character_set_client='utf8';");
    //mysql_query("set character_set_results='utf8';");
    //mysql_query("set character_set_server='utf8';");

    //Получаем данные с буфера
    $content = ob_get_contents();
    ob_end_clean();

        

    
    //Создание таблицы программным    Работающий код     
//    $sql ="CREATE TABLE IF NOT EXISTS `tmp1` (
//        `Id` int(11) NOT NULL AUTO_INCREMENT,
//        `IdBtl` int(11) NOT NULL,
//        `IdUser` int(11) NOT NULL DEFAULT '0',
//        `Date` datetime NOT NULL,
//        `Text` varchar(500) NOT NULL,
//        PRIMARY KEY (`Id`)
//      ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41";
//
//
//    $row = mysqli_query ($db_connect, $sql);    
//
//    echo $sql;
//    exit;
        
        
        
        
        
        //Тут нужно считать параметры куков и выставить все параметры
        
        //Определяем переменную для переключателя
        $mode = isset($_GET['mode']) ? $_GET['mode'] : $mode = 'index';
                
	//Селектор форм       
	switch($mode)
	{
            case 'index':
                // Проверка пользователя при входе на сайт
                if (!isset($_SESSION['user_in']) or $_SESSION['user_in'] != 1) {                            
                    if (isset($_COOKIE['input1']) and isset($_COOKIE['input2'])) {
                        $email = $_COOKIE['input1'];
                        $pass = base64_decode($_COOKIE['input2']);

                        $result = InputUser($db_connect, $email, $pass);

                        if ($result == 200) {
                            $date = time()+3600*24*30; 
                            setcookie('input1',$email, $date);
                            setcookie('input2', base64_encode($pass), $date);                        
                            setcookie('Lang', $_SESSION['Lang'], time()+3600*24*365);
                        } else {
                            setcookie('input1',$email, time()-3600);
                            setcookie('input2', base64_encode($pass), time()-3600); 
                            setcookie('Lang', $_SESSION['Lang'], time()+3600*24*365);
                        }
                    }
                }
                include_once('./index_f.php');
//                    include_once('./index3.php');                     

            break;  

            case 'indexp':
                include_once ('./index_p.php');
            break;	

            case 'inputf':
                include_once ('./input_f.php');
            break;		            
            case 'input':
                include_once ('./input.php');
            break;               

            case 'regf':
                include ('./reg_f.php');
            break;	

            case 'reg':
                include ('./reg.php');
            break;	            

            case 'contactsf':
                include_once ('./contacts_f.php');
            break; 

            case 'contacts':
                include_once ('./contacts.php');
            break; 

            case 'lang':
                include_once ('./lang_f.php');
            break; 

            case 'profilef':
                include_once ('./profile_f.php'); 
            break; 
            case 'profile':                    
                include_once ('./profile.php'); 
            break;             


            case 'output':{

                setcookie ("input1", "", time() - 3600);
                setcookie ("input2", "", time() - 3600);

                $_SESSION['user_in'] = 0;
//                    unset($_SESSION['login']);
//                    unset($_SESSION['date_reg']);
//                    unset($_SESSION['date_end']);
//                    unset($_SESSION['partner']);
//                    unset($_SESSION['msg_user']);
                session_unset();
                header('Location:'. AD_HOST .'?mode=index');

            }
            break; 

            case 'recovery':
                include_once ('./recovery.php');
            break; 
        
            case 'recoveryf':
                include_once ('./recovery_f.php');
            break;            

            case 'recovery2':
                include_once ('./recovery2.php');
            break; 
        
            case 'recoveryf2':
                include_once ('./recovery_f2.php');
            break; 
//            
//              //Отказаться от подписки
//                case 'unsubscribe':
//                    include_once ('./unsubscribe.php');
//		break;         
//                case 'unsubscribe_f':
//                    include_once ('./unsubscribe_f.php');
//		break; 
//            



            case 'createf':
                include_once ('./CreateBattle_f.php'); 
            break;  
        
            case 'create':
                include_once ('./CreateBattle.php'); 
            break;             
        
            case 'listuserbattles':
                include_once ('./ListUserBattles_f.php'); 
            break; 

            case 'waitf':
                include_once ('./WaitBattles_f.php'); 
            break; 
        
            case 'acceptf':
                include_once ('./AcceptBattle_f.php'); 
            break;    
        
            case 'accept':
                include_once ('./AcceptBattle.php'); 
            break;              
        
            case 'listf':
                include_once ('./ListBattles_f.php'); 
            break;  
        
            case 'arhf':
                include_once ('./ArhBattles_f.php'); 
            break;            

//		case 'about':
//                    include_once ('./about.php');
//		break;
//
//		case 'market':
//                    include_once ('./market.php');
//		break;
// 		
// 		case 'market_p':
//                    include_once ('./market_p.php');
//		break;
// 
//                case 'patent':
//                    include_once ('./patent.php');
//		break;
//            
//                case 'tendersf':
//                    include_once ('./tenders_f.php');
//		break;            
//            
//                case 'vacancies':
//                    include_once ('./vacancies.php');
//		break;
//            
//                case 'sale':
//                    include_once ('./sale.php');
//		break; 
//            
//                case 'kyrs':
//                    include_once ('./kyrs.php');
//		break; 
//            
//                case 'book':
//                    include_once ('./book.php');
//		break;             
//                        
//                case 'anketa':
//                    include_once ('./anketa.php');
//		break; 
//            
//                case 'anketa1':
//                    include_once ('./anketa1.php');
//		break; 
//            
//                case 'anketa2':
//                    include_once ('./anketa2.php');
//		break;
//            
//                case 'Reglament':
//                    include_once ('./PagesK/Reglament.php'); 
//		break;              
//                
//                case 'auth1ctd':
//                    include_once ('./PagesK/auth1ctd.php'); 
//		break; 
//            
//                case '1cad':
//                    include_once ('./PagesK/1cad.php'); 
//		break;             
//               

     default:
        include_once ('./404.php');   
    }

              
        
?>			