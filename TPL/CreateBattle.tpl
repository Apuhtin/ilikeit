    <div class="DivDual" id="MsgSaveNBT">
        <h1>Параметры</h1>
        <input type="hidden" name="UserId" Id="UserId" value ="{UserId}">              
        <input type="hidden" name="NewBtlId" Id="NewBtlId" value ="{NewBtlId}">  
        <input type="hidden" name="StatusBtl" Id="StatusBtl" value ="{StatusBtl}">                                                          
    </div>
           
    <div class="DivDual">
        
        <input type="hidden" name="Type" Id="Type" value ="{Type}">       
        <input type="hidden" name="Text" Id="Text" value ="{Text}">         
        <input type="hidden" name="Category" Id="Category" value ="{Category}">
        <input type="hidden" name="Day" Id="Day" value ="{Day}">        
        <input type="hidden" name="TypeBattle" Id="TypeBattle" value ="{TypeBattle}">
    
        <div class="BtColInput100">
            <input type="text" name="Title" id="Title"  maxlength="100" placeholder="Заголовок" value ="{Title}" autofocus>                       
        </div>

            
        <div class="DivDualBlock">

            <div class="DivDualImg">                
                <div class="DivDualImgBr" id="MsgUpdateLink1">
                    {ImgLink1}
                </div>                         
            </div> 

            <div class="BtColInputLink">
                <form id="data1">
                    <input type="hidden" name="NewBtlId" value ="{NewBtlId}"> 
                    <span class="SpanBtLeft"><input class="BtnFile" type="file" name="filename"></span>  
                    <span class="ButtonUpdate"><input class="BtnFileUpload" type="submit" name="DownloadFile1" /></span>
                </form>
                <span class="ButtonUpdate"><input class="BtnFileDel" type="button" name="DelFile1" id="DelFile1" onClick = "DelFile1()" /></span>
                
            </div>                
                
        <!--Поле зарезервировано под интернет ссылку
            <div class="BtColInputLink">                
                <span class="InputLink"><input  type="url" name="Link1" id="Link1" placeholder="URL Ссылка на фото" value ="{Link1}"></span>   
                <span class="ButtonUpdate"><input  class="InputBtnUpdate" type="button" name="UpdateLink1" id="UpdateLink1" onClick = "UpdateLink1()" /></span>
            </div>
        -->

        </div>
                      
        <div class="DivDualBlockR">

            <div class="DivDualImg">
                <div class="DivDualImgBr" id="MsgUpdateLink2">
                    {ImgLink2}
                </div>
            </div>  
            
            <div class="BtColInputLink">
                <form id="data2">
                    <input type="hidden" name="NewBtlId" value ="{NewBtlId}">
                    <span class="SpanBtLeft"><input class="BtnFile" type="file" name="filename"></span> 
                    <span class="ButtonUpdate"><input class="BtnFileUpload" type="submit" name="DownloadFile2" /></span>
                </form>
                <span class="ButtonUpdate"><input class="BtnFileDel" type="button" name="DelFile2" id="DelFile2" onClick = "DelFile2()" /></span>
            </div> 
        
        <!--Поле зарезервировано под интернет ссылку
            <div class="BtColInputLink">
                <span class="InputLink"><input  type="url" name="Link2" id="Link2" placeholder="URL Ссылка на фото" value ="{Link2}"></span>    
                <span class="ButtonUpdate"><input class="InputBtnUpdate" type="button" name="UpdateLink2" id="UpdateLink2" onClick = "UpdateLink2()" /></span>                        
            </div>
        -->

        </div>
            <div class="BtHechTagInput">
                <input type="text"   name="Tags" id="Tags" placeholder="Описание" value ="{Tags}">                     
            </div>
            
    </div>        
                  
    <div class="DivDual">
    
        <span class="SpanBtLeft">
            <input type="button" class="ButtonProfile" value="Удалить" name="Delete" id="Delete" onClick = "Delete()">
        </span> 

        <input type="button" class="ButtonProfile" value="Опубликовать" name="PublicNBT" id="PublicNBT" onClick = "PublicNBT()">              
        <input type="button" class="ButtonProfile" value="Сохранить" name="SaveNBT" id="SaveNBT" onClick = "SaveNBT()">
    </div>      
                     


















