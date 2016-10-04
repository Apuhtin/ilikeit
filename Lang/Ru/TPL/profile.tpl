                      
    <div class="FormGroup">
        
        
        <h2>Аватар</h2> 
        
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
                      <span>Выберите файл</span>
                 </label>
            </div>
            <input type="text" id="FileNamwProfileUp" disabled>  

            <div class = "FormGroupTxt">
                    Рекомендуемый размер картинки 200х200 пикселей.</br> 
                    Допустимые форматы кртинки: JPG(JPEG), PNG.</br>
                    Размер файла не более 2 Мб. 
            </div>  
            <div id = "MsgTxt"></div> 
            <div class="BtnDiv">
                <input type="submit" class="ButtonProfile" value="Загрузить" name="DownloadFile">
            </div>
        </form>     
            
        <div class="BtnDiv">
            <input type="button" class="ButtonProfile" value="Удалить" name="DelFile" id="DelFile" onClick = "DelFile()">
        </div>            
         
               
    </div> 

    <div class="FormGroup">
        
        <h2>Персональные данные</h2>
       
            <div class="FormElements">
                <div class="ColLabel">
                    Login <span style="color:red;">*</span>								
                </div>
                <div class="ColInput">
                    <input  type="text" name="NikName" id="NikName" maxlength="100" placeholder="Логин" autofocus value="{NikName}" oninput='$("#msgSaveUser").html("")'>                        
                </div>
            </div>
            <div class="FormElements">
                <div class="ColLabel">
                    Имя						
                </div>
                <div class="ColInput">
                    <input  type="text" name="Name" id="Name" maxlength="100" placeholder="Имя"  value="{Name}" oninput='$("#msgSaveUser").html("")'>                        
                </div>
            </div>            
            <div class="FormElements">
                <div class="ColLabel">
                    Фамилия							
                </div>
                <div class="ColInput">
                    <input  type="text" name="LastName" id="LastName" maxlength="100" placeholder="Фамилия"  value="{LastName}" oninput='$("#msgSaveUser").html("")'>                        
                </div>
            </div>                
            <div class="FormElements">
                <div class="ColLabel">
                    Отчество							
                </div>
                <div class="ColInput">
                    <input  type="text" name="SecondName" id="SecondName" maxlength="100" placeholder="Отчество"  value="{SecondName}" oninput='$("#msgSaveUser").html("")'>                        
                </div>
            </div>   
            <div class="FormElements">
                <div class="ColLabel">
                    Пол							
                </div>
                <div class="ColInput"> 
                    <select name="Sex" id="Sex" class="select" oninput='$("#msgSaveUser").html("")'>
                        <option {SexSlected_0} value="0">Не определен</option>
                        <option {SexSlected_1} value="1">Мужской</option>
                        <option {SexSlected_2} value="2">Женский</option>
                    </select>  
                </div> 
            </div>          
            <div class="FormElements">
                <div class="ColLabel">
                    Язык							
                </div>
                <div class="ColInput"> 
                    <select name="Lang" id="Lang" class="select" oninput='$("#msgSaveUser").html("")'>
                        <option {LangSlected_0} value="0">English</option>
                        <option {LangSlected_1} value="1">Русский</option>
                    </select>  
                </div> 
            </div> 
            
            <input type="button" name="InputSaveUser" id="SaveUser" class="ButtonProfile" value="Сохранить" onClick = "SaveUser()" />
            <div class="MsgL" id="msgSaveUser"></div>
         
    </div>
    <div class="FormGroup">
        
        <h2>Контактная информация</h2>

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
                        Телефон							
                </div>
                <div class="ColInput">
                    <input  type="text" name="Tel" id="Tel" maxlength="19" placeholder="Телефон"  value="{Tel}" oninput='$("#msgSaveContact").html("")'>                        
                </div>
            </div>     
            <div class="FormElements">
                <div class="ColLabel">
                    Скайп							
                </div>
                <div class="ColInput">
                    <input  type="text" name="Skype" id="Skype" maxlength="100" placeholder="Скайп"  value="{Skype}" oninput='$("#msgSaveContact").html("")'>                        
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
            
            <input type="button" name="SaveContact" id="SaveContact" class="ButtonProfile" value="Сохранить" onClick = "SaveContact()" />
            <div class="MsgL" id="msgSaveContact"></div>
                  
    </div>

    <div class="FormGroup">
        <h2>Уведомления на почту</h2>
               
            <div class="FormElements">
                <div class="ColInput100"> 
                    <select name="MessageEmal" id="MessageEmal" class="select" oninput='$("#msgSaveMessage").html("")'>
                        <option {MsgSlected_0} value="0" >Отправлять</option>
                        <option {MsgSlected_1} value="1">Не отправлять</option>

                    </select>  
                </div> 
            </div>           
            <input type="button" name="SaveMessage" id="SaveMessage" class="ButtonProfile" value="Сохранить" onClick = "SaveMessage()" />
            <div class="MsgL" id="msgSaveMessage"></div>

    </div>

    <div class="FormGroup">
  
        <h2>Изменить пароль</h2>                            

        <div class="FormElements">
            <div class="ColInput100">
                <input type="password" id="pass" maxlength="30" placeholder="Новый пароль" required name="pass" oninput='$("#msgSavePassword").html("")'>
            </div>
        </div>
        <div class="FormElements">
            <div class="ColInput100">
                <input type="password" id="pass2" maxlength="30" placeholder="Подтверждение пароля" name="pass2" oninput='$("#msgSavePassword").html("")'> 
            </div>
        </div>

        <input type="button" name="SavePassword" class="ButtonProfile" value="Сохранить" onClick = "SavePassword()" />
        <div class="MsgL" id="msgSavePassword"></div>        

    </div>

    <div class="FormGroup">
        <form action="?mode=profile" method="POST">
            <input type="hidden" name="UserId" value ="7">          
            <input type="submit" class="ButtonProfile" value="Удалить аккаунт" name="DeleteUser">
        </form>    
    </div>
                     
