<?php 
AcessKabinet();
Head("ILikeit",1)?>

<body>

<?php Menu(1)?> 
    
  
<article>
    <?php 
    
    $BtlId = 0;
    $P1 = 0;
    
    if(isset($_POST['BtlId'])) {
        $BtlId = $_POST['BtlId'];   
    }
    if(isset($_GET['BtlId'])) {    
       $BtlId = $_GET['BtlId'];
    }    
    
    InputCeateBattles($db_connect, $BtlId);
  
    ?> 

    
   
    
</article>  

    
    <?php Footer()?> 
    
<script language="javascript" type="text/javascript">

// Изменение типа битвы
function TypeBtl(TypeContent){

    var NewBtlId = $('#NewBtlId').val();

    $.ajax({
        type: "POST",
        url: "?mode=create",
        data: {TypeContent:TypeContent, NewBtlId:NewBtlId}
    }).done(function( result )
        {
            $("#DivDual").html(result);
        });
}   



function UpdateLink1() {

    var UpdateLink = $('#UpdateLink1').val();
    var Link = $('#Link1').val();
    var Prefix = 1;

    $.ajax({
        type: "POST",
        url: "?mode=create",
        data: {UpdateLink:UpdateLink, Link:Link, Prefix:Prefix}
    }).done(function( result )
        {
            $("#MsgUpdateLink1").html(result);
        });
} 
        
function UpdateLink2() {

    var UpdateLink = $('#UpdateLink2').val();
    var Link = $('#Link2').val();
    var Prefix = 2;

    $.ajax({
        type: "POST",
        url: "?mode=create",
        data: {UpdateLink:UpdateLink, Link:Link, Prefix:Prefix}
    }).done(function( result )
        {
            $("#MsgUpdateLink2").html(result);
        });
}         
        

function UpdateLinkVideo(Prefix) {
    //Варианты входа
    //<iframe width="398" height="224" src="" frameborder="0" allowfullscreen></iframe>
    //https://www.youtube.com/watch  ?v=1oTx6T-XlYM
    //https://youtu.be               /1oTx6T-XlYM
    
    //Выход
    //https://www.youtube.com/embed/1oTx6T-XlYM?rel=0
    
    var LinkSrc = $('#FileNamwBtlUp'+Prefix).val();
    
    LinkSrc = LinkSrc.replace("</iframe>","");
    
    var arr = LinkSrc.split('/');
    var lastItem = arr[arr.length - 1];
    
    arr = lastItem.split('v=');
    lastItem = arr[arr.length - 1];
    
    arr = lastItem.split('?');
    var IdVideo= arr[0];
    
    LinkSrc = 'https://www.youtube.com/embed/'+IdVideo+'?rel=0';    
    var Link = '<iframe class="iframeYouTube" src="'+LinkSrc+'" frameborder="0" allowfullscreen></iframe> <input type="hidden" name="LinkFileServer'+Prefix+'" Id="LinkFileServer'+Prefix+'" value ="'+IdVideo+'">';   
        
    $("#MsgUpdateLink"+Prefix).html(Link);
    
}



function Delete() {

    var Delete = $('#Delete').val();
    var NewBtlId = $('#NewBtlId').val();

    $.ajax({
        type: "POST",
        url: "?mode=create",
        data: {Delete:Delete, NewBtlId:NewBtlId},
        success: function(result){   
 
            if (result == 200){
                document.location.href= "?mode=listuserbattles";
            }
        }
    });
}    

function SaveNBT(){

    var SaveNBT = $('#SaveNBT').val();
    var UserId = $('#UserId').val();
    var NewBtlId = $('#NewBtlId').val();
    var Title = $('#Title').val();
    var Link1 = $('#Link1').val();
    var Link2 = $('#Link2').val();   
    var LinkFile1 = $('#LinkFileServer1').val();
    var LinkFile2 = $('#LinkFileServer2').val();       
    var Tags = $('#Tags').val();
    var StatusBattle = $('#StatusBtl').val();
    var Text = $('#Text').val();
    var Day = $('#Day').val();
    var Stavka = $('#Stavka').val();
    var Category = $('#Category').val();
    var TypeBattle = $('#TypeBattle').val();
    var Type = $('#Type').val();

    $.ajax({
        type: "POST",
        url: "?mode=create",
        data: {SaveNBT:SaveNBT, UserId:UserId, Id:NewBtlId, Title:Title, Link1:Link1, Link2:Link2, Tags:Tags, StatusBattle:StatusBattle, Text:Text, Day:Day, Stavka:Stavka, Category:Category, TypeBattle:TypeBattle, Type:Type,
               LinkFile1:LinkFile1, LinkFile2:LinkFile2}
    }).done(function( result )
        {
            $("#MsgSaveNBT").html(result);
        });
}    

function PublicNBT(){

    var PublicNBT = $('#PublicNBT').val();
    var UserId = $('#UserId').val();
    var NewBtlId = $('#NewBtlId').val();
    var Title = $('#Title').val();
    var Link1 = $('#Link1').val();
    var Link2 = $('#Link2').val();
    var LinkFile1 = $('#LinkFileServer1').val();
    var LinkFile2 = $('#LinkFileServer2').val();       
    var Tags = $('#Tags').val();
    var StatusBattle = $('#StatusBtl').val();
    var Text = $('#Text').val();
    var Day = $('#Day').val();
    var Stavka = $('#Stavka').val();
    var Category = $('#Category').val();
    var TypeBattle = $('#TypeBattle').val();
    var Type = $('#Type').val();

    $.ajax({
        type: "POST",
        url: "?mode=create",
        data: {PublicNBT:PublicNBT, UserId:UserId, Id:NewBtlId, Title:Title, Link1:Link1, Link2:Link2, Tags:Tags, StatusBattle:StatusBattle, Text:Text, Day:Day, Stavka:Stavka, Category:Category, TypeBattle:TypeBattle, Type:Type, 
               LinkFile1:LinkFile1, LinkFile2:LinkFile2},
        success: function(result){

            if (result == 200){
                document.location.href= "?mode=waitf";
            }
            else {
                $("#MsgSaveNBT").html(result);
            }
        }

    });
}  
  

function DelFile1(){

    var DelFile = $('#DelFile1').val();
    var Prefix = 1;
    var NewBtlId = $('#NewBtlId').val();
    var UserId = $('#UserId').val();

    $.ajax({
        type: "POST",
        url: "?mode=create",
        data: {DelFile:DelFile, Prefix:Prefix, NewBtlId:NewBtlId, UserId:UserId}
    }).done(function( result )
        {
            $("#MsgUpdateLink1").html(result);
        });
} 
  
function DelFile2(){

    var DelFile = $('#DelFile2').val();
    var Prefix = 2;
    var NewBtlId = $('#NewBtlId').val();
    var UserId = $('#UserId').val();

    $.ajax({
        type: "POST",
        url: "?mode=create",
        data: {DelFile:DelFile, Prefix:Prefix, NewBtlId:NewBtlId, UserId:UserId}
    }).done(function( result )
        {
            $("#MsgUpdateLink2").html(result);
        });
} 


function RotateLeft(Prefix){

    var UserId = $('#UserId').val();
    var BtlId = $('#NewBtlId').val();
    
    $("#Btl_Img"+Prefix).attr("src","../images/loading4х3.gif");

    $.ajax({
        type: "POST",
        url: "?mode=create",
        data: {Rotate:1, UserId:UserId, degres:90, Prefix:Prefix, BtlId:BtlId}
    }).done(function( result )
        {
         
            $("#MsgUpdateLink"+Prefix).html(result);
             
        });
} 

function RotateRight(Prefix){

    var UserId = $('#UserId').val();
    var BtlId = $('#NewBtlId').val();
    
    $("#Btl_Img"+Prefix).attr("src","../images/loading4х3.gif");

    $.ajax({
        type: "POST",
        url: "?mode=create",
        data: {Rotate:1, UserId:UserId, degres:270, Prefix:Prefix, BtlId:BtlId}
    }).done(function( result )
        {
         
            $("#MsgUpdateLink"+Prefix).html(result);
             
        });
} 




$("form#data1").submit(function(event){
 
//    var src = $("#Avatar200").attr("src"); 
    $("#Btl_Img1").attr("src","../images/loading4х3.gif");


    //disable the default form submission
    event.preventDefault();
    //grab all form data  
    var formData = new FormData($(this)[0]);



    $.ajax({
      url: '?mode=create',
      type: 'POST',
      data: formData,
      async: true,
      cache: false,
      contentType: false,
      processData: false,
      success: function (result) {

        $("#MsgUpdateLink1").html(result);


      }
    });

    return false;
});
  
$("form#data2").submit(function(event){
 
    $("#Btl_Img2").attr("src","../images/loading4х3.gif");    

 
    //disable the default form submission
    event.preventDefault();

    //grab all form data  
    var formData = new FormData($(this)[0]);

    $.ajax({
      url: '?mode=create',
      type: 'POST',
      data: formData,
      async: true,
      cache: false,
      contentType: false,
      processData: false,
      success: function (result) {
        $("#MsgUpdateLink2").html(result);
      }
    });

    return false;
});  
  

$(document).ready( function() {
            
    $("#FileBtlUp1").change(function(){

        var filename = $(this).val().replace(/.*\\/, "");
        $(".FileNamwBtlUp1").val(filename);
    });
    
     $("#FileBtlUp2").change(function(){

        var filename = $(this).val().replace(/.*\\/, "");
        $(".FileNamwBtlUp2").val(filename);
    });   
    
    
});


    </script>
    </body>
</html>


<!--<iframe src="//youtube.com/embed/wXGPcphm00s?html5=1" width="410px" height="226px" frameborder="0" allowfullscreen="true" class="how-it-looks-like-frame" style="left: 218px; top: 233px; position: absolute;"></iframe>-->



<!-- для проверки адресов электронной почты -->
<!--<input type="text" title="электронный адрес" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" />-->

<!-- для паролей -->
<!--<input type="text" title="по крайней мере восемь символов, содержащих хотя бы одну цифру, один символ нижнего и верхнего регистра" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />-->

<!-- для проверки телефонного номера -->
<!--<input type="text" required pattern="(\+?\d[- .]*){7,13}" title="интернациональный, национальный или местный номер телефона"/>-->