<!-- 不需要使用form表單 -->
<fieldset>
    <legend>忘記密碼</legend>
    <div>請輸入信箱以查詢密碼</div>
    <div>
        <input type="text" name="email" id="email">
    </div>
    <!-- 直接在div裡面設id即可 -->
    <div id="result"></div>
    <div>
        <input type="button" value="尋找" onclick="forgot()">
    </div>
</fieldset>

<script>
    // 還不熟悉
    function forgot() {
        let email = $("#email").val();
        // 這裡要用get
        $.get("./api/chk_email.php", {
            email
        }, (res) => {
            $("#result").text(res);
        })
    }
</script>