<style>
    .po-item{
        display: block;
        margin: 5px;
    }

    .nav{
        width: 20%;
        padding: 10px;
        vertical-align: top;
        display: inline-block;
    }

    .article{
        width: 70%;
        padding: 10px;
        display: inline-block;
    }

    .content{
        display: none;
    }
</style>

<div>
    目前位置：首頁 > 分類網誌 > <span id="nav">健康新知</span>
</div>
<fieldset class="nav">
    <legend>分類網誌</legend>
    <a href="#" class="po-item" data-type="1">健康新知</a>
    <a href="#" class="po-item" data-type="2">菸害防治</a>
    <a href="#" class="po-item" data-type="3">癌症防治</a>
    <a href="#" class="po-item" data-type="4">慢性病防治</a>
</fieldset>
<fieldset class="article">
    <legend>文章列表</legend>
    <div class="list"></div>
    <div class="content"></div>
</fieldset>

<script>
    getList(1);

    // 點擊左側選單 接受指令
    $(".po-item").on("click", function(){
        let item=$(this).text();
        $("#nav").text(item);
        let type=$(this).data('type');
        getList(type);
    })

    // 顯示文章列表
    function getList(type){
        $.get("./api/get_list.php",{type},(list)=>{
            $(".list").show();
            $(".list").html(list);
            $(".content").hide();
        })
    }

    // 顯示文章內容
    function getPost(id){
        $.get("./api/get_post.php",{id},(post)=>{
            $(".list").hide();
            $(".content").show();
            $(".content").html(post);
        })
    }
</script>