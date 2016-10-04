                      
    <div class="FormGroup">
        
        <h2>Avatar</h2> 
        <div class="DivAvatar200">
            <div class="DivBrAvatar200" id="msgImgAvatar">
                <img class ="Avatar200" id ="Avatar200" src="{srcAvatar}">            
            </div>
            <input class="BtnRotateL" type="button" id="RotateLeft" name="RotateLeft"  onClick = "RotateLeft()">
            <input class="BtnRotateR" type="button" id="RotateRight" name="RotateRight"  onClick = "RotateRight()">                
        </div>
        
        <!--     action="?mode=profile" method="post" enctype="multipart/form-data"-->
            
        <form id="data1"> 
            <input type="hidden" name="UserId" id="UserId" value ="{UserId}">            
           
            <div class="file-upload" onClick = '$("#MsgTxt").html("")'>
                 <label>
                      <input type="file" id="FileProfileUp" name="filename">
                      <span>Select a file</span>
                 </label>
            </div>
            <input type="text" id="FileNamwProfileUp" disabled>              
            
          
            <div class = "FormGroupTxt">
                
                Recommended image size of 200x200 pixels.</br>
                Acceptable formats Pictures: JPG (JPEG), PNG.</br>
                File size not more than 2 Mb.
                                
            </div>  
            <div id = "MsgTxt"></div> 
            <div class="BtnDiv">
                <input type="submit" class="ButtonProfile" value="Upload" name="DownloadFile">
            </div>
        </form>     
            
        <div class="BtnDiv">
            <input type="button" class="ButtonProfile" value="Delete" name="DelFile" id="DelFile" onClick = "DelFile()">
        </div>            
         
               
    </div> 

    <div class="FormGroup">
        
        <h2>Personal Information</h2>
       
            <div class="FormElements">
                <div class="ColLabel">
                    Login <span style="color:red;">*</span>								
                </div>
                <div class="ColInput">
                    <input  type="text" name="NikName" id="NikName" maxlength="100" placeholder="Login" autofocus value="{NikName}" oninput='$("#msgSaveUser").html("")'>                        
                </div>
            </div>
            <div class="FormElements">
                <div class="ColLabel">
                    Name						
                </div>
                <div class="ColInput">
                    <input  type="text" name="Name" id="Name" maxlength="100" placeholder="Name"  value="{Name}" oninput='$("#msgSaveUser").html("")'>                        
                </div>
            </div>            
            <div class="FormElements">
                <div class="ColLabel">
                    Last name							
                </div>
                <div class="ColInput">
                    <input  type="text" name="LastName" id="LastName" maxlength="100" placeholder="Last name"  value="{LastName}" oninput='$("#msgSaveUser").html("")'>                        
                </div>
            </div>                
            <div class="FormElements">
                <div class="ColLabel">
                    Second name							
                </div>
                <div class="ColInput">
                    <input  type="text" name="SecondName" id="SecondName" maxlength="100" placeholder="Second name"  value="{SecondName}" oninput='$("#msgSaveUser").html("")'>                        
                </div>
            </div>   
            <div class="FormElements">
                <div class="ColLabel">
                    Sex							
                </div>
                <div class="ColInput"> 
                    <select name="Sex" id="Sex" class="select" oninput='$("#msgSaveUser").html("")'>
                        <option {SexSlected_0} value="0">None</option>
                        <option {SexSlected_1} value="1">Man</option>
                        <option {SexSlected_2} value="2">Woman</option>
                    </select>  
                </div> 
            </div>          
            <div class="FormElements">
                <div class="ColLabel">
                    Lang							
                </div>
                <div class="ColInput"> 
                    <select name="Lang" id="Lang" class="select" oninput='$("#msgSaveUser").html("")'>                        
                        <option {LangSlected_0} value="0">English</option>
                        <option {LangSlected_1} value="1">Русский</option>
                    </select>  
                </div> 
            </div> 
            
            <input type="button" name="InputSaveUser" id="SaveUser" class="ButtonProfile" value="Save" onClick = "SaveUser()" />
            <div class="MsgL" id="msgSaveUser"></div>
         
    </div>
    <div class="FormGroup">
        
        <h2>Contact Information</h2>

            <div class="FormElements">
                <div class="ColLabel">
                    Email <span style="color:red;">*</span>							
                </div>                            
                <div class="ColInput">
                    <input disabled="disabled" type="email" id="Emal" placeholder="E-mail" value ="{Email}"  required name="email">                                  
                </div>
            </div>
            <div class="FormElements">
                <div class="ColLabel">
                    Phone							
                </div>
                <div class="ColInput">
                    <input  type="text" name="Tel" id="Tel" maxlength="19" placeholder="Phone"  value="{Tel}" oninput='$("#msgSaveContact").html("")'>                        
                </div>
            </div>     
            <div class="FormElements">
                <div class="ColLabel">
                    Skype							
                </div>
                <div class="ColInput">
                    <input  type="text" name="Skype" id="Skype" maxlength="100" placeholder="Skype"  value="{Skype}" oninput='$("#msgSaveContact").html("")'>                        
                </div>
            </div>                
            <div class="FormElements">
                <div class="ColLabel">
                    ISQ							
                </div>
                <div class="ColInput">
                    <input  type="text" name="ISQ" id="ISQ" maxlength="9" placeholder="ISQ"  value="{ISQ}" oninput='$("#msgSaveContact").html("")'>                        
                </div>
            </div>   
            
            <input type="button" name="SaveContact" id="SaveContact" class="ButtonProfile" value="Save" onClick = "SaveContact()" />
            <div class="MsgL" id="msgSaveContact"></div>
                  
    </div>

    <div class="FormGroup">
        <h2>Messages on email</h2>
               
            <div class="FormElements">
                <div class="ColInput100"> 
                    <select name="MessageEmal" id="MessageEmal" class="select" oninput='$("#msgSaveMessage").html("")'>
                        <option {MsgSlected_0} value="0" >Send</option>
                        <option {MsgSlected_1} value="1">Do not send</option>

                    </select>  
                </div> 
            </div>           
            <input type="button" name="SaveMessage" id="SaveMessage" class="ButtonProfile" value="Save" onClick = "SaveMessage()" />
            <div class="MsgL" id="msgSaveMessage"></div>

    </div>

    <div class="FormGroup">
  
        <h2>Change password</h2>                            

        <div class="FormElements">
            <div class="ColInput100">
                <input type="password" id="pass" maxlength="30" placeholder="New password" required name="pass" oninput='$("#msgSavePassword").html("")'>
            </div>
        </div>
        <div class="FormElements">
            <div class="ColInput100">
                <input type="password" id="pass2" maxlength="30" placeholder="Password confirmation" name="pass2" oninput='$("#msgSavePassword").html("")'> 
            </div>
        </div>

        <input type="button" name="SavePassword" class="ButtonProfile" value="Save" onClick = "SavePassword()" />
        <div class="MsgL" id="msgSavePassword"></div>        

    </div>

    <div class="FormGroup">
        <form action="?mode=profile" method="POST">
            <input type="hidden" name="UserId" value ="7">          
            <input type="submit" class="ButtonProfile" value="Delete account" name="DeleteUser">
        </form>    
    </div>
                     
