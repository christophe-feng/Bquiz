<!-- 可以從front的regs複製過來再做修改 -->
<!-- 順序和regs的不同，要做調整：帳號→密碼→姓名→電子信箱→地址→電話 -->
<h2 class="ct">編輯會員資料</h2>
<?php
$user = $Mem->find($_GET['id']);
?>
<form action="api/regs.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <?= $user['acc']; ?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp">
                <?= $user['pw']; ?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp">
                <input type="text" name="name" id="name" value="<?= $user['name']; ?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp">
                <input type="text" name="email" id="email" value="<?= $user['email']; ?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">地址</td>
            <td class="pp">
                <input type="text" name="address" id="address" value="<?= $user['address']; ?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp">
                <input type="text" name="tel" id="tel" value="<?= $user['tel']; ?>">
            </td>
        </tr>
    </table>
    <div class="ct">
        <!-- 要新增input:hidden以利將id傳送至後端做處理 -->
        <input type="hidden" name="id" value="<?= $user['id']; ?>">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
        <input type="button" value="取消" onclick="location.href='?do=mem'">
    </div>
</form>