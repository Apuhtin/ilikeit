 <?php Head("Like.com | Восстановление пароля")?>

<body>
    <?php Menu(5)?>       
      
    <article> 
        <div class="DivDual">
            <?php MessageShow()?>  
        
        <form action="?mode=recovery2" method="POST" id="login_in">
            <h1>Восстановление пароля</h1>
            
            <div class="DivHr">
                <hr>
            </div>   
            
                <input id="username" type="email" placeholder="E-mail" <?php if(isset($_SESSION['Login'])) {
                                                                        echo 'value ="'.$_SESSION['Login'].'"';} 
                                                                       ?>  required name="email">   
                <input id="password" type="password" placeholder="Новый пароль" autofocus required name="pass">
                <input id="password" type="password" placeholder="Подтверждение пароля" required name="pass2"> 

                <input type="submit" id="submit" value="ИЗМЕНИТЬ" name="submit">
                      
        </form>
        
        </div>
    </article>
    <?php Footer()?> 
    </body>
</html>


