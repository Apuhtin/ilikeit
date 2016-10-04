 <?php Head("ILikeit")?>

<body> 

<?php Menu(5)?>       

    <article> 
        
        <div class="FormGroup">
            <!--<form action="?mode=input" method="POST" >-->
            <h1><?php echo $GLOBALS['Dict']['Input_Title']; ?></h1>
            
            <div class="DivHr">
                <hr>
            </div>            
            
            <div class="FormElements">
                <div class="ColLabel">
                    <?php echo $GLOBALS['Dict']['Input_Email']; ?>								
                </div>
                <div class="ColInput">
                    <input type="email" id="email" placeholder="<?php echo $GLOBALS['Dict']['Input_Email']; ?>" 
                           accept="                                         "<?php if(isset($_SESSION['Login'])) {
                                                                            echo 'value ="'.$_SESSION['Login'].'"';} 

                                                                            if(isset($_COOKIE["input1"])){
                                                                            echo 'value="'. $_COOKIE["input1"].'"';}

                                                                           ?> autofocus name="email"  >                                                           
                </div>    
                
            </div>     
            <div class="FormElements">
                <div class="ColLabel">
                    <?php echo $GLOBALS['Dict']['Input_Password']; ?>								
                </div>
                <div class="ColInput"> 
                    <input type="password" id="pass" maxlength="30" placeholder="<?php echo $GLOBALS['Dict']['Input_Password']; ?>" 
                           accept="                                         "<?php if(isset($_COOKIE["input2"])){
                                                                                echo 'value="'. base64_decode($_COOKIE["input2"]).'"';}
                                                                            ?> name="pass"  ></br>                    
                </div>                
            </div> 
         
            
            
            <div class="FormElements">
                <input type="button" class="ButtonProfile" value="<?php  echo $GLOBALS['Dict']['Input_Input']; ?>" name="submit" id="submit" onClick = "InputUser()">
                <div class="MsgL" id="MsgL"></div>
                
            </div>

            <div class="FormElements">
                
                    
                    <input type="checkbox" id="cboxInput" <?php if(isset($_COOKIE["input1"]) and isset($_COOKIE["input2"])){
                                                echo 'checked';
                                                }
                                                ?> name="remember"/><label for="cboxInput"><?php  echo $GLOBALS['Dict']['Input_Save']; ?></label> 
             
                
                <span class="LabeRight"><a href="?mode=recoveryf"><?php  echo $GLOBALS['Dict']['Input_Recovery']; ?></a></span>
                
                <span class="LabeRight"><a href="?mode=regf"><?php  echo $GLOBALS['Dict']['Mnu_Reg']; ?></a></span>
                
            </div>   
            <!--</form>-->
        </div>
        
        </form>
    </article>  
    <?php Footer()?> 
    
    <script language="javascript" type="text/javascript">
    function InputUser(){
        var submit = $('#submit').val();
        var email = $('#email').val();
        var pass = $('#pass').val();
        var cboxInput = $('#cboxInput').val();
  

        $.ajax({
            type: "POST",
            url: "?mode=input",
            data: {submit:submit, email:email, pass:pass, remember:cboxInput}
        }).done(function( result )
            {
                
            if (result == 200){
                document.location.href= "?mode=index";
            }
            else {
                $("#MsgL").html(result);
            }



                
                
            });
    }     
    </script>        
    
    </body>
</html>