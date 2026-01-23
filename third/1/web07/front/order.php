<div id="orderForm">
    <h3 class="ct">線上訂票</h3>
    <style>
        #orderList {
            margin: auto;
            width: 500px;
            text-align: left;
            padding: 20px;
            background: #eee;
        }
    </style>
    <form action="">
        <table id="orderList">
            <tr>
                <td>電影：</td>
                <td>
                    <select name="movie" id="movie">
                        <?php
                        $today = date("Y-m-d");
                        $ondate = date("Y-m-d", strtotime("-2 days"));
                        $movies = $Movie->all(" where `sh`=1 && `ondate` between '$ondate' AND '$today'");
                        foreach ($movies as $movie) {
                            $selected = (!empty($id) && $id == $movie['id']) ? "selected" : "";
                            echo "<option value='{$movie['id']}'$selected>{$movie['name']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>日期：</td>
                <td>
                    <select name="date" id="date"></select>
                </td>
            </tr>
            <tr>
                <td>場次：</td>
                <td>
                    <select name="session" id="session"></select>
                </td>
            </tr>
        </table>

        <div class="ct">
            <button type="button" class="send-order">確定</button>
            <button class="reset">重置</button>
        </div>
</div>
</form>
<div id="booking" style="display: none;">
    劃位
    <button class="prev-step">上一步</button>
    <button class="order-btn">訂購</button>
</div>
<div id="orderResult" style="display: none;">
    結果
</div>

<script>
    $("#movie").on("change", function() {
        let movieId = $(this).val();
        selectDate(movieId);
    })

    $("#date").on("change", function() {
        selectSession();
    })

    selectDate($("#movie").val());

    $(".send-order").on("click", function() {
        $("#booking").show();
        $("#orderForm").hide();
        $("#orderResult").hide();

        let movieId=$("#movie").val();
        let date=$("#date").val();
        let session=$("#session").val();

        $.get("front/booking.php", {movieId,date,session},(booking) => {
            $("#booking").html(booking);
            
            $(".prev-step").on("click", function() {
                $("#booking").hide();
                $("#orderForm").show();
                $("#orderResult").hide();
            })

            $(".order-btn").on("click", function() {
                $("#booking").hide();
                $("#orderForm").hide();
                $("#orderResult").show();
            })
        })
    })


    function selectDate(movieId) {
        $.get("api/get_dates.php", {
            movieId
        }, function(dates) {
            $("#date").html(dates);
        })
    }

    function selectSession() {
        let movieId = $("#movie").val();
        let data = $("#date").val();
        $.get("api/get_sessions.php", {
            movieId,
            date
        }, function(session) {
            $("#session").html(sessions);
        })
    }
</script>