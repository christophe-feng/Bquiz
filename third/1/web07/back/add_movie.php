<h3 class="ct">新增院線片</h3>
<form action="./api/add_movie.php" method="post" enctype="multipart/form-data">
    <table style="width:70%;margin:auto">
        <tr>
            <td>影片資料</td>
            <td>
                <div>
                    <label for="">片名：</label>
                    <input type="text" name="name" id="">
                </div>
                <div>
                    <label for="">分級：</label>
                    <select name="level" id="">
                        <option value="1">普遍級</option>
                        <option value="2">輔導級</option>
                        <option value="3">保護級</option>
                        <option value="4">限制級</option>
                    </select>(請選擇分級)
                </div>
                <div>
                    <label>片長：</label>
                    <input type="text" name="length" id="">
                </div>
                <div>
                    <label for="">上映日期：</label>
                    <select name="year" id="">
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                    </select>年
                    <select name="month" id="">
                    <?php
                        for($i=1;$i<=12;$i++){
                            echo "<option value='$i'>$i</option>";
                        }
                    ?>
                    </select>月
                    <select name="day" id="">
                    <?php
                        for($i=1;$i<=31;$i++){
                            echo "<option value='$i'>$i</option>";
                        }
                    ?>
                    </select>日
                </div>
                <div>
                    <label for="">發行商：</label>
                    <input type="text" name="publisher" id="">
                </div>
                <div>
                    <label for="">導演：</label>
                    <input type="text" name="director" id="">
                </div>
                <div>
                    <label for="">預告影片：</label>
                    <input type="file" name="trailer" id="">
                </div>
                <div>
                    <label for="">電影海報：</label>
                    <input type="file" name="poster" id="">
                </div>
            </td>
        </tr>
        <tr>
            <td>劇情簡介</td>
            <td>
                <textarea name="intro" style="width:95%;height:50px"></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>