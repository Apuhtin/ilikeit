<?php
 /**
 * Обработчик формы регистрации
 * Регистрация пользователя письмом
 */
 	
 //Производим активацию аккаунта
 if(isset($_GET['key']))
 {
        
	//Проверяем ключ
	$sql = 'SELECT `Login`, `NikName`, `Id` 
			FROM `reg`
			WHERE `ActiveHex` = "'. $_GET['key'] .'"';

        $row = mysqli_fetch_assoc(mysqli_query ($db_connect, $sql));       
        
        $ErrFun = 0;
        
        if(!$row['Login']){
            MessageSend(1, $GLOBALS['Dict']['Reg_ErrActivate']);
            $ErrFun = 1;
        }
       
	//Проверяем наличие ошибок и выводим пользователю
        if($ErrFun == 0){
		//Получаем адрес пользователя
		$email = $row['Login'];
                
                $_SESSION['Email'] = $row['Login'];
                $_SESSION['Login'] = $row['NikName'];
                $_SESSION['user_in'] = 1;                            
                $_SESSION['UserId'] = $row['Id'];	        
                
                
		//Активируем аккаунт пользователя
		$sql = 'UPDATE `reg`
			SET `Activate` = 1, `Modif` = 1 
			WHERE `Login` = "'. $email .'"';
             
		mysqli_query($db_connect, $sql);
                //AD Тут еще надо изменить ссылку активации ActiveHex чтобы не взломали аккаунт
                               

		//Отправляем письмо для активации
		$title = $GLOBALS['Dict']['Reg_Activate'];
                
                $message = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/MsgActivate.tpl');
                                
		sendMessageMail($email, AD_MAIL_AUTOR, $title, $message);


                /*Перенаправляем пользователя на страницу index*/
                exit (header('Location:'. AD_HOST .'?mode=index'));
	}

 }
 /*Если нажата кнопка на регистрацию, начинаем проверку*/
 if(isset($_POST['submit']))
 {
    
    $Login = FormChar($_POST['email']);
    $pass = FormChar($_POST['pass']);
    $pass2 = FormChar($_POST['pass2']);
      
    $ErrFun = 0;
     
    //Проверяем пришедшие данные
    if(empty($_POST['email'])){
        echo $GLOBALS['Dict']['Input_ErrEmail'];
        exit;
    }
    else{
//                       "[^@]+@[^@]+\.[a-zA-Z]{2,6}"
        if(!preg_match("/^[a-z0-9_.-]+@([a-z0-9_.-]+\.)+[a-z]{2,6}$/i", $_POST['email'])){
            echo $GLOBALS ['Dict']['Reg_InvalidEmail'];
            exit;
        }
    }

    
    if(empty($_POST['pass'])){
        echo $GLOBALS['Dict']['Profile_ErrPass1'];
        exit;
    }

    if(empty($_POST['pass2'])){
        echo $GLOBALS['Dict']['Profile_ErrPass2'];
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
        $sql = 'SELECT `Login` 
        FROM `reg`
        WHERE `Login` = "'.$Login.'"';

        $row = mysqli_fetch_assoc(mysqli_query ($db_connect, $sql));       

        if($row['Login']){
            echo $Login .' '. $GLOBALS['Dict']['Reg_LoginExist'];
            exit;
        }

        //Проверяем наличие ошибок
        if($ErrFun == 0)
        {
            
            $pos = strpos($Login, "@"); 
            $NikName = substr($Login, 0 , $pos);
            
            //Получаем ХЕШ соли
            $salt = salt();

            //Солим пароль
            $pass = md5(md5($pass).$salt);
            $hex = md5($salt);
            //Если все хорошо, пишем данные в базу
            $sql = 'INSERT INTO `reg` (`Id`, `Modif`, `Login`, `Password`, `Salt`, `ActiveHex`, `Activate`, `DateReg`, `Avatar`, `NikName`)
                            VALUES(
                                            "",
                                            1,
                                            "'. $Login.'",
                                            "'. $pass .'",
                                            "'. $salt .'",
                                            "'. $hex .'",
                                            0,
                                            now(),
                                            0,
                                            "'. $NikName.'"
                                            )';
            mysqli_query($db_connect, $sql);

            //Отправляем письмо для активации
            $url = AD_HOST .'index.php?mode=reg&key='. $hex;
            $title = $GLOBALS ['Dict']['Mnu_Reg'];
                        
            $message = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/MsgReg.tpl');
            $message = str_replace("{email}", $Login, $message);
            $message = str_replace("{pass}", $_POST['pass'], $message);
            $message = str_replace("{url}", $url, $message);
                      
            sendMessageMail($Login, AD_MAIL_AUTOR, $title, $message);
            
            echo $GLOBALS['Dict']['Reg_MsgSend'];
            exit;

        }
    }
 }
  

//?>