
        <input type="hidden" name="Type" Id="Type" value ="{Type}">       
        <input type="hidden" name="Text" Id="Text" value ="{Text}">         
        <input type="hidden" name="Category" Id="Category" value ="{Category}">
        <input type="hidden" name="Day" Id="Day" value ="{Day}">        
        <input type="hidden" name="TypeBattle" Id="TypeBattle" value ="{TypeBattle}">
    
        <div class="BtColInput100">
            <input type="text" name="Title" id="Title"  maxlength="100" placeholder="Title" value ="{Title}" autofocus>                       
        </div>
        <div class="BtHechTagInput">
            <input type="text"   name="Tags" id="Tags" placeholder="Description" value ="{Tags}">                     
        </div>            
        <div class="DivDualBlock">                
            <div class="DivDualVideo">                
                <div class="DivDualVideoBr" id="MsgUpdateLink1">                    
                    {ImgLink1}
                </div>                         
            </div> 
            <div class="BtColInputLink">                                
                <form id="data1">
                    <input type="hidden" name="NewBtlId" value ="{NewBtlId}">  

                    <input type="text" class="FileNamwBtlUp1" id="FileNamwBtlUp1" placeholder="Link 1" onchange="UpdateLinkVideo(1)">                                                                                    
                <!--    <span class="ButtonUpdate"><input class="BtnFileUpload" type="submit" name="DownloadFile1" /></span> -->
                </form>
                <!-- <span class="ButtonUpdate"><input class="BtnFileDel" type="button" name="DelFile1" id="DelFile1" onClick = "DelFile1()" /></span>  -->           
            </div>                
                
        <!--Поле зарезервировано под интернет ссылку
            <div class="BtColInputLink">                
                <span class="InputLink"><input  type="url" name="Link1" id="Link1" placeholder="URL Ссылка на фото" value ="{Link1}"></span>   
                <span class="ButtonUpdate"><input  class="InputBtnUpdate" type="button" name="UpdateLink1" id="UpdateLink1" onClick = "UpdateLink1()" /></span>
            </div>
        -->

        </div>
                      
        <div class="DivDualBlockR">                       
            <div class="DivDualVideo">
                <div class="DivDualVideoBr" id="MsgUpdateLink2">
                    {ImgLink2}
                </div>
            </div>              
            <div class="BtColInputLink">
                <form id="data2">
                    <input type="hidden" name="NewBtlId" value ="{NewBtlId}">
 
                    <input type="text" class="FileNamwBtlUp2" id="FileNamwBtlUp2" placeholder="Link 2" onchange="UpdateLinkVideo(2)">                      
                <!--     <span class="ButtonUpdate"><input class="BtnFileUpload" type="submit" name="DownloadFile2" /></span> -->
                </form>
            <!--    <span class="ButtonUpdate"><input class="BtnFileDel" type="button" name="DelFile2" id="DelFile2" onClick = "DelFile2()" /></span>  -->   
            </div> 
        
        <!--Поле зарезервировано под интернет ссылку
            <div class="BtColInputLink">
                <span class="InputLink"><input  type="url" name="Link2" id="Link2" placeholder="URL Ссылка на фото" value ="{Link2}"></span>    
                <span class="ButtonUpdate"><input class="InputBtnUpdate" type="button" name="UpdateLink2" id="UpdateLink2" onClick = "UpdateLink2()" /></span>                        
            </div>
        -->

        </div>

            
    
                     


















