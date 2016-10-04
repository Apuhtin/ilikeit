<?php
 /**
 * Функции работы с БД батлов
 */

 // Созданть новый батл
function AddNewBattle($fdb_connect, $Id, $StatusBattle, $UserId, $Title, $Text, $Tags, $Day, $Stavka, $Link1, $Link2, $Type, $Category, $TypeBattle, $uniq){
    
    $sql = 'INSERT INTO `newbattles` (`Id`, `Status`, `IdUser1`, `IdBatltle1`, `Type`, `Day`, `Stavka`, `TypeBattle`, `Category`, `Link1`,
                                      `Link2`, `Title`, `Text`, `Tags`, `Date`, `Uniq`)
                  VALUES(
                          "",
                          "'. $StatusBattle.'",
                          "'. $UserId.'",
                          "0",    
                          "'. $Type .'",
                          "'. $Day .'",
                          "'. $Stavka .'",
                          "'. $TypeBattle .'",
                          "'. $Category .'",
                          "'. $Link1 .'",
                          "'. $Link2 .'",
                          "'. $Title .'",
                          "'. $Text .'",
                          "'. $Tags .'",
                          now(),
                          "'. $uniq .'"
                          )';
    mysqli_query($fdb_connect, $sql);   

}

// Соханить возможного соучатника
function AddAcceptNewBattle($fdb_connect, $IdBatltle1, $StatusBattle, $UserId, $Title, $Text, $Tags, $Day, $Stavka, $Link1, $Link2, $Type, $Category, $TypeBattle){
    
    $sql = 'INSERT INTO `newbattles` (`Id`, `Status`, `IdUser1`, `IdBatltle1`, `Type`, `Day`, `Stavka`, `TypeBattle`, `Category`, `Link1`,
                                      `Link2`, `Title`, `Text`, `Tags`, `Date`   )
                  VALUES(
                          "",
                          "'. $StatusBattle.'",
                          "'. $UserId.'",
                          "'. $IdBatltle1.'",    
                          "'. $Type .'",
                          "'. $Day .'",
                          "'. $Stavka .'",
                          "'. $TypeBattle .'",
                          "'. $Category .'",
                          "'. $Link1 .'",
                          "'. $Link2 .'",    
                          "'. $Title .'",
                          "'. $Text .'",
                          "'. $Tags .'",
                          now()
                          )';
    mysqli_query($fdb_connect, $sql);   
    
}


// Внесение изменений в БД
function EditNewBattle($fdb_connect, $Id, $StatusBattle, $UserId, $Title, $Text, $Tags, $Day, $Stavka, $Link1, $Link2, $Type, $Category, $TypeBattle){
    
    $sql = 'UPDATE `newbattles`
            SET `Status` = "'.$StatusBattle.'", 
                `IdUser1` = "'.$UserId.'", 
                `Type` = "'.$Type.'",    
                `Day` = "'.$Day.'",
                `Stavka` = "'.$Stavka.'",
                `TypeBattle` = "'.$TypeBattle.'",
                `Category` = "'.$Category.'",    
                `Link1` = "'.$Link1.'",
                `Link2` = "'.$Link2.'",
                `Title` = "'.$Title.'",  
                `Text` = "'.$Text.'",                    
                `Tags` = "'.$Tags.'"                                                                                                      
            WHERE `Id` = "'. $Id .'"';    
    
    mysqli_query($fdb_connect, $sql);

}

// Внесение изменений в БД
function UpdateLink($fdb_connect, $Id, $Link1, $Link2){
       
    $sql = 'UPDATE `newbattles`
            SET `Link1` = "'.$Link1.'",
                `Link2` = "'.$Link2.'"                                                                                                   
            WHERE `Id` = "'. $Id .'"';    
    
    $Result = mysqli_query($fdb_connect, $sql);

}


// Внесение изменений в БД
function EditAcceptNewBattle($fdb_connect, $Id, $StatusBattle, $UserId, $Text, $Tags, $Stavka, $Link1){
    
    $sql = 'UPDATE `newbattles`
            SET `Status` = "'.$StatusBattle.'", 
                `IdUser1` = "'.$UserId.'",                    
                `Stavka` = "'.$Stavka.'", 
                `Link1` = "'.$Link1.'",
                `Text` = "'.$Text.'",                    
                `Tags` = "'.$Tags.'"                                                                                                      
            WHERE `Id` = "'. $Id .'"';    
    
    mysqli_query($fdb_connect, $sql);

}

// Удалить батл - вместо удаления меняем статус батла на 9
function DelStringNewBattle($fdb_connect, $Id){
  
//    $sql = 'DELETE `newbattles` 
//            FROM `newbattles` 
//            WHERE `newbattles`.`Id`=  "'.$Id.'"';
       
    $sql = 'UPDATE `newbattles`
        SET `Status` = 9                                                                                                
        WHERE `Id` = "'. $Id .'"';   
    
    $Result = mysqli_query($fdb_connect, $sql);

}
// Считываем батл из базы
function ReadNewBattle($fdb_connect, $Id){
    
    $sql = 'SELECT * 
    FROM `newbattles`
    WHERE `Id`="'.$Id.'"';    

    $row = mysqli_fetch_assoc(mysqli_query ($fdb_connect, $sql));

    $StatusBattle= $row['Status'];
    $UserId= $row['IdUser1'];
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
    $Date = $row['Date'];      

    //html код 
    $text ='<div><tr class = "even">
                <td>'.$Id.'</td>
                <td>'.$StatusBattle.'</td>    
                <td>'.$UserId.'</td>
                <td>'.$Type.'</td>
                <td>'.$Day.'</td>
                <td>'.$Stavka.'</td>
                <td>'.$TypeBattle.'</td>
                <td>'.$Category.'</td>
                <td>'.$Link1.'</td>
                <td>'.$Title.'</td>
                <td>'.$Text.'</td>
                <td>'.$Tags.'</td>                    
                <td>'.$Date.'</td>  
            </tr>
            </div>';

    echo $text;
        
}
// Считываем список опубликованных батлов 
function ReadListNewBattle($fdb_connect, $Status, $OrdBY){

    //Определяем поля сортировки
    switch($OrdBY){
        case 1:
            $OrderBY = "`Id`";
            $NameTabl = "newbattles";
        break; 
        default:
            $OrderBY = "`Id`"; 
            $NameTabl = "newbattles";
    }
    
    //Объединяем три таблицы Новых батлов и таблицу регистрации, таблицы категории батлов
    $sql = 'SELECT `newbattles`.*, `reg`.Avatar, `reg`.NikName, `categories`.Name
            FROM `newbattles` LEFT JOIN `reg` ON `newbattles`.IdUser1 =`reg`.Id
                              LEFT JOIN `categories` ON `newbattles`.Category =`categories`.Id   
            WHERE `newbattles`.Status="'.$Status.'" ORDER BY `'.$NameTabl.'`.'.$OrderBY.' DESC LIMIT 10';
      
    $Result = mysqli_query ($fdb_connect, $sql);

    //AD Для многоязычности то что ниже нужно вынести из этой функции.
    while ($row = mysqli_fetch_assoc($Result))
    {    
        $Id = $row['Id']; 
        $StatusBattle = $row['Status'];
        $UserId = $row['IdUser1'];
        $Type = $row['Type'];
        $Day = $row['Day'];
        $Stavka = $row['Stavka'];
        $TypeBattle = $row['TypeBattle'];
        $Category = $row['Category'];
        $Link1 = $row['Link1'];
        $Link1 = $row['Link2'];
        $Title = $row['Title'];
        $Text = $row['Text'];
        $Tags = $row['Tags'];
        $Date = $row['Date'];  
        
        $NikName = $row['NikName'];
        $Avatar = $row['Avatar'];

        $NameCat = $row['Name'];
        
        $text = '<form action="?mode=acceptf" method="POST">
            
                <input type="hidden" name="Id" value="'.$Id.'">
                <input type="hidden" name="UserId" value="'.$UserId.'">
                <input type="hidden" name="Type" value="'.$Type.'">
                <input type="hidden" name="Day" value="'.$Day.'">
                <input type="hidden" name="Stavka" value="'.$Stavka.'">
                <input type="hidden" name="TypeBattle" value="'.$TypeBattle.'">
                <input type="hidden" name="Category" value="'.$Category.'">
                <input type="hidden" name="NameCat" value="'.$NameCat.'">  
                <input type="hidden" name="Link1" value="'.$Link1.'"> 
                <input type="hidden" name="Title" value="'.$Title.'"> 
                <input type="hidden" name="Text" value="'.$Text.'"> 
                <input type="hidden" name="Tags" value="'.$Tags.'"> 
                <input type="hidden" name="Date" value="'.$Date.'"> 
                <input type="hidden" name="NikName" value="'.$NikName.'"> 
                <input type="hidden" name="Avatar" value="'.$Avatar.'"> 

                    <div class="NLB_Str">
            
                        <div class="NLB_User">
                            <span> Id='.$Id.'</span>
                            <span>'.$Link1.'</span>
                        </div>
                        
                        <input  type="submit" class="NLB_User2" value="Принять вызов" name="AcceptBattle">
                            
                        <div class="NLB_Title">
                            <div class="NLB_TitleStr">
                                '.$Title.'
                            </div>
                            <div class="NLB_TitleStr">
                                <span>Категория: '.$Category.'</span>
                                <span>Категория: '.$NameCat.'</span>
                            </div>
                            <div class="NLB_TitleStr">
                                <span>Срок: '.$Day.'</span>
                                <span>Ставка: '.$Stavka.'</span>
                            </div>
                            <div class="NLB_TitleStr">
                                <span>Логин: '.$NikName.'</span>
                                <span>Логин: '.$Avatar.'</span>
                            </div>
                        </div>             
                    </div>
                </form>';  
     echo $text;
    }   
}

function ReadIdNewBattle ($fdb_connect, $UserId, $Uniq){
    //Считываем присвоенный номер
    $sql = 'SELECT `Id`  
            FROM `newbattles`
            WHERE `IdUser1` ="'.$UserId.'" AND `Uniq`="'.$Uniq.'" ORDER BY `Date` DESC LIMIT 1';   

    $result = mysqli_query ($fdb_connect, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['Id'];
        
    }
    else {
        echo "Ошибка получения IdBtl";
        exit;
    }
                   
}

// Внесение изменений в БД - изменение статуса аватрки
function UpdateAvatar($fdb_connect, $UserId, $Status){
    
    $sql = 'UPDATE `reg`
            SET `Avatar` = "'.$Status.'"                                                                                                     
            WHERE `Id` = "'. $UserId .'"';    
    
    mysqli_query($fdb_connect, $sql);

} 

function CreateTablComtnts($Id) {
    
    if ($Id > 0) {
 
        $NameTabl = "Comm_".$Id;

        
//        $sql = "CREATE TABLE `batl`.`$NameTabl` (
//                `Id` INT(11) NOT NULL AUTO_INCREMENT ,
//                `IdUser` INT(11) NOT NULL DEFAULT '0',
//                `Date` DATETIME NOT NULL ,
//                `Text` VARCHAR(500) NOT NULL ,
//                PRIMARY KEY (`Id`)";
//       
//        mysqli_query($fdb_connect, $sql);  
        
        
        
//CREATE TABLE IF NOT EXISTS `comm` (
//  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
//  `name` varchar(30) NOT NULL,
//  `comment` varchar(255) NOT NULL,
//  PRIMARY KEY (`id`)
//) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;
        
        
    }
        
}




// Пример запроса по множеству данных
//SELECT `name` FROM `user` WHERE `id` IN (1,2,3,4,5);

//SELECT * FROM table LIMIT 5,10; # возвращает строки 6-15  5- номер строки, 10 количество строк

//Поиск - тут нужно разбираться с индексами
//SELECT * 
//FROM `product` 
//WHERE 
//  MATCH(`meta_desc`, `meta_keywords`) 
//  AGAINST('*ful**nam*' IN BOOLEAN MODE)

//Поиск
//SELECT * 
//FROM  `aticle` 
//WHERE `content` LIKE “%новость%” 
//   OR `title` LIKE “%новость%”

?>


