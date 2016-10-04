
<?php Head("ILikeit")?>
<!--dfd-->
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
                
        InputIndexBattles($db_connect, $IdBtl);
        InputIndexListBattle($db_connect, 0);
        
        ?>   
     
</div>
</article>
<?php Footer()?> 


<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="//yastatic.net/share2/share.js"></script>    
<script language="javascript" type="text/javascript">

function NextBtl(){

    var NextBtl = $('#NextBtl').val();
    
    $("#NextBtl").hide();
    $("#LoaderBtl").attr("display","block");
    $("#LoaderBtl").show();
   
    $.ajax({
        type: "POST",
        url: "?mode=indexp",
//        async: false,
        data: {NextBtl:NextBtl}
    }).done(function( result )
        {
            $("#DivOneBtl").html(result);
            $("#LoaderBtl").attr("display","none");
            $("#LoaderBtl").hide();
            $("#NextBtl").show();

        });
    }        
        
function SendComm(){
   
    var SendComm = $('#SendComm').val();
    var NewBtlId = $('#NewBtlId').val();
    var TexеCom = $('#TexеCom').val();
    
    $.ajax({
        type: "POST",
        url: "?mode=indexp",
        data: {BtlId:NewBtlId, TexеCom:TexеCom, SendComm:SendComm}
    }).done(function( result )
        {
            $("#DivOneComent").html(result);

        });        
}

function NextComment(){
   
    var NextComment = $('#NextComment').val();
    var NewBtlId = $('#NewBtlId').val();
    var PosComments = $('#PosComments').val();
    PosComments = Number(PosComments) + Number(1);
    
    $("#NextComment").hide();
    $("#LoaderComment").attr("display","block");
    $("#LoaderComment").show();
    
    $.ajax({
        type: "POST",
        url: "?mode=indexp",
        data: {BtlId:NewBtlId, NextComment:NextComment, PosComments:PosComments}
    }).done(function( result )
        {
            $('#DivOneComent').append(result);
            $('#DivOneComent').append($('#hrComm'));
            $('#DivOneComent').append($('#NextComment'));  
            $('#DivOneComent').append($('#LoaderComment')); 
            $('#PosComments').val(PosComments);          
            $('#DivOneComent').append($('#PosComments'));

            $("#LoaderComment").attr("display","none");
            $("#LoaderComment").hide();
            $("#NextComment").show();


        });        
}

function ButtonPlus1(){
    
    var ButtonPlus = $('#ButtonPlus1').val();
    var NewBtlId = $('#NewBtlId').val();
    var ChetBtl = $("#Chet1").html();
  
    $.ajax({
        type: "POST",
        url: "?mode=indexp",
        data: {ButtonPlus:ButtonPlus, BtlId:NewBtlId, ChetBtl:ChetBtl}
    }).done(function( result )
        {
            $("#DivText1").html(result);
            $("#BtnChet2").html('<div class="DivMinus"></div>');
        }); 
}

function ButtonPlus2(){
    
    var ButtonPlus = $('#ButtonPlus2').val();
    var NewBtlId = $('#NewBtlId').val();
    var ChetBtl = $("#Chet2").html();

    $.ajax({
        type: "POST",
        url: "?mode=indexp",
        data: {ButtonPlus:ButtonPlus, BtlId:NewBtlId, ChetBtl:ChetBtl}
    }).done(function( result )
        {
            $("#DivText2").html(result);
            $("#BtnChet1").html('<div class="DivMinus"></div>'); 
            
            
        }); 
}
</script>
    
</body>
</html>



    
