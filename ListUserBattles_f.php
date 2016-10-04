<?php Head("ILikeit")?>

<body>

<?php Menu(1)?> 
                   
    <article>  
           
    <?php 
    
    if(isset($_GET['Page'])){
        $Page = $_GET['Page'];
    }
    else{
        $Page = 1;
    }
    
    
    if(isset($_SESSION['UserId'])) {
        $UserId = $_SESSION['UserId'];   
        ReadListUserBattle($db_connect, $UserId, $Page);
    }
             
    ?>         
      
       
    </article>  
    <?php Footer()?> 
    </body>
</html>
