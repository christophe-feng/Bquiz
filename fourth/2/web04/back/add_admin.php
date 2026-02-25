<h2 class="ct">新增管理帳號</h2>
<!-- form:post>table.all>tr*2>td.tt.ct+td.pp>input:text -->
<form action="api/save_admin.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <input type="acc" name="acc">
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp">
                <input type="password" name="pw">
            </td>
        </tr>
        <!-- tr>td.tt.ct+td.pp>div*5>input:checkbox -->
        <tr>
            <td class="tt ct">權限</td>
            <td class="pp">
                <div><input type="checkbox" name="pr[]" value="1">商品分類與管理</div>
                <div><input type="checkbox" name="pr[]" value="2">訂單管理</div>
                <div><input type="checkbox" name="pr[]" value="3">會員管理</div>
                <div><input type="checkbox" name="pr[]" value="4">頁尾版權管理</div>
                <div><input type="checkbox" name="pr[]" value="5">最新消息管理</div>
            </td>
        </tr>
    </table>
    <!-- .ct>input:submit+input:reset -->
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>