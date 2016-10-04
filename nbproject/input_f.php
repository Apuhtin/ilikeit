 <?php Head("Like | Вход")?>

<body> 

<?php Menu(5)?>       

    <article> 
        
        <div class="FormGroup">
            <form action="?mode=input" method="POST" >
            <h1>Вход</h1>
            <div class="FormElements">
                <div class="ColLabel">
                    E-mail								
                </div>
                <div class="ColInput">
                    <input type="email" maxlength="100" placeholder="E-mail" 
                           accept="                                         "<?php if(isset($_SESSION['Login'])) {
                                                                            echo 'value ="'.$_SESSION['Login'].'"';} 

                                                                            if(isset($_COOKIE["input1"])){
                                                                            echo 'value="'. $_COOKIE["input1"].'"';}

                                                                           ?> autofocus required name="email">                                                           
                </div>    
                
            </div>     
            <div class="FormElements">
                <div class="ColLabel">
                    Пароль								
                </div>
                <div class="ColInput"> 
                    <input type="password" maxlength="30" placeholder="Пароль" <?php if(isset($_COOKIE["input2"])){
                                                                            echo 'value="'. base64_decode($_COOKIE["input2"]).'"';}
                                                                            ?> required name="pass"></br>                    
                </div>                
            </div> 
         
            
            
            <div class="FormElements">
                <input type="submit" class="ButtonProfile" value="Войти" name="submit">
                <div class="MsgL"><?php MessageShow()?></div>
                
            </div>

            <div class="FormElements">
                
                    
                    <input type="checkbox" id="cboxInput" <?php if(isset($_COOKIE["input1"]) and isset($_COOKIE["input2"])){
                                                echo 'checked';
                                                }
                                                ?> name="remember"/> Запомнить  
             
                <!--<span class="LabeRight"><a href="?mode=regf">Регистрация</a></span>-->
                <span class="LabeRight"><a href="?mode=recoveryf">Забыли пароль</a></span>
            </div>   
            </form>
        </div>
        
<!--        
            <div class="FormElements">
                
            </div>
                  
            <div class="FormElements">
                <span><a href="?mode=recoveryf">Забыли пароль</a> </span>
            </div>                    
  
            <div class="FormElements">    

                               
            
            </div>       

            
            -->
        </form>
    </article>  
    <?php Footer()?> 
    </body>
</html>