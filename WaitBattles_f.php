<?php Head("Like | Ожидание соперника")?>

<body>

<?php Menu(1)?> 
                   
    <article>  
           
    <?php 
    
    
    if(isset($_SESSION['UserId'])) {
        $UserId = $_SESSION['UserId'];   
        ReadListUserBattle($db_connect, $UserId);
    }
      
    
       
    ?>         
        
        
<!--            <div class="NLB_Str">
                <form action="?mode=createf" method="POST">
                <a href="?mode=createf&BtlId=59"> 
                    
                <input type="hidden" name="BtlId" value ="71">     
                    
                <div class="NLB_Chekbox"><input type="checkbox" name="c1" /></div>
                    
                    
                <div class="NLB_User">
                    <img src="../images/img1.jpg" title="Рисунок 1"/>
                </div>
                <div class="NLB_User">
                    <img src="../images/img2.jpg" title="Рисунок 2"/>
                </div>
                <input  type="submit" class="NLB_User2" value="Принять вызов" name="AcceptBattle"> 
    
                <div class="NLB_Title">
                    <div class="NLB_TitleStr">
                        <span class="NLB_TitleStrSpanLeft"><h3>Что вкуснее? </h3></span>
                        <span class="NLB_TitleStrSpanRight">
                            <img src="../images/eye.png" title="Опубликовано" />
                        </span>
                    </div>
                    
                    <div class="NLB_TitleStr">
                        <span class="NLB_TitleStrSpanLeft">14 июня 2016 21:30</span>
                        

                        
                        <span class="NLB_TitleStrSpanRight">
                            <img src="../images/check-box1.png" title="Проголосовало" />
                        </span>
                        <span class="NLB_TitleStrSpanRight">32`342`354 </span>
                    </div>
                    
                    <div class="NLB_TitleStr">

                    </div>
                                    
                    <input type="submit" class="ButtonListBtl" value="Изменить" name="EditNBT" id="SaveNBT">
                   

                </div> 
                </a>
                </form>
            </div>-->
            
 
              
    </article>  
    <?php Footer()?> 
    </body>
</html>
