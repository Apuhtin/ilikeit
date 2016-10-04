
<?php Head("Like | Поединки")?>

<body>

<?php Menu(1)?> 
 

    <article>
        
        <?php  
        
        if(isset($_GET['Id'])){
            $IdBtl = $_GET['Id'];
        }
        else{
            $IdBtl = 0;
        }
        
        
            InputIndexBattles($db_connect, $IdBtl)
        ?> 
        
        <div class="DivDualOne">
            
            <!--Блок коментариев-->
            <div class="DivOne">
                <h2>Коментарии:</h2>
                
                
                <div class="ILB_Str">
                    <img class="ImgAvatar" src="../images/photo.png"/> 
                   
                    <span class="SpanComentUsr"><h3>apuhtin_denis</h3></span>
                    
                    <span class="SpanComentDate">
                        08.09.2016 23:21
                    </span>
                    <div class="DivTextComent">
                        Текст Текст Текст Текст Текст Текст комнентарий комнентарий комнентарий
                        комнентарий комнентарий комнентарий
                        комнентарий комнентарий комнентарий
                        комнентарий
                    </div>
                    
                </div>
                
                <div class="ILB_Str">
                    <img class="ImgAvatar" src="../images/photo.png"/>                    
                </div>

                <div class="ILB_Str">
                    <img class="ImgAvatar" src="../images/photo.png"/>                    
                </div>

                <div class="ILB_Str">
                    <img class="ImgAvatar" src="../images/photo.png"/>                    
                </div>  
                
                <hr>
                
                <input type="button" class="ButtonListNext" value=">>" name="NextComment" id="NextComment" onClick = "NextComment()"> 
            </div>
           
        
            
        <?php  
    
            InputIndexListBattle($db_connect, 0)
        ?>        
            
<!--            Блок с пхожими видео
            <div class="DivOne">
                <h2>Похожие поединки:</h2>

                <div class="ILB_Str">
                 <form action="?mode=createf" method="POST">

                     <input type="hidden" name="BtlId" value ="{BtlId}">     

                     <div class="NLB_Chekbox"><input type="checkbox" name="c1" /></div>

                     <a href="?mode=createf&BtlId={BtlId}"></a> 

                     <div class="ILB_User">
                         {ImgLink1}
                     </div>
                     <div class="ILB_User">
                         {ImgLink2}
                     </div>
                     <input  type="submit" class="NLB_User2" value="Принять вызов" name="AcceptBattle"> 

                     <div class="ILB_Title">
                         <div class="ILB_TitleStr">
                          <span class="ILB_TitleStrSpanLeft"><h3>{Title}</h3></span>

                         </div>

                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{CreateDate}</span>


                         </div>

                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{ImgUser}</span>
                             <span class="ILB_TitleStrSpanLeft">{NikName}</span>
                         </div>
                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{ImgChet}</span>
                             <span class="ILB_TitleStrSpanLeft">{Chet}</span>
                         </div>


                     </div> 
                 </form>
                 </div>   

                <div class="ILB_Str">
                 <form action="?mode=createf" method="POST">

                     <input type="hidden" name="BtlId" value ="{BtlId}">     

                     <div class="NLB_Chekbox"><input type="checkbox" name="c1" /></div>

                     <a href="?mode=createf&BtlId={BtlId}"></a> 

                     <div class="ILB_User">
                         {ImgLink1}
                     </div>
                     <div class="ILB_User">
                         {ImgLink2}
                     </div>
                     <input  type="submit" class="NLB_User2" value="Принять вызов" name="AcceptBattle"> 

                     <div class="ILB_Title">
                         <div class="ILB_TitleStr">
                          <span class="ILB_TitleStrSpanLeft"><h3>{Title}</h3></span>

                         </div>

                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{CreateDate}</span>


                         </div>

                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{ImgUser}</span>
                             <span class="ILB_TitleStrSpanLeft">{NikName}</span>
                         </div>
                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{ImgChet}</span>
                             <span class="ILB_TitleStrSpanLeft">{Chet}</span>
                         </div>


                     </div> 
                 </form>
                 </div>                   
                
                <div class="ILB_Str">
                 <form action="?mode=createf" method="POST">

                     <input type="hidden" name="BtlId" value ="{BtlId}">     

                     <div class="NLB_Chekbox"><input type="checkbox" name="c1" /></div>

                     <a href="?mode=createf&BtlId={BtlId}"></a> 

                     <div class="ILB_User">
                         {ImgLink1}
                     </div>
                     <div class="ILB_User">
                         {ImgLink2}
                     </div>
                     <input  type="submit" class="NLB_User2" value="Принять вызов" name="AcceptBattle"> 

                     <div class="ILB_Title">
                         <div class="ILB_TitleStr">
                          <span class="ILB_TitleStrSpanLeft"><h3>{Title}</h3></span>

                         </div>

                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{CreateDate}</span>


                         </div>

                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{ImgUser}</span>
                             <span class="ILB_TitleStrSpanLeft">{NikName}</span>
                         </div>
                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{ImgChet}</span>
                             <span class="ILB_TitleStrSpanLeft">{Chet}</span>
                         </div>


                     </div> 
                 </form>
                 </div>   

                 <div class="ILB_Str">
                 <form action="?mode=createf" method="POST">

                     <input type="hidden" name="BtlId" value ="{BtlId}">     

                     <div class="NLB_Chekbox"><input type="checkbox" name="c1" /></div>

                     <a href="?mode=createf&BtlId={BtlId}"></a> 

                     <div class="ILB_User">
                         {ImgLink1}
                     </div>
                     <div class="ILB_User">
                         {ImgLink2}
                     </div>
                     <input  type="submit" class="NLB_User2" value="Принять вызов" name="AcceptBattle"> 

                     <div class="ILB_Title">
                         <div class="ILB_TitleStr">
                          <span class="ILB_TitleStrSpanLeft"><h3>{Title}</h3></span>

                         </div>

                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{CreateDate}</span>


                         </div>

                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{ImgUser}</span>
                             <span class="ILB_TitleStrSpanLeft">{NikName}</span>
                         </div>
                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{ImgChet}</span>
                             <span class="ILB_TitleStrSpanLeft">{Chet}</span>
                         </div>


                     </div> 
                 </form>
                 </div>   
                
                
                 <div class="ILB_Str">
                 <form action="?mode=createf" method="POST">

                     <input type="hidden" name="BtlId" value ="{BtlId}">     

                     <div class="NLB_Chekbox"><input type="checkbox" name="c1" /></div>

                     <a href="?mode=createf&BtlId={BtlId}"></a> 

                     <div class="ILB_User">
                         {ImgLink1}
                     </div>
                     <div class="ILB_User">
                         {ImgLink2}
                     </div>
                     <input  type="submit" class="NLB_User2" value="Принять вызов" name="AcceptBattle"> 

                     <div class="ILB_Title">
                         <div class="ILB_TitleStr">
                          <span class="ILB_TitleStrSpanLeft"><h3>{Title}</h3></span>

                         </div>

                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{CreateDate}</span>


                         </div>

                         <div class="ILB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{ImgUser}</span>
                             <span class="ILB_TitleStrSpanLeft">{NikName}</span>
                         </div>
                         <div class="NLB_TitleStr">
                             <span class="ILB_TitleStrSpanLeft">{ImgChet}</span>
                             <span class="ILB_TitleStrSpanLeft">{Chet}</span>
                         </div>


                     </div> 
                 </form>
                 </div>        
                
                <hr>
                <div style="text-align: center"><h2>Ещё...</h2></div>
                <input type="button" class="ButtonProfile" value="Еще" name="SaveNBT" id="SaveNBT" onClick = "SaveNBT()">
                
            </div>
        </div>-->
    
  
<!--        <div class="DivDual">
            <h2>Коментарии:</h2>
            <div class="ILB_Str">
                <img class="ImgAvatar" src="../images/photo.png"/>                    
            </div>

            <div class="ILB_Str">
                <img class="ImgAvatar" src="../images/photo.png"/>                    
            </div>

            <div class="ILB_Str">
                <img class="ImgAvatar" src="../images/photo.png"/>                    
            </div>

            <div class="ILB_Str">
                <img class="ImgAvatar" src="../images/photo.png"/>                    
            </div>   
            
            
        </div>-->
        
        
        
<!--<div class="DivDual">
    
    <h2>Похожие поединки:</h2>
    
    <div class="NLB_Str">
    <form action="?mode=createf" method="POST">

        <input type="hidden" name="BtlId" value ="{BtlId}">     

        <div class="NLB_Chekbox"><input type="checkbox" name="c1" /></div>

        <a href="?mode=createf&BtlId={BtlId}"></a> 

        <div class="NLB_User">
            {ImgLink1}
        </div>
        <div class="NLB_User">
            {ImgLink2}
        </div>

        <div class="NLB_Title">
            <div class="NLB_TitleStr">
             <span class="NLB_TitleStrSpanLeft"><h3>{Title}</h3></span>

            </div>

            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{CreateDate}</span>


            </div>

            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{ImgUser}</span>
                <span class="NLB_TitleStrSpanLeft">{NikName}</span>
            </div>
            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{ImgChet}</span>
                <span class="NLB_TitleStrSpanLeft">{Chet}</span>
            </div>


        </div> 
    </form>
    </div>     
    
    <div class="NLB_Str">
    <form action="?mode=createf" method="POST">

        <input type="hidden" name="BtlId" value ="{BtlId}">     

        <div class="NLB_Chekbox"><input type="checkbox" name="c1" /></div>

        <a href="?mode=createf&BtlId={BtlId}"></a> 

        <div class="NLB_User">
            {ImgLink1}
        </div>
        <div class="NLB_User">
            {ImgLink2}
        </div>

        <div class="NLB_Title">
            <div class="NLB_TitleStr">
             <span class="NLB_TitleStrSpanLeft"><h3>{Title}</h3></span>

            </div>

            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{CreateDate}</span>


            </div>

            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{ImgUser}</span>
                <span class="NLB_TitleStrSpanLeft">{NikName}</span>
            </div>
            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{ImgChet}</span>
                <span class="NLB_TitleStrSpanLeft">{Chet}</span>
            </div>


        </div> 
    </form>
    </div> 
    
    <div class="NLB_Str">
    <form action="?mode=createf" method="POST">

        <input type="hidden" name="BtlId" value ="{BtlId}">     

        <div class="NLB_Chekbox"><input type="checkbox" name="c1" /></div>

        <a href="?mode=createf&BtlId={BtlId}"></a> 

        <div class="NLB_User">
            {ImgLink1}
        </div>
        <div class="NLB_User">
            {ImgLink2}
        </div>

        <div class="NLB_Title">
            <div class="NLB_TitleStr">
             <span class="NLB_TitleStrSpanLeft"><h3>{Title}</h3></span>

            </div>

            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{CreateDate}</span>


            </div>

            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{ImgUser}</span>
                <span class="NLB_TitleStrSpanLeft">{NikName}</span>
            </div>
            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{ImgChet}</span>
                <span class="NLB_TitleStrSpanLeft">{Chet}</span>
            </div>


        </div> 
    </form>
    </div> 


    
    <div class="NLB_Str">
    <form action="?mode=createf" method="POST">

        <input type="hidden" name="BtlId" value ="{BtlId}">     

        <div class="NLB_Chekbox"><input type="checkbox" name="c1" /></div>

        <a href="?mode=createf&BtlId={BtlId}"></a> 

        <div class="NLB_User">
            {ImgLink1}
        </div>
        <div class="NLB_User">
            {ImgLink2}
        </div>

        <div class="NLB_Title">
            <div class="NLB_TitleStr">
             <span class="NLB_TitleStrSpanLeft"><h3>{Title}</h3></span>

            </div>

            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{CreateDate}</span>


            </div>

            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{ImgUser}</span>
                <span class="NLB_TitleStrSpanLeft">{NikName}</span>
            </div>
            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{ImgChet}</span>
                <span class="NLB_TitleStrSpanLeft">{Chet}</span>
            </div>


        </div> 
    </form>
    </div> 
    
    <div class="NLB_Str">
    <form action="?mode=createf" method="POST">

        <input type="hidden" name="BtlId" value ="{BtlId}">     

        <div class="NLB_Chekbox"><input type="checkbox" name="c1" /></div>

        <a href="?mode=createf&BtlId={BtlId}"></a> 

        <div class="NLB_User">
            {ImgLink1}
        </div>
        <div class="NLB_User">
            {ImgLink2}
        </div>

        <div class="NLB_Title">
            <div class="NLB_TitleStr">
             <span class="NLB_TitleStrSpanLeft"><h3>{Title}</h3></span>

            </div>

            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{CreateDate}</span>


            </div>

            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{ImgUser}</span>
                <span class="NLB_TitleStrSpanLeft">{NikName}</span>
            </div>
            <div class="NLB_TitleStr">
                <span class="NLB_TitleStrSpanLeft">{ImgChet}</span>
                <span class="NLB_TitleStrSpanLeft">{Chet}</span>
            </div>


        </div> 
    </form>
    </div>   
 
   
    
</div>                     -->

              
        
</article>
<?php Footer()?> 
    
<script language="javascript" type="text/javascript">

function NextBtl(){

    var NextBtl = $('#NextBtl').val();
    
    $.ajax({
        type: "POST",
        url: "?mode=indexp",
        data: {NextBtl:NextBtl}
    }).done(function( result )
        {
            $("#DivOneBtl").html(result);
        });
} 
</script>
    
</body>
</html>




                  
    
    
