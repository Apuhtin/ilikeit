<?php
 /**
 * Обработчик формы создания и редактирования батлов
 */

/*Если нажата кнопка удалить, удаляем Батл из базы*/
if(isset($_POST['TypeContent'])){
      
    if ($_POST['TypeContent']==2) {
    
        if (isset($_POST['NewBtlId'])) {
            $Id = FormChar($_POST['NewBtlId']);

        } else {
            $Id = 0;
        }

        $row = array();    
        $result = InputCeateBattlesVideo($row, $Id);
        echo $result;
        exit();
    }
}



 /*Если нажата кнопка на запись, начинаем проверку или нажата кнопка на публикацию батла*/ 
 if(isset($_POST['SaveNBT']) or isset($_POST['PublicNBT']))
 {   
     
    //Если нажата кнопка Сохранить
    if (isset($_POST['SaveNBT'])){
        $SaveNBT = 1;
    } 
    else{
        $SaveNBT = 0;
    }       
 
    //Если нажата кнопка Опубликовать
    if (isset($_POST['PublicNBT'])){
        $PublicNBT = 1;
    } 
    else{
        $PublicNBT = 0;
    }  
    
    //Очистка параметров от разного хаккерского мусора
    if (isset($_POST['Id'])){
        $Id = FormChar($_POST['Id']);
    } 
    else{
        $Id = 0;
    }   
    if (isset($_POST['Title'])){
        $Title = FormChar($_POST['Title']);
    } 
    else{
        $Title = "";
    }
    if (isset($_POST['Text'])){
        $Text = FormChar($_POST['Text']);
    } 
    else{
        $Text = "";
    }   
    if (isset($_POST['Tags'])){
        $Tags = FormChar($_POST['Tags']);
    } 
    else{
        $Tags = "";
    }     
    if (isset($_POST['Day'])){
        $Day = FormChar($_POST['Day']);
    } 
    else{
        $Day = 0;
    } 
    if (isset($_POST['Stavka'])){
        $Stavka = FormChar($_POST['Stavka']);
    } 
    else{
        $Stavka = 0;
    }    
    if (isset($_POST['Link1'])){
        $Link1 = FormChar($_POST['Link1']);
    } 
    else{
        $Link1 = "";
    }    
    if (isset($_POST['Link2'])){
        $Link2 = FormChar($_POST['Link2']);
    } 
    else{
        $Link2 = "";
    }     
       
    if (isset($_POST['LinkFile1'])){
        $LinkFile1 = FormChar($_POST['LinkFile1']);
    } 
    else{
        $LinkFile1 = "";
    }    
    if (isset($_POST['LinkFile2'])){
        $LinkFile2 = FormChar($_POST['LinkFile2']);
    } 
    else{
        $LinkFile2 = "";
    }      
    if (isset($_POST['Type'])) {
        $Type = FormChar($_POST['Type']); 
    } else {
        $Type = 1; //1-Фото, 2-Видео
    }       
    if (isset($_POST['Category'])){
        $Category = FormChar($_POST['Category']); 
    } 
    else{
        $Category = 0; //0-Все категории
    }      
    if (isset($_POST['TypeBattle'])){
        $TypeBattle = FormChar($_POST['TypeBattle']); 
    } 
    else{
        $TypeBattle = 0; //0-монобитва, 1-Звезды, 2-Деньги
    }      
    if (isset($_POST['UserId'])){
        $UserID = $_POST['UserId'];
    } 
    else{
        $UserID = 0;
        
        echo $GLOBALS['Dict']['Create_User'];
        exit;
    }
    
    if ($Type == 1) {
        //AD $Link1 - нужна проверка на то что это ссылка из интернета
        //Определяем какие ссылки записывать
        if ($Link1 == "" and $LinkFile1<>"") {
            $Link1 = $LinkFile1;
        }
        //Отдаем предпочтение ссылкам из интернета, чтобы не занимать место на совоем серваке
        if ($Link1 <> $LinkFile1) {
    //        if (file_exists($LinkFile1)) {
    //            unlink($LinkFile1);  //удаляем файл с диска 
    //        }
        }    

        //Определяем какие ссылки записывать
        if ($Link2 == "" and $LinkFile2<>"") {
            $Link2 = $LinkFile2;
        }
        //Отдаем предпочтение ссылкам из интернета, чтобы не занимать место на совоем серваке
        if ($Link2 <> $LinkFile2) {
    //        if (file_exists($LinkFile2)) {
    //            unlink($LinkFile2);  //удаляем файл с диска 
    //        }
        }    
    } else if ($Type == 2) {
        $Link1 = $LinkFile1;
        $Link2 = $LinkFile2;
    }

    //Текущий статус Батла 0-на редактировании, 1-опубликован и ждет партнера
  
    if (isset($_POST['StatusBattle'])) {
        $StatusBattle = $_POST['StatusBattle'];
    } else {
        $StatusBattle = 0;
    }    
    

     
    //Если публикуем Батл то создаем таблиуц коментариев
    if ($PublicNBT == 1) {
            
        $StatusBattle = 1;
        $ErrFun = 0;
 
        
//        //Проверяем пришедшие данные  эта проверка нужна при публикации батла  
        if(empty($Title)){
            $Message = $GLOBALS['Dict']['Create_ErrTitle'];
            $ErrFun = 1;
        }
//        if(empty($Text)){
//            $Message = 'Поле $Text не может быть пустым!';
//            $ErrFun = 1;
//        }
//        if(empty($Tags)){
//            $Message = 'Поле $Tags не может быть пустым!';
//            $ErrFun = 1;
//        } 
//        if(empty($Day)){
//            $Message = 'Поле $Day не может быть пустым!';
//            $ErrFun = 1;
//        }
//        if(empty($Stavka)){
//            $Message = 'Поле $Stavka не может быть пустым!';
//            $ErrFun = 1;
//        }      
        if(empty($Link1)){
            $Message = $GLOBALS['Dict']['Create_Link1'];
            $ErrFun = 1;
        }
        if(empty($Link2)){
            $Message = $GLOBALS['Dict']['Create_Link2'];
            $ErrFun = 1;
        } 
        if ($ErrFun > 0){
                  
            $TextMsg ='<h1>'.$GLOBALS['Dict']['Create_Title'].'</h1>
                    <div class="NBT_Message">'.$Message.'</div>
                    <input type="hidden" name="UserId" Id="UserId" value ="'.$UserID.'">                                                                
                    <input type="hidden" name="NewBtlId" Id="NewBtlId" value ="'.$Id.'">                                                         
                    <input type="hidden" name="StatusBtl" Id="StatusBtl" value ="'.$StatusBattle.'">';  
            
            echo $TextMsg;
            exit;
        }

        
    }
    
    $Prefix = $UserID."_";
    $uniq = uniqid($Prefix);

   
    if($Id>0){
        
        /*Проверяем существует ли у нас такой батл*/
        $sql = 'SELECT `Id` 
        FROM `newbattles`
        WHERE `Id` = "'.$Id.'"';

        $row = mysqli_fetch_assoc(mysqli_query ($db_connect, $sql));       
        
        if($row['Id']){
            //Если такой батл уже есть тогда его редактируем
            EditNewBattle($db_connect, $Id, $StatusBattle, $UserID, $Title, $Text, $Tags, $Day, $Stavka, $Link1, $Link2, $Type, $Category, $TypeBattle);
            
            //Если нажата Кнопка Опубликовать
            if($PublicNBT==1){
                              
                CreateTablComtnts($Id);
                
                echo '200';
                exit;
            }

            if ($SaveNBT == 1) {
                 
                $Message = $GLOBALS['Dict']['Create_Save'];  
                $TextMsg ='<h1>'.$GLOBALS['Dict']['Create_Title'].'</h1>
                        <div class="NBT_Message">'.$Message.'</div>
                        <input type="hidden" name="UserId" Id="UserId" value ="'.$UserID.'">                                                                
                        <input type="hidden" name="NewBtlId" Id="NewBtlId" value ="'.$Id.'">                                                         
                        <input type="hidden" name="StatusBtl" Id="StatusBtl" value ="'.$StatusBattle.'">';    

                echo $TextMsg;
                exit;
            }
        }      
        else{
            
            //Если батла нет то создаем новый
            AddNewBattle($db_connect, $Id, $StatusBattle, $UserID, $Title, $Text, $Tags, $Day, $Stavka, $Link1, $Link2, $Type, $Category, $TypeBattle, $uniq);
            $Id = ReadIdNewBattle($db_connect, $UserID, $uniq);  

            $LinkNew1 = "";
            $LinkNew2 = "";
            
            //Переименовываем файлы
            if ($Link1 <> ""){
                if (file_exists($Link1)) {
                    $LinkNew1 = str_replace ("_0_", "_".$Id."_", $Link1);
                    rename($Link1, $LinkNew1);
                }
            }
            
            if ($Link2 <> ""){
                if (file_exists($Link2)) {
                    $LinkNew2 = str_replace ("_0_", "_".$Id."_", $Link2);
                    rename($Link2, $LinkNew2);
                } 
            }
            
            //Обновляем ссылки на картинки в БД
            UpdateLink($db_connect, $Id, $LinkNew1, $LinkNew2);    
            
            //Если нажата Кнопка Опубликовать
            if($PublicNBT==1){
                echo '200';
                exit;                

            }
            //Если нажата Кнопка Сохранить
            if ($SaveNBT == 1) {  
                $Message = $GLOBALS['Dict']['Create_Save']; 
                $TextMsg ='<h1>Создать</h1>
                        <div class="NBT_Message">'.$Message.'</div>
                        <input type="hidden" name="UserId" Id="UserId" value ="'.$UserID.'">                                                                
                        <input type="hidden" name="NewBtlId" Id="NewBtlId" value ="'.$Id.'">                                                         
                        <input type="hidden" name="StatusBtl" Id="StatusBtl" value ="'.$StatusBattle.'">';    

                echo $TextMsg;
                exit;
            }
        }
    }
    else {
        //Если батла нет то создаем новый
             
        AddNewBattle($db_connect, $Id, $StatusBattle, $UserID, $Title, $Text, $Tags, $Day, $Stavka, $Link1, $Link2, $Type, $Category, $TypeBattle, $uniq);
        $Id = ReadIdNewBattle($db_connect, $UserID, $uniq);  

        // Если фото 
        if ($Type == 1) {
            
            $LinkNew1 = "";
            $LinkNew2 = "";
            
            //Переименовываем файлы
            if ($Link1 <> "") {
                if (file_exists($Link1)) {
                    $LinkNew1 = str_replace ("_0_", "_".$Id."_", $Link1);
                    rename($Link1, $LinkNew1);
                }
            }

            if ($Link2 <> "") {
                if (file_exists($Link2)) {
                    $LinkNew2 = str_replace ("_0_", "_".$Id."_", $Link2);
                    rename($Link2, $LinkNew2);
                } 
            }
            
            //Обновляем ссылки на картинки в БД
            UpdateLink($db_connect, $Id, $LinkNew1, $LinkNew2);            
            
        }    
        
        //Если нажата Кнопка Опубликовать
        if($PublicNBT==1){
            echo '200';
            exit;
        }
           
        if ($SaveNBT == 1) {
  
            $Message = $GLOBALS['Dict']['Create_Save']; 
            $TextMsg ='<h1>'.$GLOBALS['Dict']['Create_Title'].'</h1>
                    <div class="NBT_Message">'.$Message.'</div>
                    <input type="hidden" name="UserId" Id="UserId" value ="'.$UserID.'">                                                                
                    <input type="hidden" name="NewBtlId" Id="NewBtlId" value ="'.$Id.'">                                                         
                    <input type="hidden" name="StatusBtl" Id="StatusBtl" value ="'.$StatusBattle.'">';    
            
            echo $TextMsg;
            exit;
        }       
    }        
}

/*Если нажата кнопка удалить, удаляем Батл из базы*/
if(isset($_POST['Delete'])){
    

    if (isset($_POST['NewBtlId'])){
        $Id = FormChar($_POST['NewBtlId']);
        if($Id>0){
                       
            DelStringNewBattle($db_connect, $Id);
            echo '200';
            exit;
        } 
    } 
}
 
 
if(isset($_POST['UpdateLink'])){
    
    if (isset($_POST['Prefix'])){
        $Prefix = $_POST['Prefix'];
    }
    else {
        $Prefix = "";
    }   
    
    if (isset($_POST['Link'])){
        $Link = FormChar($_POST['Link']);
        
        if ($Link == ""){
            $TextMsg = '<img class="ImgDual" id ="Btl_Img'.$Prefix.'" src="../images/lam.png"/>
                        <input type="hidden" name="LinkFileServer'.$Prefix.'" Id="LinkFileServer'.$Prefix.'" value ="">';
        }
        else{
            
            $TextMsg = '<img class="ImgDual" id ="Btl_Img'.$Prefix.'" src="'.$Link.'"/>
                        <input type="hidden" name="LinkFileServer'.$Prefix.'" Id="LinkFileServer'.$Prefix.'" value ="">';
        }
    } 
    else{
        $TextMsg = '<img class="ImgDual" id ="Btl_Img'.$Prefix.'" src="../images/lam.png"/>
                    <input type="hidden" name="LinkFileServer'.$Prefix.'" Id="LinkFileServer'.$Prefix.'" value ="">';
    }    
    
    echo $TextMsg;
    exit;
}

//Загрузить фотки пользователя
if(isset($_POST['DownloadFile1']) or isset($_POST['DownloadFile2']))
{
        
    $Prefix = "";
    if(isset($_POST['DownloadFile1'])){
        $Prefix = 1;
    }
    if(isset($_POST['DownloadFile2'])){
        $Prefix = 2;
    }    
    
    if(isset($_POST['NewBtlId'])){
        $Id = $_POST['NewBtlId']; 
    }   
    else{
        $Id = 0;
    }
    
     
    
    $UserId = FormChar($_SESSION['UserId']);

    $whitelist = array(".jpg", ".jpeg", ".png");

    if ($_FILES["filename"]["size"] > 1024 * 2 * 1024) {
        echo  $GLOBALS['Dict']['Profile_ErrSize'];
        exit;
    }    
   
    $error = true;
    //Проверяем разрешение файла
    foreach ($whitelist as $value) {
        if(preg_match("/$value\$/i",$_FILES['filename']['name'])) {$error = false;} 
        
    }
       
    if($error) {     
        echo $GLOBALS['Dict']['Profile_ErrExt'];
        exit;
        
    }

    $folder =  './ImgUsers/';
    $NameFile = $UserId."_".$Id."_".$Prefix;
 
      
    $uploadedFile =  $folder.basename($_FILES['filename']['name']);
    

      
    // Проверяем загружен ли файл
    if(is_uploaded_file($_FILES['filename']['tmp_name'])){
        // Если файл загружен успешно, перемещаем его из временной директории в конечную        
        if(move_uploaded_file($_FILES['filename']['tmp_name'],$uploadedFile)){
            
            //Ресайз картинки
            $FileOutput = $folder.$NameFile.'.png'; //Путь к картинке             
            resizeimg($uploadedFile, 398, 298, $FileOutput );
           
            unlink($uploadedFile);  //удаляем временный файл                    
            unset($_FILES['filename']);
            
            
            $RND = uniqid();        
            $Text = '<img  class="ImgDual" id ="Btl_Img'.$Prefix.'" src="'.$FileOutput.'?'.$RND.'"/>
                    <input type="hidden" name="LinkFileServer'.$Prefix.'" Id="LinkFileServer'.$Prefix.'" value ="'.$FileOutput.'">';
            
            echo $Text;
            exit;
        }
        else {
            echo $GLOBALS['Dict']['Profile_ErrUpload'];
            exit;
            }
        }
    else {
        echo $GLOBALS['Dict']['Profile_ErrSize'];
        exit;
    }    
}


if(isset($_POST['DelFile'])){
    
    
    if (isset($_POST['Prefix'])){
        $Prefix = $_POST['Prefix'];
    }
    else {
        $Prefix = "";
    }
    
    if (isset($_POST['BtlId'])){
        $BtlId = $_POST['BtlId'];
    }
    else{
        $BtlId = 0;
    }
    
    if (isset($_POST['UserId'])){
        $UserId = $_POST['UserId'];
    }
    else {
        $UserId = "";
    }    
    
    
    $folder =  './ImgUsers/';
    $NameFile = $UserId."_".$BtlId."_".$Prefix;
    $Filename = $folder.$NameFile.'.png'; //Путь к картинке
    
    if (file_exists($Filename)) {
        unlink($Filename);  //удаляем файл с диска 
    }
    $TextMsg = '<img class="ImgDual"  id ="Btl_Img'.$Prefix.'" src="../images/lam.png"/>
                <input type="hidden" name="LinkFileServer'.$Prefix.'" Id="LinkFileServer'.$Prefix.'" value ="">';
    echo $TextMsg;
    exit;
}

//Повернуть Аватар
if(isset($_POST['Rotate'])) 
{
    if (isset($_POST['Prefix'])){
        $Prefix = $_POST['Prefix'];
    }
    else {
        $Prefix = "";
    }
    
    if (isset($_POST['BtlId'])){
        $BtlId = $_POST['BtlId'];
    }
    else{
        $BtlId = 0;
    }
    
    if (isset($_POST['UserId'])){
        $UserId = $_POST['UserId'];
    }
    else {
        $UserId = "";
    } 
    if (isset($_POST['degres'])){
        $degres = $_POST['degres'];
    }

    $folder =  './ImgUsers/';
    $NameFile = $UserId."_".$BtlId."_".$Prefix;
    $Filename = $folder.$NameFile.'.png'; //Путь к картинке
  
   
    if (file_exists($Filename)) {
        $Result=rotateimg($Filename, $degres);
        
        $RND = uniqid();        
        $Text = '<img  class="ImgDual" id ="Btl_Img'.$Prefix.'" src="'.$Filename.'?'.$RND.'"/>
                <input type="hidden" name="LinkFileServer'.$Prefix.'" Id="LinkFileServer'.$Prefix.'" value ="'.$Filename.'">';

        echo $Text;
        exit;     
    }
        
    //Нет картинки    
    $TextMsg = '<img class="ImgDual"  id ="Btl_Img'.$Prefix.'" src="../images/lam.png"/>
                <input type="hidden" name="LinkFileServer'.$Prefix.'" Id="LinkFileServer'.$Prefix.'" value ="">';
    echo $TextMsg;
    exit;       
  
}


?>