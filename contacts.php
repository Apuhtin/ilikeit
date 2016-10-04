<?php
 /**
 * Обработчик формы контактов
 * Отправка писем с сайта
 */

 /*Если нажата кнопка на отправку сообщения, начинаем проверку*/
 if(isset($_POST['msgsubmit']))
 {

    
//    echo $_POST['email'].'<br/>'; 
//    echo $_POST['username'].'<br/>';
//    echo $_POST['tema'].'<br/>';
//    echo $_POST['usermessage'].'<br/>';
    
    $ErrFun = 0;
     
    //Проверяем пришедшие данные
    if(empty($_POST['email'])){
        echo $GLOBALS['Dict']['Input_ErrEmail'];
        exit;
    }
    else{
//                       "[^@]+@[^@]+\.[a-zA-Z]{2,6}"
        if(!preg_match("/^[a-z0-9_.-]+@([a-z0-9_.-]+\.)+[a-z]{2,6}$/i", $_POST['email'])){
            echo $GLOBALS['Dict']['Reg_InvalidEmail'];
            exit;
        }
    }

    if(empty($_POST['username'])){
        echo $GLOBALS['Dict']['Contact_ErrName'];
        exit();
    }

    if(empty($_POST['tema'])){
        echo $GLOBALS['Dict']['Contact_ErrTema'];
        exit();
    }

    if(empty($_POST['usermessage'])){
        echo $GLOBALS['Dict']['Contact_ErrText'];
        exit();
    }


    $email = FormChar($_POST['email']);
    $username = FormChar($_POST['username']);
    $tema = FormChar($_POST['tema']);
    $usermessage = FormChar($_POST['usermessage']);
    
    
    //Пишем текст письма в базу
    $sql = 'INSERT INTO `mail`
                VALUES(
                        "",
                        now(),
                        "' . $email . '",
                        "' . $username . '",    
                        "' . $tema . '",                        
                        "' . $usermessage . '",
                        "' . $ErrFun . '"
                        )';
    
    
    mysqli_query($db_connect, $sql);
    

    //Проверяем наличие ошибок и выводим пользователю
    if($ErrFun == 0)
    {
     
        //Отправляем письмо для активации
        $title = $tema;
        $message = 'E-mail: '.$email. '<br/><br/>'
                    .'Сообщение от: '.$username. '<br/><br/>' 
                    .'Текст сообщения : '. $usermessage;

        $mailsupport = "apuhtin_denis@mail.ru";
        //AD_MAIL_SUPPORT
        
        echo $GLOBALS['Dict']['Contact_MsgSend'];        
        sendMessageMail($mailsupport, AD_MAIL_AUTOR, $title, $message);

        exit;
       
    }
 }
 
//?>