    <div class="half" style="vertical-align:top;">
      <h1>預告片介紹</h1>
      <div class="rb tab" style="width:95%;">
        <div id="abgne-block-20111227">
          <ul class="lists">
          </ul>
          <ul class="controls">
          </ul>
        </div>
      </div>
    </div>
    <style>
      .movies {
        width: 95%;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-content: space-evenly;
      }

      .movie {
        background-color: #eee;
        width: 48%;
        height: 150px;
        display: flex;
        flex-wrap: wrap;
        color: black;
        margin-bottom: 10px;
        padding: 3px;
        border-radius: 5px;
      }
    </style>
    <div class="half">
      <h1>院線片清單</h1>
      <div class="rb tab movies">
        <?php
        $today = date("Y-m-d");
        $ondate = date("Y-m-d", strtotime("-2 days"));
        $all = $Movie->count(" WHERE `sh`=1 && `ondate` between '$ondate' AND '$today'");
        $div = 4;
        $pages = ceil($all / $div);
        $now = $_GET['p'] ?? 1;
        $start = ($now - 1) * $div;
        $movies = q("select * from `movies` where `sh`=1 && `ondate` between '$ondate' AND '$today' order by `rank` limit $start,$div");
        foreach ($movies as $movie):
        ?>
          <div class="movie">
            <div>
              <a href="?do=intro&id=<?= $movie['id']; ?>">
                <img src="upload/<?= $movie['poster']; ?>" style="width: 70px;height: 95px;">
              </a>
            </div>
            <div>
              <div><?= $movie['name']; ?></div>
              <div>
                分級：
                <img src="icon/03C0<?= $movie['level']; ?>.png" style="width: 20px;">
                <?= $levelStr[$movie['level']]; ?>
              </div>
              <div>
                上映日期：<br>
                <?= $movie['ondate']; ?>
              </div>
            </div>
            <div style="width: 100%;">
              <button onclick="location.href='?do=intro&id=<?= $movie['id']; ?>'">劇情簡介</button>
              <button>線上訂票</button>
            </div>
          </div>
        <?php
        endforeach;
        ?>
      </div>
      <div class=" ct">
        <?php
        if ($now - 1 > 0) {
          echo "<a href='?p=" . ($now - 1) . "'> < </a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
          $fontsize = ($i == $now) ? "24px" : "16px";
          echo "<a href='?p=$i'> $i </a>";
        }

        if ($now + 1 <= $pages) {
          echo "<a href='?p=" . ($now + 1) . "'> < </a>";
        }
        ?>
      </div>
    </div>