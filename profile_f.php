<?php 
AcessKabinet();
Head("ILikeit")?>

<body>

<?php Menu(1)?> 
     
    <article>        
     
    <?php 
    if(isset($_SESSION['UserId'])) {
        InputProfile($db_connect, $_SESSION['UserId']);
    }
            
    ?>   
           
    </article>  
    <?php Footer()?> 
      
    <script language="javascript" type="text/javascript">
    
    function SaveUser(){
        var UserId = $('#UserId').val();
        var NikName = $('#NikName').val();
        var Name = $('#Name').val();
        var LastName = $('#LastName').val();
        var SecondName = $('#SecondName').val();
        var Sex = $('#Sex').val();
        var Lang = $('#Lang').val();
        var SaveUser = $('#SaveUser').val();

        $.ajax({
            type: "POST",
            url: "?mode=profile",
            data: {SaveUser:SaveUser, UserId:UserId, NikName:NikName, Name:Name, LastName:LastName, SecondName:SecondName, Sex:Sex, Lang:Lang}
        }).done(function( result )
            {
                $("#msgSaveUser").html(result);
            });
    }
 
    function SaveContact(){
        var UserId = $('#UserId').val();
        var Tel = $('#Tel').val();
        var Skype = $('#Skype').val();
        var ISQ = $('#ISQ').val();
        var SaveContact = $('#SaveContact').val();
        

        $.ajax({
            type: "POST",
            url: "?mode=profile",
            data: {SaveContact:SaveContact, UserId:UserId, Tel:Tel, Skype:Skype, ISQ:ISQ }
        }).done(function( result )
            {
                $("#msgSaveContact").html(result);
            });
    }    
      
    function SaveMessage(){
        var UserId = $('#UserId').val();
        var MessageEmal = $('#MessageEmal').val();
        var SaveMessage = $('#SaveMessage').val();
        

        $.ajax({
            type: "POST",
            url: "?mode=profile",
            data: {UserId:UserId, MessageEmal:MessageEmal, SaveMessage:SaveMessage}
        }).done(function( result )
            {
                $("#msgSaveMessage").html(result);
            });
    }    
    
    function SavePassword(){
        var UserId = $('#UserId').val();
        var pass = $('#pass').val();
        var pass2 = $('#pass2').val();

        $.ajax({
            type: "POST",
            url: "?mode=recovery2",
            data: {UserId:UserId, pass:pass, pass2:pass2}
        }).done(function( result )
            {
                $("#msgSavePassword").html(result);
            });
    }     
    
function DelFile(){

    var DelFile = $('#DelFile').val();
    var UserId = $('#UserId').val();

    $("#MsgTxt").html("");

    $.ajax({
        type: "POST",
        url: "?mode=profile",
        data: {DelFile:DelFile, UserId:UserId}
    }).done(function( result )
        {
         
             $("#msgImgAvatar").html(result);

        });
} 
    
function RotateLeft(){

    var UserId = $('#UserId').val();
    $("#Avatar200").attr("src","../images/loading0.gif");
    $("#MsgTxt").html("");

    $.ajax({
        type: "POST",
        url: "?mode=profile",
        data: {Rotate:1, UserId:UserId, degres:90}
    }).done(function( result )
        {
         
             $("#msgImgAvatar").html(result);
             
        });
} 

function RotateRight(){

    var UserId = $('#UserId').val();

    $("#Avatar200").attr("src","../images/loading0.gif");
    $("#MsgTxt").html("");

    $.ajax({
        type: "POST",
        url: "?mode=profile",
        data: {Rotate:1, UserId:UserId, degres:270}
    }).done(function( result )
        {
         
             $("#msgImgAvatar").html(result);
             
        });
}

  
$("form#data1").submit(function(event){
 
    var src = $("#Avatar200").attr("src"); 
    $("#Avatar200").attr("src","../images/loading0.gif");
    
    //отмена действия браузера
    event.preventDefault();
    //grab all form data  
    var formData = new FormData($(this)[0]);
    $("#MsgTxt").html("");


    $.ajax({
    url: '?mode=profile',
    type: 'POST',
    data: formData,
    async: true,
    cache: false,
    contentType: false,
    processData: false,
    success: function (result) {

            arr = result.split(',');

            if (arr[0] == 100) {
                $("#MsgTxt").html(arr[1]);   
                $("#Avatar200").attr("src",src);
            } 
            else {
                $("#msgImgAvatar").html(arr[1]);
            }        

    }
    });

    return false;
});    


$(document).ready( function() {
    $(".file-upload input[type=file]").change(function(){
        var filename = $(this).val().replace(/.*\\/, "");
        $("#FileNamwProfileUp").val(filename);
    });
});

    
    </script>    
     
    </body>
</html>


<!-- для проверки адресов электронной почты -->
<!--<input type="text" title="электронный адрес" required pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" />-->

<!-- для паролей -->
<!--<input type="text" title="по крайней мере восемь символов, содержащих хотя бы одну цифру, один символ нижнего и верхнего регистра" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" />-->

<!-- для проверки телефонного номера -->
<!--<input type="text" required pattern="(\+?\d[- .]*){7,13}" title="интернациональный, национальный или местный номер телефона"/>-->