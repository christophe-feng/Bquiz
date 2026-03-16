<fieldset>
    <legend>忘記密碼</legend>
    <!-- <form action="./api/chk_email.php" method="post"> -->
        <div>請輸入信箱以查詢密碼</div>
        <div>
            <input type="text" name="email" id="email" required>
        </div>
        <div id="result">
            <!-- 回傳訊息 -->
            <?php
            // if(isset($_GET['res'])) echo $_GET['res']; 
            ?>
        </div>
        <div>
            <input type="button" value="尋找" onclick="forgot()">
            <!-- <input type="submit" value="尋找"> -->
        </div>
    <!-- </form> -->
</fieldset>

<script>
    function forgot() {
        let email = $("#email").val();
        $.get("./api/chk_email.php", {
            email
        }, (res) => {
            $("#result").text(res);
        })
    }
</script>