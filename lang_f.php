 <?php Head("ILikeit")?>

<body>
    
    <?php Menu(5)?>       
    <article>        
        <div class="FormGroup">
            <!--<form action="?mode=recovery" method="POST" id="login_in">-->
            <h1><?php  echo $GLOBALS['Dict']['Lang_Title']; ?></h1>

            <div class="DivHr">
                <hr>
            </div> 
            
            <div class="FormElementsLang">
                <a href="?mode=index&Lang=En">
                    <div class="ColImgLang">
                        <img class="ImgLang" src="../Lang/En/En.png"/> 		
                    </div>
                    <div class="ColInputLang">                                                       
                        United Kingdom - English
                    </div>
                </a>                
            </div>
                       
            <div class="FormElementsLang">
                <a href="?mode=index&Lang=Ru">
                    <div class="ColImgLang">
                        <img class="ImgLang" src="../Lang/Ru/Ru.png"/> 		
                    </div>
                    <div class="ColInputLang">                                                       
                        Россия - Русский
                    </div> 
                </a> 
            </div>            
                         

        </div>         

        
    </article>  
     
    <?php Footer()?> 
  
    
    </body>
</html>

