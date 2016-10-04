 <?php

//Вывод html для страницы Параметры прользователя
function InputProfile($fdb_connect, $UserId){

    
    if ($UserId >0) { 
        
        $sql = "SELECT * 
        FROM `reg`
        WHERE `Id` = '$UserId'";

        $row = mysqli_fetch_assoc(mysqli_query ($fdb_connect, $sql));       

        $Email = $row['Login'];
        $NikName = $row['NikName'];
        $UserAvatar = $row['Avatar'];  
        $Name = $row['Name'];
        $LastName = $row['LastName'];
        $SecondName = $row['SecondName'];  
        $Sex = $row['Sex'];
        $Lang = $row['Lang'];
        $Tel = $row['Tel'];  
        $Skype = $row['Skype'];
        $ISQ = $row['ISQ']; 
        $Message = $row['Message'];
        
        $user_panel = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/profile.tpl');
        

        $user_panel = str_replace("{UserId}", $UserId, $user_panel);
        $user_panel = str_replace("{NikName}", $NikName, $user_panel);
        $user_panel = str_replace("{Name}", $Name, $user_panel);
        $user_panel = str_replace("{LastName}", $LastName, $user_panel);
        $user_panel = str_replace("{SecondName}", $SecondName, $user_panel);
        $user_panel = str_replace("{Email}", $Email, $user_panel);
        $user_panel = str_replace("{Tel}", $Tel, $user_panel);
        $user_panel = str_replace("{Skype}", $Skype, $user_panel);
        $user_panel = str_replace("{ISQ}", $ISQ, $user_panel);
        
        
        if ($UserAvatar > 0) {
            $srcAvatar = '../ImgAvatar/B_'.$UserId.'.png';} 
        else{
            $srcAvatar = '../ImgAvatar/nofoto.png';   
        }
        $user_panel = str_replace("{srcAvatar}", $srcAvatar, $user_panel);
        
        //Пол
        $SexSlected = "SexSlected_".$Sex;
        $user_panel = str_replace("{".$SexSlected."}", "selected", $user_panel);
 
        //Язык
        $LangSlected = "LangSlected_".$Lang;
        $user_panel = str_replace("{".$LangSlected."}", "selected", $user_panel);        
 
        //Рассылка
        $MsgSlected = "MsgSlected_".$Lang;
        $user_panel = str_replace("{".$MsgSlected."}", "selected", $user_panel);  
        
//        $Message = "";
//        if(!empty($_SESSION['message'])){       
//            $Message = $_SESSION['message'];
//            $_SESSION['message'] = array();
//        }
         
//        $user_panel = str_replace("{MessageShow}", $Message, $user_panel);  
        
        //Удаляем незамененные {selected} переменные в конструкциях select 
        $user_panel = preg_replace('/{.*?}/is', '', $user_panel);
        
        
        echo $user_panel;
        
    }
}


//Вывод html для страницы Параметры битвы
function InputCeateBattles($fdb_connect, $BtlId){
    
    if ($BtlId >0) {
    //Если батл сохранен то считываем его из базы

        $sql = "SELECT * 
        FROM `newbattles`
        WHERE `Id` = '$BtlId'";

        $row = mysqli_fetch_assoc(mysqli_query ($fdb_connect, $sql));       
        
        $StatusBattle = $row['Status']; 
        $UserId = $row['IdUser1'];
        $IdBatltle1 = $row['IdBatltle1'];
        $Type = $row['Type'];
        $Day = $row['Day'];
        $Stavka = $row['Stavka'];
        $TypeBattle = $row['TypeBattle'];
        $Category = $row['Category'];
        $Link1 = $row['Link1'];
        $Link2 = $row['Link2'];
        $Title = $row['Title'];
        $Text = $row['Text'];
        $Tags = $row['Tags'];
        $CreateDate  = $row['Date'];
        
        // Елси тип фото
        if ($Type == 1) {

            $user_panel = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/CreateBattle.tpl');
            $user_panel = str_replace("{ChangeVideo}", "", $user_panel); 
            $user_panel = str_replace("{UserId}", $UserId, $user_panel); 
            $user_panel = str_replace("{NewBtlId}", $BtlId, $user_panel); 
            $user_panel = str_replace("{StatusBtl}", $StatusBattle, $user_panel); 
            
            
            $PhotoDual = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/CreateBattlePhoto.tpl');
            $PhotoDual = str_replace("{IdBatltle1}", $IdBatltle1, $PhotoDual); 
            $PhotoDual = str_replace("{Type}", $Type, $PhotoDual); 
            $PhotoDual = str_replace("{Day}", $Day, $PhotoDual); 
            $PhotoDual = str_replace("{Stavka}", $Stavka, $PhotoDual); 
            $PhotoDual = str_replace("{TypeBattle}", $TypeBattle, $PhotoDual); 
            $PhotoDual = str_replace("{Category}", $Category, $PhotoDual); 
            $PhotoDual = str_replace("{Title}", $Title, $PhotoDual); 
            $PhotoDual = str_replace("{Text}", $Text, $PhotoDual); 
            $PhotoDual = str_replace("{Tags}", $Tags, $PhotoDual); 
            $PhotoDual = str_replace("{CreateDate}", $CreateDate, $PhotoDual); 
            $PhotoDual = str_replace("{Link1}", $Link1, $PhotoDual); 
            $PhotoDual = str_replace("{Link2}", $Link2, $PhotoDual);

            //AD Тут нужно определять тип ссылки с интернета она или из фала
            if ($Link1 == ""){
                $ImgLink1 = '<img class="ImgDual" id ="Btl_Img1" src="../images/lam.png"/>
                            <input type="hidden" name="LinkFileServer1" Id="LinkFileServer1" value ="">';
            } else {
                $ImgLink1 = '<img class="ImgDual" id ="Btl_Img1" src="'.$Link1.'"/>
                            <input type="hidden" name="LinkFileServer1" Id="LinkFileServer1" value ="'.$Link1.'">';
            }

            if ($Link2 == ""){
                $ImgLink2 = '<img class="ImgDual" id ="Btl_Img2" src="../images/lam.png"/>
                            <input type="hidden" name="LinkFileServer2" Id="LinkFileServer2" value ="">';
            } else {
                $ImgLink2 = '<img class="ImgDual" id ="Btl_Img2"  src="'.$Link2.'"/>
                            <input type="hidden" name="LinkFileServer2" Id="LinkFileServer2" value ="'.$Link2.'">';
            }     

            $PhotoDual = str_replace("{ImgLink1}", $ImgLink1, $PhotoDual); 
            $PhotoDual = str_replace("{ImgLink2}", $ImgLink2, $PhotoDual); 

            $user_panel = str_replace("{DivDual}", $PhotoDual, $user_panel); 
            
            //Удаляем незамененные {selected} переменные в конструкциях select 
            $user_panel = preg_replace('/{.*?}/is', '', $user_panel);

            echo $user_panel;
            
        // Елси тип видео    
        } else if ($Type = 2) {
            
            
            $user_panel = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/CreateBattle.tpl');
            $user_panel = str_replace("{UserId}", $UserId, $user_panel); 
            $user_panel = str_replace("{NewBtlId}", $BtlId, $user_panel); 
            $user_panel = str_replace("{StatusBtl}", $StatusBattle, $user_panel); 
            
            $VideoDual = InputCeateBattlesVideo($row, $BtlId);

            $user_panel = str_replace("{DivDual}", $VideoDual, $user_panel);
            
            //Удаляем незамененные {selected} переменные в конструкциях select 
            $user_panel = preg_replace('/{.*?}/is', '', $user_panel);

            echo $user_panel;                
            
        }       
    } else {
    //Если нет то просто выводим шаблон
        
        if(isset($_SESSION['UserId'])) {
            
            $UserId = $_SESSION['UserId'];
            $NewBtlId = 0;
            $ChangeVideo = '<input class="BtnTypeVideo" id="BtnTypeVideo" type="button" name="TypeVideo"  onClick = "TypeBtl(2)" />';
            // <input class="BtnTypeFoto" id="BtnTypeFoto" type="button" name="TypeFoto"  onClick = "TypeBtl(1)" />
            
            $user_panel = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/CreateBattle.tpl');
            $user_panel = str_replace("{ChangeVideo}", $ChangeVideo, $user_panel);
            $user_panel = str_replace("{UserId}", $UserId, $user_panel); 
            $user_panel = str_replace("{NewBtlId}", $NewBtlId, $user_panel); 
            $user_panel = str_replace("{StatusBtl}", 0, $user_panel); 
            
          
            $PhotoDual = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/CreateBattlePhoto.tpl');
            $PhotoDual = str_replace("{IdBatltle1}", 0, $PhotoDual); 
            $PhotoDual = str_replace("{Type}", 1, $PhotoDual); 
            $PhotoDual = str_replace("{Day}", 0, $PhotoDual); 
            $PhotoDual = str_replace("{Stavka}", 0, $PhotoDual); 
            $PhotoDual = str_replace("{TypeBattle}", 0, $PhotoDual); 
            $PhotoDual = str_replace("{Category}", 0, $PhotoDual); 
            $PhotoDual = str_replace("{Title}", "", $PhotoDual); 
            $PhotoDual = str_replace("{Text}", "", $PhotoDual); 
            $PhotoDual = str_replace("{Tags}", "", $PhotoDual); 
            $PhotoDual = str_replace("{CreateDate}", 0, $PhotoDual); 
            $PhotoDual = str_replace("{Link1}", "", $PhotoDual); 
            $PhotoDual = str_replace("{Link2}", "", $PhotoDual);

            $ImgLink1 = '<img class="ImgDual" id ="Btl_Img1" src="../images/lam.png"/>
                        <input type="hidden" name="LinkFileServer1" Id="LinkFileServer1" value ="">';
            $ImgLink2 = '<img class="ImgDual" id ="Btl_Img2" src="../images/lam.png"/>
                        <input type="hidden" name="LinkFileServer2" Id="LinkFileServer2" value ="">';

            $PhotoDual = str_replace("{ImgLink1}", $ImgLink1, $PhotoDual); 
            $PhotoDual = str_replace("{ImgLink2}", $ImgLink2, $PhotoDual); 
           
            $user_panel = str_replace("{DivDual}", $PhotoDual, $user_panel); 
            
            //Удаляем незамененные {selected} переменные в конструкциях select 
            $user_panel = preg_replace('/{.*?}/is', '', $user_panel);

            echo $user_panel;                               
            
        }                  
    }
}



//Вывод html для страницы Параметры битвы
function InputCeateBattlesVideo($row, $BtlId) {
    
    if ($BtlId >0) {
            
        $StatusBattle = $row['Status']; 
        $UserId = $row['IdUser1'];
        $IdBatltle1 = $row['IdBatltle1'];
        $Type = $row['Type'];
        $Day = $row['Day'];
        $Stavka = $row['Stavka'];
        $TypeBattle = $row['TypeBattle'];
        $Category = $row['Category'];
        $Link1 = $row['Link1'];
        $Link2 = $row['Link2'];
        $Title = $row['Title'];
        $Text = $row['Text'];
        $Tags = $row['Tags'];
        $CreateDate  = $row['Date'];
        
        
        $VideoDual = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/CreateBattleVideo.tpl');
        $VideoDual = str_replace("{IdBatltle1}", $IdBatltle1, $VideoDual); 
        $VideoDual = str_replace("{Type}", $Type, $VideoDual); 
        $VideoDual = str_replace("{Day}", $Day, $VideoDual); 
        $VideoDual = str_replace("{Stavka}", $Stavka, $VideoDual); 
        $VideoDual = str_replace("{TypeBattle}", $TypeBattle, $VideoDual); 
        $VideoDual = str_replace("{Category}", $Category, $VideoDual); 
        $VideoDual = str_replace("{Title}", $Title, $VideoDual); 
        $VideoDual = str_replace("{Text}", $Text, $VideoDual); 
        $VideoDual = str_replace("{Tags}", $Tags, $VideoDual); 
        $VideoDual = str_replace("{CreateDate}", $CreateDate, $VideoDual); 
        $VideoDual = str_replace("{Link1}", $Link1, $VideoDual); 
        $VideoDual = str_replace("{Link2}", $Link2, $VideoDual);    
        

        // Скриншоты видео лежат по этим адресам
        // https://i.ytimg.com/vi/1oTx6T-XlYM/hqdefault.jpg
        // http://img.youtube.com/vi/wXGPcphm00s/0.jpg     
        
        if ($Link1 == ""){
            $ImgLink1 = '<iframe class="iframeYouTube"  src="" frameborder="0" allowfullscreen></iframe>
                        <input type="hidden" name="LinkFileServer1" Id="LinkFileServer1" value ="">';                               
        }
        else{
            $ImgLink1 = '<iframe class="iframeYouTube" src="https://www.youtube.com/embed/'.$Link1.'?rel=0" frameborder="0" allowfullscreen></iframe>
                        <input type="hidden" name="LinkFileServer1" Id="LinkFileServer1" value ="'.$Link1.'">';            
        }
        
        if ($Link2 == ""){
            $ImgLink2 = '<iframe class="iframeYouTube"  src="" frameborder="0" allowfullscreen></iframe>
                        <input type="hidden" name="LinkFileServer2" Id="LinkFileServer2" value ="">';
        }
        else{
            $ImgLink2 = '<iframe class="iframeYouTube"  src="https://www.youtube.com/embed/'.$Link2.'?rel=0" frameborder="0" allowfullscreen></iframe>
                        <input type="hidden" name="LinkFileServer2" Id="LinkFileServer2" value ="'.$Link2.'">';
        }     
               
        $VideoDual = str_replace("{ImgLink1}", $ImgLink1, $VideoDual); 
        $VideoDual = str_replace("{ImgLink2}", $ImgLink2, $VideoDual); 
        
                       
        //Удаляем незамененные {selected} переменные в конструкциях select 
        $VideoDual = preg_replace('/{.*?}/is', '', $VideoDual);
        
        return $VideoDual;
    }
    else{
    //Если нет то просто выводим шаблон
        
        if(isset($_SESSION['UserId'])) {
            
            $UserId = $_SESSION['UserId'];
            $NewBtlId = 0;
 
            $VideoDual = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/CreateBattleVideo.tpl');
            $VideoDual = str_replace("{IdBatltle1}", 0, $VideoDual); 
            $VideoDual = str_replace("{Type}", 2, $VideoDual); 
            $VideoDual = str_replace("{Day}", 0, $VideoDual); 
            $VideoDual = str_replace("{Stavka}", 0, $VideoDual); 
            $VideoDual = str_replace("{TypeBattle}", 0, $VideoDual); 
            $VideoDual = str_replace("{Category}", 0, $VideoDual); 
            $VideoDual = str_replace("{Title}", "", $VideoDual); 
            $VideoDual = str_replace("{Text}", "", $VideoDual); 
            $VideoDual = str_replace("{Tags}", "", $VideoDual); 
            $VideoDual = str_replace("{CreateDate}", 0, $VideoDual); 
            $VideoDual = str_replace("{Link1}", "", $VideoDual); 
            $VideoDual = str_replace("{Link2}", "", $VideoDual);

            
//             https://www.youtube.com/embed/?rel=0
            $ImgLink1 = '<iframe class="iframeYouTube" src="" frameborder="0" allowfullscreen></iframe>
                        <input type="hidden" name="LinkFileServer1" Id="LinkFileServer1" value ="">';
            
            $ImgLink2 = '<iframe class="iframeYouTube" src="" frameborder="0" allowfullscreen>
                        </iframe><input type="hidden" name="LinkFileServer2" Id="LinkFileServer2" value ="">';

        
//            $ImgLink1 = '<img class="ImgDual" id ="Btl_Img1" src="../images/lam.png"/>';
//            $ImgLink2 = '<img class="ImgDual" id ="Btl_Img2" src="../images/lam.png"/>';

            $VideoDual = str_replace("{ImgLink1}", $ImgLink1, $VideoDual); 
            $VideoDual = str_replace("{ImgLink2}", $ImgLink2, $VideoDual); 
            
            //Удаляем незамененные {selected} переменные в конструкциях select 
            $VideoDual = preg_replace('/{.*?}/is', '', $VideoDual);

            return $VideoDual;     
                       
        }                  
    }
}


// Считываем список опубликованных батлов 
function ReadListUserBattle($fdb_connect, $UserId, $Page = 1){

    //Определяем поля сортировки
//    switch($OrdBY){
//        case 1:
//            $OrderBY = "`Id`";
//            $NameTabl = "newbattles";
//        break; 
//        default:
//            $OrderBY = "`Id`"; 
//            $NameTabl = "newbattles";
//    }

    $sql = 'SELECT COUNT(*) AS `count` 
            FROM `newbattles` 
            WHERE `IdUser1` ="'.$UserId.'" AND `Status`<9 GROUP BY `IdUser1`';
    
    $row = mysqli_fetch_assoc(mysqli_query ($fdb_connect, $sql)); 
    $Count = $row['count'];

//    $Page = 1; //Текущая страница
    $KolPages = ceil($Count/10); //Количество страниц
    $Pos = ($Page-1)*10; //Позиция с которой надо выбрать данные
    
    
    //Нужно брать из шаблона так как тут буут параметры сотировки
    $TextStart ='<div class="DivDual">   
                    <h2>'.$GLOBALS['Dict']['ListUsr_Title'].': '.$Count.'</h2>';
    $TextEnd = '</div>';   
    
    $sql = 'SELECT *  
            FROM `newbattles`
            WHERE `IdUser1` ="'.$UserId.'" AND `Status`<9  ORDER BY `Id` DESC LIMIT '.$Pos.', 10'; 
        
      
    $Result = mysqli_query ($fdb_connect, $sql);

    $TextForm ="";
    while ($row = mysqli_fetch_assoc($Result)) {    
        $BtlId = $row['Id'];
        $StatusBattle = $row['Status']; 
        $UserId = $row['IdUser1'];
        $IdBatltle1 = $row['IdBatltle1'];
        $Type = $row['Type'];
        $Day = $row['Day'];
        $Stavka = $row['Stavka'];
        $TypeBattle = $row['TypeBattle'];
        $Category = $row['Category'];
        $Link1 = $row['Link1'];
        $Link2 = $row['Link2'];
        $Title = $row['Title'];
        $Text = $row['Text'];
        $Tags = $row['Tags'];
        $CreateDate  = $row['Date'];
        $CreateDate = date("d.m.Y H:i", strtotime($CreateDate));
        
        $Chet1  = $row['Chet1'];
        $Chet2  = $row['Chet2'];
        $Chet = $Chet1 + $Chet2;
        $Chet  = number_format($Chet, 0, '', ' '); //Общий счет кликов     

        $user_panel = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/ListUserBattles.tpl');
        
        
        $user_panel = str_replace("{BtlId}", $BtlId, $user_panel); 
        $user_panel = str_replace("{StatusBtl}", $StatusBattle, $user_panel); 
        
//        $user_panel = str_replace("{IdBatltle1}", $IdBatltle1, $user_panel); 
//        $user_panel = str_replace("{Type}", $Type, $user_panel); 
//        $user_panel = str_replace("{Day}", $Day, $user_panel); 
//        $user_panel = str_replace("{Stavka}", $Stavka, $user_panel); 
//        $user_panel = str_replace("{TypeBattle}", $TypeBattle, $user_panel); 
//        $user_panel = str_replace("{Category}", $Category, $user_panel); 
        $user_panel = str_replace("{Title}", $Title, $user_panel); 
//        $user_panel = str_replace("{Text}", $Text, $user_panel); 
//        $user_panel = str_replace("{Tags}", $Tags, $user_panel); 
        $user_panel = str_replace("{CreateDate}", $CreateDate, $user_panel); 
        
        
//        $user_panel = str_replace("{Link1}", $Link1, $user_panel); 
//        $user_panel = str_replace("{Link2}", $Link2, $user_panel);
        
        
        if ($Type == 1) { 
            if ($Link1 == "") {
                $ImgLink1 = '<img src="../images/lam.png"/>';
            } else {
                $ImgLink1 = '<img src="'.$Link1.'"/>';
            }

            if ($Link2 == "") {
                $ImgLink2 = '<img src="../images/lam.png"/>';
            } else {
                $ImgLink2 = '<img src="'.$Link2.'"/>';
            }     
            
        } else if ($Type == 2) {
            

            // https://i.ytimg.com/vi/1oTx6T-XlYM/hqdefault.jpg
            // http://img.youtube.com/vi/wXGPcphm00s/0.jpg        

            if ($Link1 == "") {
                $ImgLink1 = '<img src="../images/lam.png"/>';
            } else {
                $ImgLink1 = '<img src="https://i.ytimg.com/vi/'.$Link1.'/hqdefault.jpg"/>';
            }

            if ($Link2 == "") {
                $ImgLink2 = '<img src="../images/lam.png"/>';
            } else {
                $ImgLink2 = '<img src="https://i.ytimg.com/vi/'.$Link2.'/hqdefault.jpg"/>';
            } 
   
        } else {
            $ImgLink1 = '<img src="../images/lam.png"/>';
            $ImgLink2 = '<img src="../images/lam.png"/>';
        }
  
        
        if ($StatusBattle == 1 ) {
            $ImgPublic = '<img src="../images/eye.png" title="'.$GLOBALS['Dict']['ListUsr_Publish'].'" />';
            $ImgChet = '<img src="../images/check-box1.png" title="'.$GLOBALS['Dict']['ListUsr_Votes'].'" />';
        } else {
            $ImgPublic = "";
            $ImgChet = "";
            $Chet = "";
        }        
        
        
        $user_panel = str_replace("{ImgLink1}", $ImgLink1, $user_panel); 
        $user_panel = str_replace("{ImgLink2}", $ImgLink2, $user_panel); 
        $user_panel = str_replace("{ImgPublic}", $ImgPublic, $user_panel);
        $user_panel = str_replace("{ImgChet}", $ImgChet, $user_panel);
        $user_panel = str_replace("{Chet}", $Chet, $user_panel);
        
        
        //Удаляем незамененные {selected} переменные в конструкциях select 
        $user_panel = preg_replace('/{.*?}/is', '', $user_panel);
        
        $TextForm = $TextForm.$user_panel;
        
    }   
      
    $TextForm = $TextStart.$TextForm.$TextEnd;       
    
    echo $TextForm; 
    $Href = "?mode=listuserbattles";
    $Text = '<div class="DivDual" id="MsgSaveNBT">
            <input type="hidden" name="SelectPage" id="SelectPage" value ="{SelectPage}">';

    $Text = $Text.PageBar(21, $KolPages, $Page, $Href);
    $Text = $Text.'</div>';  
    
    echo $Text;
}



//Вывод выбранной битвы на титульную страницу
function InputIndexBattles($fdb_connect, $IdBtl = 0){
    
    $UserId = "0";
    $IdBatltle1 = "0";
    $Type = "1";
    $Day = "";
    $Stavka = "";
    $TypeBattle = "0";
    $Category = "0";
    $Link1 = "";
    $Link2 = "";
    $Title = $GLOBALS['Dict']['Index_Btl'];
    $Text = "";
    $Tags = "";
    $CreateDate  = "";
    $Chet1  = "0";
    $Chet2  = "0"; 
    $LinkAvatar = '<img class="ImgAvatar" src="../images/photo.png"/>'; 
    $ImgLink1 = '<img src="../images/lam.png"/>';
    $ImgLink2 = '<img src="../images/lam.png"/>';
    $Avatar = 0; 
    $NikName = ""; 
    $ButtonPlus1 = '<input type="button" class="ButtonPlus" value="1" name="ButtonPlus1" id="ButtonPlus1" onClick = "ButtonPlus1()">';
    $ButtonPlus2 = '<input type="button" class="ButtonPlus" value="2" name="ButtonPlus2" id="ButtonPlus2" onClick = "ButtonPlus2()">';    
 
    if ($IdBtl == 0) {
        $Where = 'WHERE `newbattles`.Status ="1" ORDER BY `Id` DESC LIMIT 1';
    }
    else{
        $Where = 'WHERE `newbattles`.Id ="'.$IdBtl.'"';
    }

    //Объединяем две таблицы Батлов и таблицу регистрации
    //Выбираем один элемент избазы (пока последнюю запсь)
    $sql = 'SELECT `newbattles`.*, `reg`.Avatar, `reg`.NikName
            FROM `newbattles` LEFT JOIN `reg` ON `newbattles`.IdUser1 =`reg`.Id ' 
            .$Where;
    
    $Result = mysqli_query ($fdb_connect, $sql);        
               
    if ($Result){
        $row = mysqli_fetch_assoc($Result);  

        //Выводим только опубликованные батлы со статусом 1
        $StatusBattle = $row['Status'];
        
//        echo $StatusBattle;
//        exit;
        
        if ($StatusBattle == 1) {

            $IdBtl = $row['Id'];
            $UserId = $row['IdUser1'];
            $IdBatltle1 = $row['IdBatltle1'];
            $Type = $row['Type'];
            $Day = $row['Day'];
            $Stavka = $row['Stavka'];
            $TypeBattle = $row['TypeBattle'];
            $Category = $row['Category'];
            $Link1 = $row['Link1'];
            $Link2 = $row['Link2'];
            $Title = $row['Title'];
            $Text = $row['Text'];
            $Tags = $row['Tags'];
            $CreateDate  = $row['Date']; 
            $CreateDate = date("d.m.Y H:i", strtotime($CreateDate));
            $Avatar = $row['Avatar']; 
            $NikName = $row['NikName'];             
//            $Chet1  = number_format($row['Chet1'], 0, '', '`');
//            $Chet2  = number_format($row['Chet2'], 0, '', '`');
            
            $Chet1  = number_format($row['Chet1'], 0, '', ' ');
            $Chet2  = number_format($row['Chet2'], 0, '', ' ');            
            
            if ($Type ==1) {
            
                if ($Link1 == "") {
                    $ImgLink1 = '<img src="../images/lam.png"/>';
                }
                else{
                    $ImgLink1 = '<img src="'.$Link1.'"/>';
                }

                if ($Link2 == "") {
                    $ImgLink2 = '<img src="../images/lam.png"/>';
                }
                else{
                    $ImgLink2 = '<img src="'.$Link2.'"/>';
                }    
            
            } else if ($Type ==2) {
                        
                // width="398" height="224"  allowfullscreen
                
                if ($Link1 == "") {
                    $ImgLink1 = '<iframe class="iframeYouTube" src="" frameborder="0" allowfullscreen></iframe>';                               
                } else {
                    $ImgLink1 = '<iframe class="iframeYouTube" src="https://www.youtube.com/embed/'.$Link1.'?rel=0" frameborder="0" allowfullscreen></iframe>';            
                }

                if ($Link2 == "") {
                    $ImgLink2 = '<iframe class="iframeYouTube" src="" frameborder="0" allowfullscreen>';
                } else {
                    $ImgLink2 = '<iframe class="iframeYouTube" src="https://www.youtube.com/embed/'.$Link2.'?rel=0" frameborder="0" allowfullscreen></iframe>';
                }  
            } else {
                $ImgLink1 = '<img src="../images/lam.png"/>';
                $ImgLink2 = '<img src="../images/lam.png"/>';
            }   
            
            if ($Avatar > 0) {
                
                $FileAvatar = './ImgAvatar/S_'.$UserId.'.png';
                                               
                if (file_exists($FileAvatar)) {
                    $LinkAvatar = '<img class="ImgAvatar" src="'.$FileAvatar.'"/>';
                } else {
                    $LinkAvatar = '<img class="ImgAvatar" src="../images/photo.png"/>';
                }
            } else {
                $LinkAvatar = '<img class="ImgAvatar" src="../images/photo.png"/>'; 
            }
            
            //Пользователькоторый смотрит батл
            if (isset($_SESSION['UserId'])) {
                $User = $_SESSION['UserId'];
            } else {
                $User = 0;
            }            
                        
            $NameBtl = $User."_".$IdBtl;
            
            if (isset($_COOKIE[$NameBtl])) {
                $ValueCookie = $_COOKIE[$NameBtl];
                if ($ValueCookie == 1){
                    $ButtonPlus1 = '<div class="DivPlus"></div>';
                    $ButtonPlus2 = '<div class="DivMinus"></div>';
                }
                
                if ($ValueCookie == 2){
                    $ButtonPlus1 = '<div class="DivMinus"></div>';
                    $ButtonPlus2 = '<div class="DivPlus"></div>';                   
                }
                                                            
            } else {
                $ButtonPlus1 = '<input type="button" class="ButtonPlus" value="1" name="ButtonPlus1" id="ButtonPlus1" onClick = "ButtonPlus1()">';
                $ButtonPlus2 = '<input type="button" class="ButtonPlus" value="2" name="ButtonPlus2" id="ButtonPlus2" onClick = "ButtonPlus2()">';
            }           
                                 
        } 
        
        //Пользователь удалил свою битву
        if ($StatusBattle == 9) {               
            $Title = $GLOBALS['Dict']['Index_Title'];       
        }                         
    }
     
    if ($Type ==1) {
        $user_panel = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/IndexBattlePhoto.tpl');
    } elseif ($Type ==2) {
        $user_panel = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/IndexBattleVideo.tpl');
    } else {
        $user_panel = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/IndexBattlePhoto.tpl');
    }
    
    
//    $user_panel = str_replace("{UserId}", $UserId, $user_panel);          
    $user_panel = str_replace("{NewBtlId}", $IdBtl, $user_panel); 
//    $user_panel = str_replace("{StatusBtl}", $StatusBattle, $user_panel); 
//    $user_panel = str_replace("{IdBatltle1}", $IdBatltle1, $user_panel); 
       
//    $user_panel = str_replace("{Type}", $Type, $user_panel); 
//    $user_panel = str_replace("{Day}", $Day, $user_panel); 
//    $user_panel = str_replace("{Stavka}", $Stavka, $user_panel); 
//    $user_panel = str_replace("{TypeBattle}", $TypeBattle, $user_panel); 
//    $user_panel = str_replace("{Category}", $Category, $user_panel); 
    $user_panel = str_replace("{Title}", $Title, $user_panel); 
//    $user_panel = str_replace("{Text}", $Text, $user_panel); 
    $user_panel = str_replace("{Tags}", $Tags, $user_panel); 
    $user_panel = str_replace("{CreateDate}", $CreateDate, $user_panel); 
    $user_panel = str_replace("{Link1}", $Link1, $user_panel); 
    $user_panel = str_replace("{Link2}", $Link2, $user_panel);
    $user_panel = str_replace("{Chet1}", $Chet1, $user_panel);
    $user_panel = str_replace("{Chet2}", $Chet2, $user_panel);
    $user_panel = str_replace("{NikName}", $NikName, $user_panel);   
    $user_panel = str_replace("{ImgLink1}", $ImgLink1, $user_panel); 
    $user_panel = str_replace("{ImgLink2}", $ImgLink2, $user_panel); 
    $user_panel = str_replace("{LinkAvatar}", $LinkAvatar, $user_panel); 
    
    $user_panel = str_replace("{ButtonPlus1}", $ButtonPlus1, $user_panel);
    $user_panel = str_replace("{ButtonPlus2}", $ButtonPlus2, $user_panel);
                
    //Удаляем незамененные {selected} переменные в конструкциях select 
    $user_panel = preg_replace('/{.*?}/is', '', $user_panel);

    echo $user_panel;
   
    InputIndexListComments($fdb_connect, 0, $IdBtl, 0);
     
 
}

// Вывод списка похожих батлов на титульную страницу
// P1 = 0 - функция вызывается при обновении страницы
// P1 = 1 - функция вызывается через ajax
function InputIndexListBattle($fdb_connect, $P1=0){

    //Определяем поля сортировки
//    switch($OrdBY){
//        case 1:
//            $OrderBY = "`Id`";
//            $NameTabl = "newbattles";
//        break; 
//        default:
//            $OrderBY = "`Id`"; 
//            $NameTabl = "newbattles";
//    }

//    $sql = 'SELECT COUNT(*) AS `count` 
//            FROM `newbattles` 
//            WHERE `IdUser1` ="'.$UserId.'"  GROUP BY `IdUser1`';
//    
//    $row = mysqli_fetch_assoc(mysqli_query ($fdb_connect, $sql)); 
//    $Count = $row['count'];

    
    
    //Нужно брать из шаблона так как тут буут параметры сотировки
    if ($P1 == 0) {
        $TextStart ='<div class="DivOne" id="DivOneBtl">   
                        <h2>'.$GLOBALS['Dict']['Index_ListBtlTitle'].':</h2> 
                        <input type="hidden" name="PageNumber" id="PageNumber" value ="1"> ';

        $TextEnd = '<hr>
                    <input type="button" class="ButtonListNext" value="'.$GLOBALS['Dict']['Index_ListNext'].'" name="NextBtl" id="NextBtl" onClick = "NextBtl()">
                    <div class="LoaderNext" id="LoaderBtl"></div> </div>';   
               

    }
    // Ajax вызов
    if ($P1 == 1) {
        $TextStart ='<h2>'.$GLOBALS['Dict']['Index_ListBtlTitle'].':</h2> 
                    <input type="hidden" name="PageNumber" id="PageNumber" value ="1"> ';

        $TextEnd = '<hr>
                    <input type="button" class="ButtonListNext" value="'.$GLOBALS['Dict']['Index_ListNext'].'" name="NextBtl" id="NextBtl" onClick = "NextBtl()">
                    <div class="LoaderNext" id="LoaderBtl"></div>';   

//        $TextEnd = '<hr>
//            <input type="button" class="ButtonListNext" name="NextBtl" id="NextBtl" onClick = "NextBtl()">';   
        
    }    
    
    
//      <div style="text-align: center"><h2>Ещё...</h2></div>
//      
    //Объединяем две таблицы Батлов и таблицу регистрации
    //Выбираем элементы по убыванию за исключением первого элемента
//    $sql = 'SELECT `newbattles`.*, `reg`.NikName
//            FROM `newbattles` LEFT JOIN `reg` ON `newbattles`.IdUser1 =`reg`.Id
//            WHERE `newbattles`.Status ="1" ORDER BY `Id` DESC LIMIT '.$StartPos.',5';
    
    //Выборка рандомных записей - решение не оптимальное но на малых базад довольно хорошее
    //С ростом базы выборка начнет тормозить. Придется оптимизировать
    $sql = 'SELECT `newbattles`.*, `reg`.NikName
            FROM `newbattles` LEFT JOIN `reg` ON `newbattles`.IdUser1 =`reg`.Id
            WHERE `newbattles`.Status ="1" ORDER BY RAND() LIMIT 5';    
    
    
    $Result = mysqli_query ($fdb_connect, $sql);

    $TextForm ="";
    $TextFormTpl = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/IndexListBattles.tpl');
    
    while ($row = mysqli_fetch_assoc($Result))
    {    
        $BtlId = $row['Id'];
//        $StatusBattle = $row['Status']; 
        $UserId = $row['IdUser1'];
//        $IdBatltle1 = $row['IdBatltle1'];
        $Type = $row['Type'];
//        $Day = $row['Day'];
//        $Stavka = $row['Stavka'];
//        $TypeBattle = $row['TypeBattle'];
//        $Category = $row['Category'];
        $Link1 = $row['Link1'];
        $Link2 = $row['Link2'];
                
        if (empty($row['Title'])) {
            $Title = "";
        } else {
            $Title = $row['Title'];
        }
        
        
//        $Text = $row['Text'];
//        $Tags = $row['Tags'];
        $CreateDate  = $row['Date'];
        $CreateDate = date("d.m.Y H:i", strtotime($CreateDate));
        
        $Chet1  = $row['Chet1'];
        $Chet2  = $row['Chet2'];
        $Chet = $Chet1 + $Chet2;
        $Chet  = number_format($Chet, 0, '', ' '); //Общий счет кликов
               
//        $Avatar = $row['Avatar']; 
        $NikName = $row['NikName'];             

        $user_panel = $TextFormTpl;
                
        $user_panel = str_replace("{BtlId}", $BtlId, $user_panel); 
//        $user_panel = str_replace("{StatusBtl}", $StatusBattle, $user_panel); 
        
//        $user_panel = str_replace("{IdBatltle1}", $IdBatltle1, $user_panel); 
//        $user_panel = str_replace("{Type}", $Type, $user_panel); 
//        $user_panel = str_replace("{Day}", $Day, $user_panel); 
//        $user_panel = str_replace("{Stavka}", $Stavka, $user_panel); 
//        $user_panel = str_replace("{TypeBattle}", $TypeBattle, $user_panel); 
//        $user_panel = str_replace("{Category}", $Category, $user_panel); 
        $user_panel = str_replace("{Title}", $Title, $user_panel); 
//        $user_panel = str_replace("{Text}", $Text, $user_panel); 
//        $user_panel = str_replace("{Tags}", $Tags, $user_panel); 
        $user_panel = str_replace("{CreateDate}", $CreateDate, $user_panel); 
        $user_panel = str_replace("{Link1}", $Link1, $user_panel); 
        $user_panel = str_replace("{Link2}", $Link2, $user_panel);
        
        $user_panel = str_replace("{NikName}", $NikName, $user_panel);
        
        if ($Type == 1) { 
            if (empty($Link1) or $Link1 == "" ) {
                $ImgLink1 = '<img src="../images/lam.png"/>';
            } else {
                $ImgLink1 = '<img src="'.$Link1.'"/>';
            }

            if (empty($Link2) or $Link2 == "") {
                $ImgLink2 = '<img src="../images/lam.png"/>';
            } else {
                $ImgLink2 = '<img src="'.$Link2.'"/>';
            }     
            
        } elseif ($Type == 2) {
                                    
            // https://i.ytimg.com/vi/1oTx6T-XlYM/hqdefault.jpg
            // http://img.youtube.com/vi/wXGPcphm00s/0.jpg        

            if (empty($Link1) or $Link1 == "") {
                $ImgLink1 = '<img src="../images/lam.png"/>';
            } else {
                $ImgLink1 = '<img src="https://i.ytimg.com/vi/'.$Link1.'/hqdefault.jpg"/>';
            }

            if (empty($Link2) or $Link2 == "") {
                $ImgLink2 = '<img src="../images/lam.png"/>';
            } else {
                $ImgLink2 = '<img src="https://i.ytimg.com/vi/'.$Link2.'/hqdefault.jpg"/>';
            }       
                       
        } else {
            $ImgLink1 = '<img src="../images/lam.png"/>';
            $ImgLink2 = '<img src="../images/lam.png"/>';
        }       
                 
        
        $ImgСlock = '<img src="../images/clock.png" title="'.$GLOBALS['Dict']['ListUsr_Publish'].'" />';
        $ImgUser = '<img src="../images/usr.png" title="'.$GLOBALS['Dict']['Index_ListUser'].'" />';
        $ImgChet = '<img src="../images/check-box1.png" title="'.$GLOBALS['Dict']['ListUsr_Votes'].'" />';
       
        $user_panel = str_replace("{ImgLink1}", $ImgLink1, $user_panel); 
        $user_panel = str_replace("{ImgLink2}", $ImgLink2, $user_panel); 
        $user_panel = str_replace("{ImgСlock}", $ImgСlock, $user_panel);
        $user_panel = str_replace("{ImgUser}", $ImgUser, $user_panel);
        $user_panel = str_replace("{ImgChet}", $ImgChet, $user_panel);
        $user_panel = str_replace("{Chet}", $Chet, $user_panel);
//        
//        
//        //Удаляем незамененные {selected} переменные в конструкциях select 
////        $user_panel = preg_replace('/{.*?}/is', '', $user_panel);
//        
        $TextForm = $TextForm.$user_panel;
        
//            $TextForm = $TextForm."_".$BtlId;
    }   
      
    $TextInputForm = $TextStart.$TextForm.$TextEnd;       
    
    echo $TextInputForm; 
}

// Функция вывода строки с еоличеством страниц
// $KolPageWiev - количество страниц для отображения
// $KolPage - всего страниц
// $TekPage - текущая страница
// $Href - страница перехода
function PageBar($KolPageWiev=1, $KolPage=1, $TekPage=1, $Href = "#"){
       
    $KolPageWiev = 7; //Минимально допустимое значение
//    $KolPage = 50;
    
//    $Text = '<div class="DivDual" id="MsgSaveNBT">
//            <input type="hidden" name="SelectPage" id="SelectPage" value ="{SelectPage}">';
    
    $Text = "";
    if ($KolPage >$KolPageWiev){
        
        $KolPageWiev2 = $KolPageWiev-2;
        if ($TekPage<$KolPageWiev2){
            
            for ($x=1; $x<=$KolPageWiev2; $x++) {
                $GetParam = "&Page=".$x;

                if ($x == $TekPage) {
                    $Text = $Text.'<span class="SpanBtLeft"><a href="'.$Href.$GetParam.'" class="ButtonPageSelect">'.$x.'</a></span>';
                }
                else{
                    $Text = $Text.'<span class="SpanBtLeft"><a href="'.$Href.$GetParam.'" class="ButtonPage">'.$x.'</a></span>'; 
                }            
            } 
            $Text = $Text.'<span class="SpanSpace">&nbsp;...&nbsp;</span>';
            $GetParam = "&Page=".$KolPage;
            $Text = $Text.'<span class="SpanBtLeft"><a href="'.$Href.$GetParam.'" class="ButtonPage">'.$KolPage.'</a></span>';
        }
        else {
            $GetParam = "&Page=1";
            $Text = $Text.'<span class="SpanBtLeft"><a href="'.$Href.$GetParam.'" class="ButtonPage">1</a></span>';
            $Text = $Text.'<span class="SpanSpace">&nbsp;...&nbsp;</span>';
            
            $PageLeft = ceil($KolPageWiev/2-3);
            $PageStart = $TekPage - $PageLeft;
            $PageStartMax = $KolPage-($KolPageWiev-5);
            if ($PageStart >= $PageStartMax){
                $PageStart = $PageStartMax;    
            }            
                       
            $PageEnd = $PageStart + ($KolPageWiev-5);
            
            if ($PageEnd >= $KolPage-2){
                $PageEnd = $KolPage;    
            }
                       
            for ($x=$PageStart; $x<=$PageEnd; $x++) {
                $GetParam = "&Page=".$x;

                if ($x == $TekPage) {
                    $Text = $Text.'<span class="SpanBtLeft"><a href="'.$Href.$GetParam.'" class="ButtonPageSelect">'.$x.'</a></span>';
                }
                else{
                    $Text = $Text.'<span class="SpanBtLeft"><a href="'.$Href.$GetParam.'" class="ButtonPage">'.$x.'</a></span>'; 
                }            
            }             
                      
            if ($PageEnd < $KolPage){
                $Text = $Text.'<span class="SpanSpace">&nbsp;...&nbsp;</span>';
                $GetParam = "&Page=".$KolPage;
                $Text = $Text.'<span class="SpanBtLeft"><a href="'.$Href.$GetParam.'" class="ButtonPage">'.$KolPage.'</a></span>';            
            }
        }
        
    }
    else{
        //Если количество страниц умещается в одну строчку 
        for ($x=1; $x<=$KolPage; $x++) {
            
            $GetParam = "&Page=".$x;

            if ($x == $TekPage) {
                $Text = $Text.'<span class="SpanBtLeft"><a href="'.$Href.$GetParam.'" class="ButtonPageSelect">'.$x.'</a></span>';
            }
            else{
                $Text = $Text.'<span class="SpanBtLeft"><a href="'.$Href.$GetParam.'" class="ButtonPage">'.$x.'</a></span>'; 
            }            
        }                    
    }
//    $Text = $Text.'</div>';
    return $Text;
}


// Вывод списка коментариев 
// P1 = 0 - функция вызывается при обновении страницы
// P1 = 1 - функция вызывается через ajax
// IdBtl - номер битвы
function InputIndexListComments($fdb_connect, $P1=0, $IdBtl, $PosComments=0 ){

    $sql = 'SELECT COUNT(*) AS `count` 
            FROM `comments` 
            WHERE `IdBtl` ="'.$IdBtl.'"';
    
    $row = mysqli_fetch_assoc(mysqli_query ($fdb_connect, $sql)); 
    $Count = $row['count'];


    //Вывод аватарки в список коментариев   
    if (isset($_SESSION['UserAvatar'])){
        $AvatarUsr = $_SESSION['UserAvatar']; 
    }
    else{
        $AvatarUsr = 0;
    }
    if (isset($_SESSION['UserId'])){
        $UserId = $_SESSION['UserId']; 
    }
    else {
        $UserId = 0;
    }

    if ($AvatarUsr > 0){
    
        $FileAvatar = './ImgAvatar/S_'.$UserId.'.png';

        if (file_exists($FileAvatar)) {
            $LinkAvatar = '<img class="ImgAvatar" src="'.$FileAvatar.'"/>';
        } else {
            $LinkAvatar = '<img class="ImgAvatar" src="../images/photo.png"/>';
        }
    }               
    else{
        $LinkAvatar = '<img class="ImgAvatar" src="../images/photo.png"/>'; 
    }    
    
    
    
    // Обновление страници
    if ($P1 == 0) {
        $TextStart ='<div class="DivDualOne" >
                        <div class="DivOne" id="DivOneComent">
                            <input type="hidden" name="PosComments" id="PosComments" value ="'.$PosComments.'">
                            <h2>'.$GLOBALS['Dict']['Index_CommentsTitle'].': '.$Count.'</h2>

                            <div class="ILB_StrInCom">
                                '.$LinkAvatar.'                  
                                <textarea class="InputCom"  name="TexеCom" placeholder="'.$GLOBALS['Dict']['Index_Comments'].'" id="TexеCom"></textarea>   
                                <input type="button" class="BtnSend" value="Send" name="SendComm" id="SendComm" onClick = "SendComm()">             
                            </div>';

        If ($Count > ((1+$PosComments)*10)){
            $TextEnd = '<hr id="hrComm">
                        <input type="button" class="ButtonListNext" value="'.$GLOBALS['Dict']['Index_ListNext'].'" name="NextComment" id="NextComment" onClick = "NextComment()"> 
                        <div class="LoaderNext" id="LoaderComment"></div> </div>';  
        }
        else {
            $TextEnd = '</div>'; 
        }
        
 

    }
    // Ajax вызов <input type="button" class="BtnSend" name="SendComm" id="SendComm" onClick = "SendComm()" /> 
    if ($P1 == 1) {
        $TextStart ='<input type="hidden" name="PosComments" id="PosComments" value ="'.$PosComments.'">
                    <h2>'.$GLOBALS['Dict']['Index_CommentsTitle'].': '.$Count.'</h2>
                    <div class="ILB_StrInCom">
                        '.$LinkAvatar.'                  
                        <textarea class="InputCom"  name="TexеCom" placeholder="'.$GLOBALS['Dict']['Index_Comments'].'" id="TexеCom"></textarea>    
                        <input type="button" class="BtnSend" value="Send" name="SendComm" id="SendComm" onClick = "SendComm()"> 

                    </div>';

        If ($Count > ((1+$PosComments)*10)){
            $TextEnd = '<hr id="hrComm">
                        <input type="button" class="ButtonListNext" value="Ещё" name="NextComment" id="NextComment" onClick = "NextComment()"> 
                        <div class="LoaderNext" id="LoaderComment"></div> </div>';  
        }
        else {
            $TextEnd = ''; 
        }        
                        
    }    

    $TekPosComments = $PosComments*10;    
//    $sql = 'SELECT `comments`.*, `reg`.Avatar, `reg`.NikName
//            FROM `comments` LEFT JOIN `reg` ON `comments`.IdUser =`reg`.Id                             
//            WHERE `comments`.IdBtl="'.$IdBtl.'" ORDER BY `comments`.Id DESC LIMIT '.$TekPosComments.',10';    
    
    $sql = 'SELECT *
            FROM `comments`                             
            WHERE `IdBtl`="'.$IdBtl.'" ORDER BY `Id` DESC LIMIT '.$TekPosComments.',10'; 
    
    

    $Result = mysqli_query ($fdb_connect, $sql);

    $TextForm ="";
    
    if ($Result){
        
        while ($row = mysqli_fetch_assoc($Result))
        {   

            $Id = $row['Id'];
            $Date = $row['Date'];
            $CreateDate = date("d.m.Y H:i", strtotime($Date));
            $Text = $row['Text'];
            $UserId = $row['IdUser'];
            $NikName = $row['NikName'];
            
            if ($NikName == ""){
                $NikName = "No name";
            }
            
            if ($UserId > 0){

                $FileAvatar = './ImgAvatar/S_'.$UserId.'.png';

                if (file_exists($FileAvatar)) {
                    $LinkAvatar = '<img class="ImgAvatar" src="'.$FileAvatar.'"/>';
                } else {
                    $LinkAvatar = '<img class="ImgAvatar" src="../images/photo.png"/>';
                }
            }               
            else{
                $LinkAvatar = '<img class="ImgAvatar" src="../images/photo.png"/>'; 
            }

            $user_panel = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/IndexListCommrnts.tpl');

            $user_panel = str_replace("{NikName}", $NikName, $user_panel); 
            $user_panel = str_replace("{Text}", $Text, $user_panel); 

            $user_panel = str_replace("{CreateDate}", $CreateDate, $user_panel); 
            $user_panel = str_replace("{LinkAvatar}", $LinkAvatar, $user_panel); 


            //Удаляем незамененные {selected} переменные в конструкциях select 
    //        $user_panel = preg_replace('/{.*?}/is', '', $user_panel);

            $TextForm = $TextForm.$user_panel;

        }   
    }  
    $TextForm = $TextStart.$TextForm.$TextEnd;       
    
    echo $TextForm; 
}


// Добваление списка коментариев 
// P1 = 0 - функция вызывается при обновении страницы
// P1 = 1 - функция вызывается через ajax
// IdBtl - номер битвы
function AddIndexListComments($fdb_connect, $P1=0, $IdBtl, $PosComments=0 ){

    $sql = 'SELECT COUNT(*) AS `count` 
            FROM `comments` 
            WHERE `IdBtl` ="'.$IdBtl.'"';
    
    $row = mysqli_fetch_assoc(mysqli_query ($fdb_connect, $sql)); 
    $Count = $row['count'];


    //Вывод аватарки в список коментариев   
    if (isset($_SESSION['UserAvatar'])){
        $AvatarUsr = $_SESSION['UserAvatar']; 
    }
    else{
        $AvatarUsr = 0;
    }
    if (isset($_SESSION['UserId'])){
        $UserId = $_SESSION['UserId']; 
    }
    else {
        $UserId = 0;
    }

    if ($AvatarUsr > 0){
    
        $FileAvatar = './ImgAvatar/S_'.$UserId.'.png';

        if (file_exists($FileAvatar)) {
            $LinkAvatar = '<img class="ImgAvatar" src="'.$FileAvatar.'"/>';
        } else {
            $LinkAvatar = '<img class="ImgAvatar" src="../images/photo.png"/>';
        }
    }               
    else{
        $LinkAvatar = '<img class="ImgAvatar" src="../images/photo.png"/>'; 
    }    
    

    // Ajax вызов <input type="button" class="BtnSend" name="SendComm" id="SendComm" onClick = "SendComm()" /> 
    if ($P1 == 1) {
        $TextStart ='';
        $TextEnd = '';

        
      
        
//        If ($Count > ((1+$PosComments)*10)){
//            $TextEnd = '';  
//        }
//        else {
//            $TextEnd = ''; 
//        }        
                        
    }    

    $TekPosComments = $PosComments*10;
    $sql = 'SELECT `comments`.*, `reg`.Avatar, `reg`.NikName
            FROM `comments` LEFT JOIN `reg` ON `comments`.IdUser =`reg`.Id                             
            WHERE `comments`.IdBtl="'.$IdBtl.'" ORDER BY `comments`.Id DESC LIMIT '.$TekPosComments.',10';    
    

    $Result = mysqli_query ($fdb_connect, $sql);

    $TextForm ="";
    
    if ($Result){
        
        while ($row = mysqli_fetch_assoc($Result))
        {   

            $Id = $row['Id'];
            $Date = $row['Date'];
            $CreateDate = date("d.m.Y H:i", strtotime($Date));
            $Text = $row['Text'];
            $UserId = $row['IdUser'];

            if ($UserId == 0){
                $NikName = "No name";
            }
            else{
                $NikName = $row['NikName'];
            };
            $Avatar = $row['Avatar'];

            if ($Avatar > 0){

                $FileAvatar = './ImgAvatar/S_'.$UserId.'.png';

                if (file_exists($FileAvatar)) {
                    $LinkAvatar = '<img class="ImgAvatar" src="'.$FileAvatar.'"/>';
                } else {
                    $LinkAvatar = '<img class="ImgAvatar" src="../images/photo.png"/>';
                }
            }               
            else{
                $LinkAvatar = '<img class="ImgAvatar" src="../images/photo.png"/>'; 
            }

            $user_panel = file_get_contents('./Lang/'.$_SESSION['Lang'].'/TPL/IndexListCommrnts.tpl');

            $user_panel = str_replace("{NikName}", $NikName, $user_panel); 
            $user_panel = str_replace("{Text}", $Text, $user_panel); 

            $user_panel = str_replace("{CreateDate}", $CreateDate, $user_panel); 
            $user_panel = str_replace("{LinkAvatar}", $LinkAvatar, $user_panel); 


            //Удаляем незамененные {selected} переменные в конструкциях select 
    //        $user_panel = preg_replace('/{.*?}/is', '', $user_panel);

            $TextForm = $TextForm.$user_panel;

        }   
    }  
   
    echo $TextForm; 
}

?>



