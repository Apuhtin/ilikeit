 <?php Head("ILikeit")?>

<body>
    
    <?php Menu(5)?>       
    <article>        
        <div class="FormGroup">
            <!--<form action="?mode=recovery" method="POST" id="login_in">-->
            <h1><?php echo $GLOBALS['Dict']['Recovery_Title']; ?></h1>

            <div class="DivHr">
                <hr>
            </div> 
            
            <div class="FormElements">
                <div class="ColLabel">
                    <?php echo $GLOBALS['Dict']['Input_Email']; ?>								
                </div>
                <div class="ColInput">                                                       
                    <input type="email" id="email" maxlength="254" placeholder="E-mail" autofocus required name="email">                       
                </div>                
            </div>
                                    
            <input type="submit" class="ButtonProfile" value="<?php  echo $GLOBALS['Dict']['Contact_Send']; ?>" name="submit" id="MsgEmail" onClick = "MsgEmail()">
  
            <div class="MsgL" id="msgMsgEmail"></div> 
           
            <!--</form>-->    

        </div>         
    
    </article>  
     
    <?php Footer()?> 
    
    <script language="javascript" type="text/javascript">
        function MsgEmail(){
            var MsgEmail = $('#MsgEmail').val();
            var email = $('#email').val();

            $.ajax({
                type: "POST",
                url: "?mode=recovery",
                data: {submit:MsgEmail, email:email}
            }).done(function( result )
                {
                    $("#msgMsgEmail").html(result);
                });
        }     
    </script>          
    
    </body>
</html>

