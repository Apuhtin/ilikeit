
<div class="NLB_Str">
    <form action="?mode=createf" method="POST">
    
    <input type="hidden" name="BtlId" value ="{BtlId}">     

    <!--<div class="NLB_Chekbox"><input type="checkbox" name="c1" /></div>-->

    <!--<a href="?mode=createf&BtlId={BtlId}"></a>--> 
    
    <a href="?mode=index&Id={BtlId}" title="Перейти">
        <div class="NLB_User">
            {ImgLink1}
        </div>
        <div class="NLB_User">
            {ImgLink2}
        </div>
    </a>
    <!--<input  type="submit" class="NLB_User2" value="Принять вызов" name="AcceptBattle">--> 

    <div class="NLB_Title">
        <div class="NLB_TitleStr">
            <span class="NLB_TitleStrSpanLeft"><h3>{Title}</h3></span>
            <span class="NLB_TitleStrSpanRight">
                {ImgPublic}
            </span>
        </div>

        <div class="NLB_TitleStr">
            <span class="NLB_TitleStrSpanLeft">{CreateDate}</span>

            <span class="NLB_TitleStrSpanRight" id="NLB_ImgChet">
                {ImgChet}
            </span>
            <span class="NLB_TitleStrSpanRight" id="NLB_Chet">{Chet} </span>
        </div>

        <div class="NLB_TitleStr">

        </div>

        <input type="submit" class="ButtonListBtl" value="Изменить" name="EditNBT" id="SaveNBT">


    </div> 
    </form>
</div>
































