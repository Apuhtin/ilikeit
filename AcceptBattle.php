<?php
 /**
 * Обработчик формы создания и редактирования батлов
 */



 /*Если нажата кнопка на запись, начинаем проверку*/
if(isset($_POST['Save']) Or isset($_POST['PreView']))
{
    if (isset($_POST['IdBatltle1'])){
        $IdBatltle1 = FormChar($_POST['IdBatltle1']);
    } 
    else{
        $IdBatltle1 = 0;
    } 
    
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
        $Day = 1;
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
    if (isset($_POST['Type'])){
        $Type = FormChar($_POST['Type']); 
    } 
    else{
        $Type = 1; //1-Фото, 2-Видео
    }      
    if (isset($_POST['Category'])){
        $Category = FormChar($_POST['Category']); 
    } 
    else{
        $Category = 1; //1-Все категории
    }      
    if (isset($_POST['TypeBattle'])){
        $TypeBattle = FormChar($_POST['TypeBattle']); 
    } 
    else{
        $TypeBattle = 1; //1-Звезды, 2-Деньги
    }      
    if (isset($_SESSION['UserId'])){
        $UserID = $_SESSION['UserId'];
    } 
    else{
        $UserID = 0;
    }
    
    //Текущий статус Батла 0-на редактировании, 1-опубликован и ждет партнера, 3-пирнят и на редактировании 
    $StatusBattle = 3;  

    if($Id>0){
        /*Проверяем существует ли у нас такой батл*/
        $sql = 'SELECT `Id` 
        FROM `newbattles`
        WHERE `Id` = "'.$Id.'"';

        $row = mysqli_fetch_assoc(mysqli_query ($db_connect, $sql));       

        if($row['Id']){
            //Если такой батл уже есть тогда его редактируем
            EditAcceptNewBattle($db_connect, $Id, $StatusBattle, $UserId, $Text, $Tags, $Stavka, $Link1);

            //Если нажата Кнопка предварительного просмотра
            if(isset($_POST['PreView']))
            {
                $_SESSION['Id_NB'] = $Id;
                include_once ('./PreView_f2.php'); 
            }
            else{
                $message = "Параметры сохранены";
                MessageSend(1, $message);
            }
        }      
        else{
            //Если батла нет то создаем новый
            AddAcceptNewBattle($db_connect, $IdBatltle1, $StatusBattle, $UserID, $Title, $Text, $Tags, $Day, $Stavka, $Link1, $Type, $Category, $TypeBattle);
            //Если нажата Кнопка предварительного просмотра
            if(isset($_POST['PreView']))
            {
//                $_SESSION['Id_NB'] = ReadIdNewBattle($db_connect, $UserID);
                include_once ('./PreView_f2.php');
            }
            else{
                $message = "Батл сохранен";
                MessageSend(1, $message);
            }
        }
    }
    else {
        //Если батла нет то создаем новый
        AddAcceptNewBattle($db_connect, $IdBatltle1, $StatusBattle, $UserID, $Title, $Text, $Tags, $Day, $Stavka, $Link1, $Type, $Category, $TypeBattle);
        //Если нажата Кнопка предварительного просмотра
        if(isset($_POST['PreView']))
        {
//            $_SESSION['Id_NB'] = ReadIdNewBattle($db_connect, $UserID);
            include_once ('./PreView_f2.php');
        }
        else{
            $message = "Батл сохранен";
            MessageSend(1, $message);
        }
    }        
}
  
/*Если нажата кнопка удалить, удаляем Батл из базы*/
if(isset($_POST['Delete'])){
    if (isset($_POST['Id'])){
        $Id = FormChar($_POST['Id']);
        if($Id>0){
            DelStringNewBattle($db_connect, $Id);
        } 
    } 
}
 
/*Если нажата кнопка опубликовать*/
if(isset($_POST['CreateBattle'])){

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
        $Day = 1;
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
    if (isset($_POST['Type'])){
        $Type = FormChar($_POST['Type']); 
    } 
    else{
        $Type = 1; //1-Фото, 2-Видео
    }    
    if (isset($_POST['Type'])){
        $Type = FormChar($_POST['Type']); 
    } 
    else{
        $Type = 1; //1-Фото, 2-Видео
    }     
    if (isset($_POST['Category'])){
        $Category = FormChar($_POST['Category']); 
    } 
    else{
        $Category = 1; //1-Все категории
    }      
    if (isset($_POST['TypeBattle'])){
        $TypeBattle = FormChar($_POST['TypeBattle']); 
    } 
    else{
        $TypeBattle = 1; //1-Звезды, 2-Деньги
    }      
    if (isset($_SESSION['UserId'])){
        $UserID = $_SESSION['UserId'];
    } 
    else{
        $UserID = 0;
    }
    
    $StatusBattle = 1; 

    $ErrFun = 0;
    
    //Проверяем пришедшие данные  эта проверка нужна при публикации батла  
    if(empty($Title)){
        MessageSend(1, 'Поле $Title не может быть пустым!');
        $ErrFun = 1;
    }
    if(empty($Text)){
        MessageSend(1, 'Поле $Text не может быть пустым!');
        $ErrFun = 1;
    }
    if(empty($Tags)){
        MessageSend(1, 'Поле $Tags не может быть пустым!');
        $ErrFun = 1;
    } 
    if(empty($Day)){
        MessageSend(1, 'Поле $Day не может быть пустым!');
        $ErrFun = 1;
    }
//    if(empty($Stavka)){
//        MessageSend(1, 'Поле $Stavka не может быть пустым!');
//        $ErrFun = 1;
//    }      
    if(empty($Link1)){
        MessageSend(1, 'Поле $Link1 не может быть пустым!');
        $ErrFun = 1;
    }  

    //Проверяем наличие ошибок и выводим пользователю
    if($ErrFun == 0)
    {       
        if(!empty($Id)){
            /*Проверяем существует ли у нас такой батл*/
            $sql = 'SELECT `Id` 
            FROM `newbattles`
            WHERE `Id` = "'.$Id.'"';

            $row = mysqli_fetch_assoc(mysqli_query ($db_connect, $sql));       

            if($row['Id']){
                //Если такой батл уже есть тогда его редактируем. И меняем статус батла.
                EditNewBattle($db_connect, $Id, $StatusBattle, $UserID, $Title, $Text, $Tags, $Day, $Stavka, $Link1, $Type, $Category, $TypeBattle);
                $message = "Батл опубликован";
                MessageSend(1, $message); 
                
            }      
            else{
                //Если батла нет то создаем новый со статусом опубликован
                AddNewBattle($db_connect, $Id, $StatusBattle, $UserID, $Title, $Text, $Tags, $Day, $Stavka, $Link1, $Type, $Category, $TypeBattle);
                $message = "Батл опубликован";
                MessageSend(1, $message);
            }
        }
        else {
            //Если батла нет то создаем новый со статусом опубликован
            AddNewBattle($db_connect, $Id, $StatusBattle, $UserID, $Title, $Text, $Tags, $Day, $Stavka, $Link1, $Type, $Category, $TypeBattle);
            $message = "Батл опубликован";
            MessageSend(1, $message); 
        }        
    }
    
}
 
//?>