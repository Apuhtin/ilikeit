<?php


//Загрузить Аватар
if(isset($_POST['DownloadFile']))
{
 
    $ErrFun = 0;
    if(empty($_POST['UserId'])){
        echo '100,'.$GLOBALS['Dict']['Profile_ErrUserId'];
        exit; 
        $ErrFun = 1;
    }    
    
    $UserId = FormChar($_POST['UserId']);
     
    $whitelist = array(".jpg", ".jpeg", ".png");

    if ($_FILES["filename"]["size"] > 1024 * 2 * 1024) {
        echo '100,'.$GLOBALS['Dict']['Profile_ErrSize']; //'Размер файла превышает 2 Мб');
        exit;         

    }    
    
    $error = true;
    //Проверяем разрешение файла
    foreach ($whitelist as $value) {
        if(preg_match("/$value\$/i",$_FILES['filename']['name'])) $error = false; 
    }
  
    if($error) {    
        echo '100,'.$GLOBALS['Dict']['Profile_ErrExt'];//'Недопустимый формат картинки');
        exit;

        
    }

    $folder =  './ImgAvatar/';
       
    
    $uploadedFile =  $folder.basename($_FILES['filename']['name']);
    // Проверяем загружен ли файл
    if(is_uploaded_file($_FILES['filename']['tmp_name'])){
        // Если файл загружен успешно, перемещаем его из временной директории в конечную        
        if(move_uploaded_file($_FILES['filename']['tmp_name'],$uploadedFile)){
            
            //Ресайз картинки
            $FileOutput = $folder.'B_'.$UserId.'.png'; //Картинка большого размера            
            resizeimg($uploadedFile, 200, 200, $FileOutput );
            
            $FileOutput = $folder.'S_'.$UserId.'.png'; //Картинка маленького размера            
            resizeimg($uploadedFile, 48, 48, $FileOutput );

            unlink($uploadedFile);  //удаляем временный файл                    

            // Внесение изменений в БД - аватарка загружена
            UpdateAvatar($db_connect, $UserId, 1);
            $_SESSION['UserAvatar'] = 1;     


            $RND = uniqid(); 
            $FileOutput = '../ImgAvatar/B_'.$UserId.'.png';      
            $Text = '200,'.'<img class ="Avatar200" id ="Avatar200" src="'.$FileOutput.'?'.$RND.'"/>';
            
            echo $Text;
            exit;            
            
        }
        else {
            
            echo '100,'.$GLOBALS['Dict']['Profile_ErrUpload']; //Во время загрузки файла произошла ошибка
            exit; 

            }
        }
    else {
        echo '100,'.$GLOBALS['Dict']['Profile_ErrSize']; //'Размер файла превышает 2 Мб');
        exit;

    }    
}

if(isset($_POST['DelFile']))
{
    $ErrFun = 0;
    if(empty($_POST['UserId'])){
        MessageSend(0, $GLOBALS['Dict']['Profile_ErrUserId']);
        $ErrFun = 1;
    }    
    
    $UserId = FormChar($_POST['UserId']);
  
    if ($_SESSION['UserAvatar'] > 0) {
        $filename =  './ImgAvatar/B_'.$UserId.'.png';
        unlink($filename);  //удаляем файл аватарки     

        $filename =  './ImgAvatar/S_'.$UserId.'.png';
        unlink($filename);  //удаляем файл аватарки  
        
        // Внесение изменений в БД - аватарка загружена
        UpdateAvatar($db_connect, $UserId, 0);
        $_SESSION['UserAvatar'] = 0;
        
        $Text = '<img class ="Avatar200" src="../ImgAvatar/nofoto.png"/>';
        echo $Text;
        exit;

    } 
    else{
        echo $GLOBALS['Dict']['Profile_ErrDel'];
        exit; 
    }
}


//Сохранить личные данные
if(isset($_POST['SaveUser']))
{

    $ErrFun = 0;
    if(empty($_POST['UserId'])){
        echo $GLOBALS['Dict']['Profile_ErrUserId'];
        exit;
    }
    if(empty($_POST['NikName'])){
        echo $GLOBALS['Dict']['Profile_ErrLogin'];
        exit;
    }
    
    //Проверяем наличие ошибок и выводим пользователю
    if($ErrFun == 0)
    {       
        $UserId = FormChar($_POST['UserId']); 
        $NikName = FormChar($_POST['NikName']);
        $Name = FormChar($_POST['Name']);
        $LastName = FormChar($_POST['LastName']);
        $SecondName = FormChar($_POST['SecondName']);
        $Sex = FormChar($_POST['Sex']);
        $Lang = FormChar($_POST['Lang']);
        
        //Обновляем данные пользователя
        $sql = 'UPDATE `reg`
                SET `NikName` = "'.$NikName.'", 
                    `Name` = "'.$Name.'", 
                    `LastName` = "'.$LastName.'",
                    `SecondName` = "'.$SecondName.'",
                    `Sex` = "'.$Sex.'",
                    `Lang` = "'.$Lang.'"    
                WHERE `Id` = "'. $UserId .'"';

        mysqli_query($db_connect, $sql);

        if ($Lang == 0) {
            $StrLang = "En";

        } else if ($Lang == 1) {
            $StrLang = "Ru";
        }
        $date = time()*2;
        setcookie('Lang', $StrLang, $date);
        $_SESSION['Lang'] = $StrLang;

        echo $GLOBALS['Dict']['Profile_MsgSave'];            
        exit;      
    }   
       
}
//Сохранить контакты
if(isset($_POST['SaveContact']))
{   
    $ErrFun = 0;
    if(empty($_POST['UserId'])){
        echo $GLOBALS['Dict']['Profile_ErrUserId'];
        exit;
    }

    //Проверяем наличие ошибок и выводим пользователю
    if($ErrFun == 0)
    {       
        $UserId = $_POST['UserId']; 
        $Tel = FormChar($_POST['Tel']);
        $Skype = FormChar($_POST['Skype']);
        $ISQ = FormChar($_POST['ISQ']);
      
        //Обновляем данные пользователя
        $sql = 'UPDATE `reg`
                SET `Tel` = "'.$Tel.'", 
                    `Skype` = "'.$Skype.'", 
                    `ISQ` = "'.$ISQ.'"   
                WHERE `Id` = "'. $UserId .'"';

        mysqli_query($db_connect, $sql);
        

        echo $GLOBALS['Dict']['Profile_MsgSave'];            
        exit;      
    }   
    
}
 
//Сохранить уведомления
if(isset($_POST['SaveMessage']))
{

    $ErrFun = 0;
    if(empty($_POST['UserId'])){
        echo  $GLOBALS['Dict']['Profile_ErrUserId'];
        exit;
    }
    
    //Проверяем наличие ошибок и выводим пользователю
    if($ErrFun == 0)
    {       
        $UserId = FormChar($_POST['UserId']); 
        $MessageEmal = FormChar($_POST['MessageEmal']); 
        
        //Обновляем данные пользователя
        $sql = 'UPDATE `reg`
                SET `Message` = "'.$MessageEmal.'" 
                WHERE `Id` = "'. $UserId .'"';
        
        mysqli_query($db_connect, $sql);

        echo $GLOBALS['Dict']['Profile_MsgSave']; 
        exit;      
    } 
}
  
//Удалить аккаунт
if(isset($_POST['DeleteUser']))
{

    $ErrFun = 0;
    if(empty($_POST['UserId'])){
        MessageSend(1, $GLOBALS['Dict']['Profile_ErrUserId']);
        $ErrFun = 1;
    }
    
    echo $GLOBALS['Dict']['Profile_MsgDelAccount'];
    
//    
//    //Проверяем наличие ошибок и выводим пользователю
//    if($ErrFun == 0)
//    {       
//        $UserId = FormChar($_POST['UserId']); 
//        $MessageEmal = FormChar($_POST['MessageEmal']); 
//        
//        //Обновляем данные пользователя
//        $sql = 'UPDATE `reg`
//                SET `Message` = "'.$MessageEmal.'" 
//                WHERE `Id` = "'. $UserId .'"';
//        
//        mysqli_query($db_connect, $sql);
//
//        $message = "Данные сохранены";
//        MessageSend(1, $message);            
//        exit;      
//    } 
}

//Повернуть Аватар
if(isset($_POST['Rotate'])) 
{
 
//    $ErrFun = 0;
//    if(empty($_POST['UserId'])){
//        echo '100,'.$GLOBALS['Dict']['Profile_ErrUserId'];
//        exit; 
//        $ErrFun = 1;
//    }    

    
    if (isset($_POST['degres'])){
        $degres = $_POST['degres'];
    }
  
    $UserId = FormChar($_POST['UserId']);
      
   
    
    $FileВ = './ImgAvatar/B_'.$UserId.'.png';
    if (file_exists($FileВ)) {
                        
        If (rotateimg($FileВ, $degres)){

            $FileS = './ImgAvatar/S_'.$UserId.'.png';
            $Result=rotateimg($FileS, $degres);


            $RND = uniqid();       
            $Text = '<img class ="Avatar200" id ="Avatar200" src="'.$FileВ.'?'.$RND.'"/>';

            echo $Text;
            exit;         
        }
        
    } 
    
    
    //Нет аватарки
    $Text = '<img class ="Avatar200" id ="Avatar200" src="./ImgAvatar/nofoto.png"/>';
    echo $Text;
    exit;  
       
  
}

?>