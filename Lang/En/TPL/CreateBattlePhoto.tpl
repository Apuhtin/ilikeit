        
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
            <div class="DivDualImg">                
                <div class="DivDualImgBr" id="MsgUpdateLink1">
                    {ImgLink1}
                </div>                         
            </div>                                                 
            <div class="BtColInputLink">
                <form id="data1">
                    <input type="hidden" name="NewBtlId" value ="{NewBtlId}"> 
                    <div class="Btl_file-upload" >
                        <label>
                            <input type="file" id="FileBtlUp1" name="filename">
                            <span>Select a file</span>
                        </label>
                    </div>
                    <input type="text" class="FileNamwBtlUp1" id="FileNamwBtlUp1" disabled>        
                    <span class="ButtonUpdate"><input class="BtnFileUpload" type="submit" name="DownloadFile1" /></span>   
                </form>
                <span class="ButtonUpdate"><input class="BtnFileDel" type="button" name="DelFile1" id="DelFile1" onClick = "DelFile1()" /></span>
                <input class="BtnRotateL" type="button" id="RotateLeft" name="RotateLeft"  onClick = "RotateLeft(1)">
                <input class="BtnRotateR" type="button" id="RotateRight" name="RotateRight"  onClick = "RotateRight(1)">                 
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
                    <div class="Btl_file-upload" >
                        <label>
                            <input type="file" id="FileBtlUp2" name="filename">
                            <span>Select a file</span>
                        </label>
                    </div>
                    <input type="text" class="FileNamwBtlUp2" id="FileNamwBtlUp2" disabled>                                                                
                    <span class="ButtonUpdate"><input class="BtnFileUpload" type="submit" name="DownloadFile2" /></span>                    
                </form>
                <span class="ButtonUpdate"><input class="BtnFileDel" type="button" name="DelFile2" id="DelFile2" onClick = "DelFile2()" /></span>
                <input class="BtnRotateL" type="button" id="RotateLeft" name="RotateLeft"  onClick = "RotateLeft(2)">
                <input class="BtnRotateR" type="button" id="RotateRight" name="RotateRight"  onClick = "RotateRight(2)">                 
            </div> 
        
        <!--Поле зарезервировано под интернет ссылку
            <div class="BtColInputLink">
                <span class="InputLink"><input  type="url" name="Link2" id="Link2" placeholder="URL Ссылка на фото" value ="{Link2}"></span>    
                <span class="ButtonUpdate"><input class="InputBtnUpdate" type="button" name="UpdateLink2" id="UpdateLink2" onClick = "UpdateLink2()" /></span>                        
            </div>
        -->

        </div>

                
                     


















