<?php


if(isset($_POST['NextBtl'])){
    //0 - функция вызывается при обновении страницы
    //1 - функция вызывается через ajax
    InputIndexListBattle($db_connect, 1);
    
}


if(isset($_POST['SendComm'])){

        
    if (isset($_POST['BtlId'])){
        $BtlId = FormChar($_POST['BtlId']);
    } 
    else{
        $BtlId = 0;
    }     
 
    if (isset($_SESSION['UserId'])){
        $IdUser = FormChar($_SESSION['UserId']);
    } 
    else{
        $IdUser = 0;
    }     
    
    if (isset($_POST['TexеCom'])){
        $Text = FormChar($_POST['TexеCom']);
    } 
    else{
        $Text = "";
    }
 
//    if (isset($_POST['PosComments'])){
//        $PosComments = FormChar($_POST['PosComments']);
//    } 
//    else{
//        $PosComments = 0;
//    }     
        
    if ($Text <> "") {
    
        $NikName = "";
        
        if (isset($_SESSION['Login'])){
            $NikName = $_SESSION['Login'];
        }
//        else {
//            $NikName = "No name";
//        }
        
        
        $sql = 'INSERT INTO `comments` (`Id`, `IdBtl`, `IdUser`, `Date`, `Text`, `NikName`)
                VALUES(
                        "",
                        "'. $BtlId.'",
                        "'. $IdUser.'",
                        now(),    
                        "'. $Text .'",
                        "'. $NikName .'"                                
                        )';

        mysqli_query($db_connect, $sql);
    }
 
    InputIndexListComments($db_connect, 1, $BtlId, 0);
    
   
    
}


if(isset($_POST['NextComment'])){
    
    if (isset($_POST['BtlId'])){
        $BtlId = FormChar($_POST['BtlId']);
    } 
    else{
        $BtlId = 0;
    }  
    
    if (isset($_POST['PosComments'])){
        $PosComments = FormChar($_POST['PosComments']);
    } 
    else{
        $PosComments = 0;
    }     
    
    
    //0 - функция вызывается при обновении страницы
    //1 - функция вызывается через ajax
    AddIndexListComments($db_connect, 1, $BtlId, $PosComments);
    
}

if(isset($_POST['ButtonPlus'])){
    
    
    
    if (isset($_POST['BtlId'])){
        $BtlId = FormChar($_POST['BtlId']);
    } 
    else{
        $BtlId = 0;
        echo '0'; // 'Неопределен номер битвы';
        exit();
    }   
    
    if ($_POST['ButtonPlus'] == 1){
        $Chet = "Chet1";
        $Value = 1;
    }
    
    if ($_POST['ButtonPlus'] == 2){
        $Chet = "Chet2";
        $Value = 2;
    } 
 
    if (isset($_POST['ChetBtl'])){
        $ChetBtl = $_POST['ChetBtl'];
        $ChetBtl = str_replace(" ", "", $ChetBtl);  
    }  
    else{
        $ChetBtl = 0;
    }

       
    if (isset($_SESSION['UserId'])){
        $UserId = $_SESSION['UserId'];
    }
    else{
        $UserId = 0;
    }
   
    $NameBtl = $UserId."_".$BtlId;
    
    if(isset($_COOKIE[$NameBtl])) {
        $Text = '<div class="DivPlus"></div>
                <div class="DivChet" id="Chet1">'.$ChetBtl.'</div> ';                 
        echo $Text; //'Вы уже голосовали'; 
        exit();
    }
    else {
        setcookie($NameBtl, $Value, time()+(3600*24)); //Время хранения 1 дней   
    }
    
    $sql = 'UPDATE `newbattles`
            SET `'.$Chet.'` = `'.$Chet.'` + 1                                                                                                       
            WHERE `Id` = "'. $BtlId .'"';    
    
    $result = mysqli_query($db_connect, $sql);    
    
    $ChetBtl = $ChetBtl+1;
    $ChetBtl  = number_format($ChetBtl, 0, '', ' ');
    
    $Text = '<div class="DivPlus"></div>
            <div class="DivChet" id="Chet1">'.$ChetBtl.'</div> ';                       
             

    echo $Text;
}


//mysql_query("CREATE TABLE IF NOT EXISTS votes_$cid (
//vid int(10) NOT NULL auto_increment,
//id int(10) NOT NULL,
//pluss int(10) NOT NULL,
//ip_addr char(50) NOT NULL,
//nick varchar(255) NOT NULL,
//dat_lim date NOT NULL,
//cid int(10) NOT NULL,
//PRIMARY KEY(vid)
//) ENGINE=MyISAM DEFAULT CHARSET=utf8") Or die(mysql_error());
//





?>