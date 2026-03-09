<!-- 可以從ad複製過來 -->
<div class="cent">新增最新消息資料</div>
<hr>
<form action="./api/insert.php?table=<?= $_GET['table']; ?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>最新消息資料：</td>
            <td>
                <!-- 這裡要用textarea -->
                <textarea name="text" id="" style="width: 100%;height: 100%;"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="新增">
                <input type="reset" value="重置">
            </td>
            <td></td>
        </tr>
    </table>
</form>