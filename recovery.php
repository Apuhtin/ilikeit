<?php
 /**
 * Обработчик формы востановления пароля
 */
 
	
 //Обработка захода с почты
 if(isset($_GET['key']))
 {
	//Проверяем ключ
	$sql = 'SELECT * 
			FROM `reg`
			WHERE `ActiveHex` = "'. $_GET['key'] .'"';

        $row = mysqli_fetch_assoc(mysqli_query ($db_connect, $sql));       
       
        if(empty($row['Login'])){
              
            $_SESSION['message'] = '<div style="color:red; text-align:center; margin-top: -7px;">'.$GLOBALS['Dict']['Recovery_ErrKey'].'</div>';
            
            exit (header('Location:'. AD_HOST .'?mode=input'));   
        }
	//Проверяем наличие ошибок и выводим пользователю
        else{
          
            $_SESSION['Email'] = $row['Login'];
            $_SESSION['Login'] = $row['NikName'];
            $_SESSION['user_in'] = 1;                            
            $_SESSION['UserId'] = $row['Id'];            
            $_SESSION['UserAvatar'] = $row['Avatar'];
            /*Перенаправляем пользователя на страницу профиля в личном кабинете*/
            exit (header('Location:'. AD_HOST .'?mode=profilef'));
	}
 }
 /*Если нажата кнопка на регистрацию, начинаем проверку*/
 if(isset($_POST['submit']))
 {
    $email = FormChar($_POST['email']);

    $ErrFun = 0;
     
    //Проверяем пришедшие данные
    if(empty($_POST['email'])){
        echo $GLOBALS['Dict']['Input_ErrEmail'];
        exit;
    }
    else{
        if(!preg_match("/^[a-z0-9_.-]+@([a-z0-9_.-]+\.)+[a-z]{2,6}$/i", $_POST['email'])){
            echo $GLOBALS['Dict']['Reg_InvalidEmail'];
            exit;
        }
    }

    //Проверяем наличие ошибок и выводим пользователю
    if($ErrFun == 0)
    {
        /*Проверяем существует ли у нас такой пользователь в БД*/
        $sql = "SELECT `Login`, `Activate`  
        FROM `reg`
        WHERE `Login` = '$email'";

        $row = mysqli_fetch_assoc(mysqli_query ($db_connect, $sql));       

        if(!$row['Login'] ){
            echo  $email .' '. $GLOBALS['Dict']['Profile_ErrPass'];
            exit;
        }

//        if($row['Activate']==0){
//            MessageSend(1, 'Пользователь с таким логином: '. $email .' не активирован!');
//            exit;    
//        }
        
        
        
        //Проверяем наличие ошибок
        if($ErrFun == 0)
        {
            //Получаем ХЕШ соли
            
            $salt = salt();
            $active_hex = md5($salt); 
                       
            //Обновляем salt и active_hex
            $sql = 'UPDATE `reg`
                    SET `Salt` = "'.$salt.'", `ActiveHex` = "'.$active_hex.'"
                    WHERE `Login` = "'. $email .'"';
            
            mysqli_query($db_connect, $sql);

 
            //Отправляем письмо для активации
            $url = AD_HOST .'index.php?mode=recovery&key='. $active_hex;
            $title = $GLOBALS['Dict']['Recovery_Title'];
            
            $message = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/MsgRecPass.tpl');
            $message = str_replace("{url}", $url, $message);            
            
            
          

            
//You are receiving this letter because
//            www.ilikeite.com on the portal was a request for recovery password for your account.
//             
//
//            To change your password, please click here
//         
//            (If the link does not open, then copy and paste into your browser).
//                   
//            If you believe you have received this message by mistake, just ignore it.
//             
//            For assistance, please contact our support support@ilikeit.com
//            Do not send this letter. It contains a link to log in to your personal account on the site.
//
//            Sincerely, The;            
            
            
            sendMessageMail($email, AD_MAIL_AUTOR, $title, $message);
                                    
            echo $GLOBALS['Dict']['Reg_MsgSend'];
            exit;

        }
    }
 }
 
//?>