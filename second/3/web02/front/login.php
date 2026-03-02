<form action="" method="post">
    <fieldset>
        <legend>會員登入</legend>
        <table>
            <tr>
                <td>帳號</td>
                <td>
                    <input type="text" name="acc" id="acc" value="">
                </td>
            </tr>
            <tr>
                <td>密碼</td>
                <td>
                    <input type="password" name="pw" id="pw" value="">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="button" value="登入" onclick="login()">
                    <input type="reset" value="清除">
                </td>
                <td>
                    <a href="?do=forgot">忘記密碼</a>
                    <a href="?do=reg">尚未註冊</a>
                </td>
            </tr>
        </table>
    </fieldset>
</form>