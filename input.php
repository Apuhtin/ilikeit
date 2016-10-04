<?php

 //Если нажата кнопка то обрабатываем данные
 if(isset($_POST['submit']))
 {

        $ErrFun = 0;
	if(empty($_POST['email'])){
            echo $GLOBALS['Dict']['Input_ErrEmail'];
            exit();
        }
        else{
            if(!preg_match("/^[a-z0-9_.-]+@([a-z0-9_.-]+\.)+[a-z]{2,6}$/i", $_POST['email'])){
                
                
            echo $GLOBALS['Dict']['Reg_InvalidEmail'];
            exit();                
                
//                echo $GLOBALS ['Dict']['Reg_InvalidEmail'];
//                exit;
            }
        }        

	if(empty($_POST['pass'])){
            echo $GLOBALS['Dict']['Profile_ErrPass1'];
            exit();
        }
		
        $email = FormChar($_POST['email']);
        $pass = FormChar($_POST['pass']);
        
        //Проверяем наличие ошибок 
	if($ErrFun == 0){
            /*Проверяем существует ли у нас такой пользователь в БД*/

            $sql = "SELECT * 
            FROM `reg`
            WHERE `Login` = '$email'";
  
            $row = mysqli_fetch_assoc(mysqli_query ($db_connect, $sql));       

            //Проверка Логина, Проверка Проля, Проверка статуса
            if($row['Login']) {
                If ($row['Activate'] == 1){               
                    if(md5(md5($pass).$row['Salt']) == $row['Password'])
                        {
                            $_SESSION['Email'] = $row['Login'];
                            $_SESSION['Login'] = $row['NikName'];
                            $_SESSION['user_in'] = 1;                            
                            $_SESSION['UserId'] = $row['Id'];
                            $_SESSION['UserAvatar'] = $row['Avatar'];
                            
                            if (!empty($_POST['remember']) and $_POST['remember'] = "on"){
                                
                                setcookie('input1',$email, time()+3600*24*30);
                                setcookie('input2', base64_encode($pass), time()+3600*24*30);
                            }
                            else{
                                setcookie ("input1", "", time() - 3600);
                                setcookie ("input2", "", time() - 3600);
                            }
                            //Один раз заходим в кабинет и остаемся в нем навсегда пока пользователь принудительно не выйдет                            
                            echo '200';
                            exit(); 
                        }
                        else {
                            echo $GLOBALS['Dict']['Input_Err'];  
                            exit();
                        }
                    }   
                else {
                    echo $GLOBALS['Dict']['Input_ErrActivate'];
                    exit();
                }
            }
            else {
                echo $GLOBALS['Dict']['Input_Err'];
                exit();
            }
        }    
}
 
?>