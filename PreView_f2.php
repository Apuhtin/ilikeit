<?php Head("Like | Ожидание соперника")?>

<body>

<?php Menu(1)?> 
                   
    <article>  
    <div class="DivDual">

        <h1>Что вкуснее?</h1>


        <div class="DivDualBlock">
           
            <div class="DivDualImg">                
                <div class="DivDualImgBr">
                    <img class="ImgDual" src="../images/img1.jpg" title="Рисунок 1" />
                </div>                         
            </div> 
            <div>
                <img class="ImgAvatar" src="../images/photo.png"/>
                <div class="DivAvatarName">
                    <p>Иванов Иван Иванович</p>                       
                </div> 

                <!--<img class="ImgPlus" src="../images/plus2.png"/>-->

                    <a href="#">
<!--                        <img class="ImgPlus" src="../images/plus7_3.png"  
                        onmouseover="this.src='../images/plus7_2.png'" 
                        onmouseout="this.src='../images/plus7_3.png'" />-->
                    </a>


            </div>

        </div>


        <div class="DivDualBlock">
      
            <div class="DivDualImg">
                <div class="DivDualImgBr">
                    <!--<img class="ImgDual" src="../images/nofotob.png" title="Рисунок 2" />-->
                </div>
            </div>  
            <div>
                <img class="ImgAvatar" src="../images/photo.png"/>
                <div class="DivAvatarName">
                    <!--<p>Петров Петр Петрович</p>-->

                </div> 
<!--                    <a href="#">
                        <img class="ImgPlus" src="../images/plus7_3.png"  
                        onmouseover="this.src='../images/plus7_2.png'" 
                        onmouseout="this.src='../images/plus7_3.png'" />
                    </a>-->
            </div>
        </div>


    </div>        

        
  
        
         
        <?php ReadNewBattle($db_connect, $_SESSION['Id_NB'])?>
        
        
              
    </div>
    </article>  
    <?php Footer()?> 
    </body>
</html>
