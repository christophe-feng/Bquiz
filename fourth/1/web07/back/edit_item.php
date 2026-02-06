<h2 class="ct">修改商品</h2>
<form action="api/save_item.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
                <select type="big" name="big" id="big"></select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp">
                <select type="text" name="mid" id="mid">
                </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp">完成分類後自動分配</td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp"><input type="text" name="name" id="name"></td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp"><input type="text" name="price" id="price"></td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp"><input type="text" name="spec" id="spec"></td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp"><input type="text" name="stock" id="stock"></td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp"><input type="file" name="img" id="img"></td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp"><textarea type="text" name="intro" id="intro"></td>
    </tr>
</table>

<div class="ct">
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="submit" value="修改">
    <input type="reset" value="重置">
    <input type="button" value="返回">
</div>
</form>

<script>
    getType('big')

    $("#big").on('change',function(){
        getType('mid');
    })

    function getTypes(type){
    switch(type){
        case "big":
            $.get("api/get_bigs.php",(bigs)=>{
            $("#bigs").html(bigs);
            getTypes('mid');
            })
        break;
        case "mid":
            let big_id=$("#big").val();
            $.get("api/get_mids.php",{big_id},(mids)=>{
                $("#mid").html(mids);
            })
        break;
        }
    }
</script>