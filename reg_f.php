<?php Head("ILikeit")?>

<body>

<?php Menu(1)?> 
                   
    <article>        
        <div class="FormGroup">
            <!--<form action="?mode=reg" method="POST" id="login_reg">-->
            <h1><?php echo $GLOBALS['Dict']['Mnu_Reg']; ?></h1>
            
            <div class="DivHr">
                <hr>
            </div>            
            
            <div class="FormElements">
                <div class="ColLabel">
                    <?php echo $GLOBALS['Dict']['Input_Email']; ?>								
                </div>
                <div class="ColInput">
                    <input type="email" id="email" maxlength="254" placeholder="<?php echo $GLOBALS['Dict']['Input_Email']; ?>" autofocus required name="email" oninput='$("#msgRegUser").html("")'>                       
                </div>                
            </div>
            
            <div class="FormElements">
                <div class="ColLabel">
                    <?php echo $GLOBALS['Dict']['Input_Password']; ?>								
                </div>
                <div class="ColInput">
                    <input type="password" id="pass" maxlength="30" placeholder="<?php echo $GLOBALS['Dict']['Input_Password']; ?>" required name="pass" oninput='$("#msgRegUser").html("")'>                       
                </div>                
            </div>

            <div class="FormElements">
                <div class="ColLabel">
                    <?php echo $GLOBALS['Dict']['Reg_Confirm']; ?>								
                </div>
                <div class="ColInput">
                    <input type="password" id="pass2" maxlength="30" placeholder="<?php echo $GLOBALS['Dict']['Reg_ConfirmPass']; ?>" required name="pass2" oninput='$("#msgRegUser").html("")'>                       
                </div>                
            </div>   
            
            <input type="button" value="<?php echo $GLOBALS['Dict']['Mnu_Reg']; ?>" class="ButtonProfile" name="submit" id="submit" onClick = "RegUser()">   
            <div class="MsgL" id="msgRegUser"></div> 
           
            <!--</form>-->    

        </div>
<!--        <div class="FormGroup">
            <h2>Регистрация через соципльные сети</h2>
        </div>-->
          
    
    </article>  
    <?php Footer()?> 
    
    <script language="javascript" type="text/javascript">
    function RegUser(){
        var submit = $('#submit').val();
        var email = $('#email').val();
        var pass = $('#pass').val();
        var pass2 = $('#pass2').val();

        $.ajax({
            type: "POST",
            url: "?mode=reg",
            data: {submit:submit, email:email, pass:pass, pass2:pass2}
        }).done(function( result )
            {
                $("#msgRegUser").html(result);
            });
    }     
    </script>      
    
    </body>
</html>

<!-- для проверки адресов электронной почты -->
<!--<input type="text" title="электронный адрес" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" />-->
