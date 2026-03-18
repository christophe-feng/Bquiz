<!-- 可以從ad複製過來 -->
<div class="cent">新增管理者帳號</div>
<hr>
<form action="./api/save.php?table=<?= $_GET['table']; ?>" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>帳號：</td>
            <td>
                <input type="text" name="acc" id="">
            </td>
        </tr>
        <tr>
            <td>密碼：</td>
            <td>
                <input type="password" name="pw" id="">
            </td>
        </tr>
        <tr>
            <td>確認密碼：</td>
            <td>
                <!-- 題目沒有要驗證，所以name可以不用寫 -->
                <input type="password" name="" id="">
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