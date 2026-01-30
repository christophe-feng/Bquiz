<?php include_once "../api/db.php";
$movie = $Movie->find($_GET['movidId']);

?>
<style>
    #box {
        width: 540px;
        height: 370px;
        margin: auto;
        background-image: url('../icon/03D04.png');
        background-size: cover;
        padding-top: 18px;
        box-sizing: border-box;
    }

    .seats {
        width: 325px;
        height: 348px;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
    }

    .seat {
        width: 65px;
        height: 87px;
        box-sizing: border-box;
        padding: 3px;
        text-align: center;
        position: relative;
    }

    .chk {
        position: absolute;
        bottom: 5px;
        right: 5px;
    }

    .booked {
        background-image: url('../icon/03D03.png');
        background-position: center;
        background-size: no-repeat;
    }

    .null {
        background-image: url('../icon/03D02.png');
        background-position: center;
        background-size: no-repeat;
    }
</style>

<div id="box">
    <div class="seats">
        <?php
        for ($i = 0; $i < 20; $i++) {
            echo "<div class='seat null'>";
            echo floor($i / 5) + 1 . "排" . ($i % 5 + 1) . "號";

            echo "<input type='checkbox' value='$i' class='chk'>";
            echo "</div>";
        }
        ?>
    </div>
</div>


<div style="width:540px;margin:auto;background:#ccc;padding:10px;">
    <div style="width:70%;margin:auto">
        <div style="margin: 5px 0">您選擇的電影是：<?= $movie['name']; ?></div>
        <div style="margin: 5px 0">您選擇的時刻是：<?= $_GET['date']; ?> <?= $duration[$_GET['session']]; ?></div>
        <div style="margin: 5px 0">您已經勾選<span id='tickets'></span>張票，最多可以購買張票</div>
    </div class="ct">
    <button class="prev-step">上一步</button>
    <button class="order-btn">訂購</button>
</div>

<script>
    let seats = new Array();

    $(".chk").on('click', function() {
        let seat = $(this).val();
        if ($(this).prop('checked')) {
            //加到陣列
            if (seats.length < 4) {
                seats.push(seat)
            } else {
                alert("最多只能勾選四張票")
                $(this).prop('checked', false)
            }

        } else {
            //移除陣列
            seats.splice(seats.indexOf(seat), 1)
        }
        $('#tickets').text(seats.length)
        // console.log(seats)
    })

    $(".order-btn").on("click", function() {
        let movie=$("#movie").val();
        let date=$("#date").val();
        let session=$("#session").val();
        $("api/order.php", {seats,movie,date,session}, (res) => {
            // console.log(seats,movie,date,session)
            // console.log(res)

            $("#orderResult").html(res);
            
            $("#booking").hide();
            $("#orderForm").hide();
            $("#orderResult").show();
        })
    })
</script>