<fieldset>
    <legend>會員登入</legend>
    <form action="./api/chk_pw.php" method="post">
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
    </form>
</fieldset>

<script>
    // function不熟悉
    function login() {
        let user = {
            acc: $("#acc").val(),
            pw: $("#pw").val()
        }

        // 非同步執行
        // 檢察帳號
        $.get("api/chk_acc.php", user, (chkacc) => {
            if (!parseInt(chkacc)) {
                alert("查無帳號");
                return;
            }

            // 檢查密碼
            $.get("api/chk_pw.php", user, (chkpw) => {
                if (!parseInt(chkpw)) {
                    alert("密碼錯誤");
                    return;
                }

                // 登入後的導向邏輯
                // if(user.acc=='admin'){
                //     location.href='back.php';
                // }else{
                //     location.href='index.php';
                // }
                location.href = (user.acc === 'admin') ? "back.php" : "index.php";
            })
        })
    }
</script>