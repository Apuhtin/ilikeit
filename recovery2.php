<?php
 /**
 * Обработчик формы востановления пароля
 */
 
 if(isset($_POST['UserId']))
 {
          
    $Id = FormChar($_POST['UserId']);
    $pass = FormChar($_POST['pass']);
    $pass2 = FormChar($_POST['pass2']);
    $ErrFun = 0;
      
    //Проверяем пришедшие данные
    if(empty($_POST['UserId'])){
        echo $GLOBALS['Dict']['Profile_ErrUserId'];
        exit;
    }

    if(empty($_POST['pass'])){
        echo $GLOBALS['Dict']['Profile_ErrPass1'];
        exit;
    }

    if(empty($_POST['pass2'])){
        echo  $GLOBALS['Dict']['Profile_ErrPass2'];
        exit;
    }

    /*Проверяем на совподение пароли*/
    if($pass != $pass2){
        echo $GLOBALS['Dict']['Profile_ErrPass'];
        exit;
    }        

    //Проверяем наличие ошибок и выводим пользователю
    if($ErrFun == 0)
    {
        /*Проверяем существует ли у нас такой пользователь в БД*/
        $sql = 'SELECT `Id`, `Login`
        FROM `reg`
        WHERE `Id` = "'.$Id.'"';
        
        $row = mysqli_fetch_assoc(mysqli_query ($db_connect, $sql));       

        if(!$row['Id']){
            echo $email.' '.$GLOBALS['Dict']['Profile_ErrUser'];
            exit();
        }
        
        $email = $row['Login'];            
        $salt = salt();

        //Солим пароль
        $pass = md5(md5($pass).$salt);
        $hex = md5($salt);

        //Обновляем pass
        $sql = 'UPDATE `reg`
                SET `Password` = "'.$pass.'", `Salt` = "'.$salt.'", `ActiveHex` = "'.$hex.'"
                WHERE `Id` = "'. $Id .'"';

        mysqli_query($db_connect, $sql);
        
        //Отправляем письмо для активации
        $title = $GLOBALS['Dict']['Email_PasswordMsgTitle'];
        $message = $GLOBALS['Dict']['Email_PasswordMsg'];
      
        sendMessageMail($email, AD_MAIL_AUTOR, $title, $message);

        echo $GLOBALS['Dict']['Profile_PswChange'];          
        exit;

        
    }
 }
 
//?>