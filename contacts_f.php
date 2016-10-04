
<?php Head("ILikeit")?>

<body>

<?php Menu(1)?> 
 
    <article>

    <div class="FormGroup">
        
        <h1><?php echo $GLOBALS['Dict']['Contact_Title']; ?></h1>
       
        <div class="DivHr">
            <hr>
        </div>
        
        
            <div class="FormElements">
                <div class="ColLabel">
                    <?php echo $GLOBALS['Dict']['Contact_Name']; ?> <span style="color:red;">*</span>						
                </div>
                <div class="ColInput">
                    <input  type="text" name="username" id="username" maxlength="100" placeholder="<?php echo $GLOBALS['Dict']['Contact_Name']; ?>" autofocus oninput='$("#msgSendUser").html("")'>                        
                </div>
            </div> 
        
            <div class="FormElements">
                <div class="ColLabel">
                    <?php echo $GLOBALS['Dict']['Contact_Tema']; ?> <span style="color:red;">*</span>						
                </div>
                <div class="ColInput">
                    <input  type="text" name="tema" id="tema" maxlength="100" placeholder="<?php echo $GLOBALS['Dict']['Contact_Tema']; ?> "  oninput='$("#msgSendUser").html("")'>                        
                </div>
            </div>         
                        
            <div class="FormElements">
                <div class="ColLabel">
                    <?php echo $GLOBALS['Dict']['Input_Email']; ?> <span style="color:red;">*</span>							
                </div>                            
                <div class="ColInput">
                    <input type="email" id="Emal" placeholder="E-mail"  name="email"  oninput='$("#msgSendUser").html("")'>                                  
                </div>
            </div>
            
            <div class="FormElements">
                <div class="ColLabel">
                    <?php echo $GLOBALS['Dict']['Contact_Message']; ?> <span style="color:red;">*</span>							
                </div> 
                <!--<div class="ColInput">-->
                    <textarea id="ContactMessage" placeholder="<?php echo $GLOBALS['Dict']['Contact_Message']; ?>" name="usermessage"  oninput='$("#msgSendUser").html("")'></textarea>
                <!--</div>-->
            </div>
        
            <input type="button" name="InputSaveUser" id="SenSupport" class="ButtonProfile" value="<?php echo $GLOBALS['Dict']['Contact_Send']; ?>" onClick = "SenSupport()" />
            <div class="MsgL" id="msgSendUser"></div>
         
    </div>
        
      
                
              
<!--            <form action="?mode=contacts" method="POST"  id="contact_in">
                <h1>Контакты</h1>
                <p>Написать нам:</p>

                <fieldset id="inputs">
                    <input id="username" type="text" maxlength="30" placeholder="Имя" autofocus required name="username">   
                    <input id="username" type="text" maxlength="30" placeholder="Тема" required name="tema">
                    <input id="username" type="email" maxlength="100"  placeholder="E-mail" required name="email"> 

                    <textarea cols="54" rows="5" placeholder="Сообщение" name="usermessage" required></textarea>

                </fieldset>
                <fieldset id="actions">
                    <input type="submit" id="submit" value="ОТПРАВИТЬ" name="msgsubmit">
                </fieldset>

            </form>-->

    
</article>
<?php Footer()?> 
    
<script language="javascript" type="text/javascript">
    
function SenSupport(){
    
    var username = $('#username').val();
    var tema = $('#tema').val();
    var email = $('#Emal').val();
    var usermessage = $('#ContactMessage').val();


    $.ajax({
        type: "POST",
        url: "?mode=contacts",
        data: {username:username, tema:tema, email:email, usermessage:usermessage, msgsubmit:1}
    }).done(function( result )
        {
            $("#msgSendUser").html(result);
        });
}


</script>
        
    
</body>
</html>
