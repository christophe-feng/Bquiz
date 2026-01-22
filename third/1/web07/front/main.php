<style>
  .lists {
    width: 210px;
    height: 240px;
    margin: auto;
  }

  .controls {
    width: 420px;
    height: 120px;
    margin: 10px auto 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }

  .btns {
    width: 280px;
    height: 80px;
    display: flex;
    overflow: hidden;
  }

  .btn {
    text-align: center;
    font-size: 12px;
    width: 70px;
    flex-shrink: 0;
  }

  .btn img {
    width: 60px;
    height: 70px;
  }

  .left {
    width: 0;
    border-left: 18px solid transparent;
    border-right: 35px solid orange;
    border-bottom: 20px solid transparent;
    border-top: 20px solid transparent;
  }

  .right {
    width: 0;
    border-right: 18px solid transparent;
    border-left: 35px solid orange;
    border-bottom: 20px solid transparent;
    border-top: 20px solid transparent;
  }

  .poster {
    width: 210px;
    height: 220px;
    position: absolute;
    text-align: center;
  }
</style>
<div class="half" style="vertical-align:top;">
  <h1>預告片介紹</h1>
  <div class="rb tab" style="width:95%;">
    <div style="box-sizing: border-box;">
      <div class="lists">
        <?php
        $posters=$Poster->all(['sh'=>1]);
        foreach($posters as $idx=> $poster):
          ?>
          <div class="poster">
            <img src="upload/<?= $poster['img']; ?>" style="width:210px;height:220px;">
            <div><?= $poster['name']; ?></div>
          </div>
          <?php 
      endforeach;
      ?>
      </div>
      <div class="controls">
      </div>
    </div>
  </div>
</div>
<style>
  .movies {
    width: 95%;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
  }

  .movie {
    background-color: #eee;
    width: 48%;
    height: 150px;
    display: flex;
    flex-wrap: wrap;
    color: black;
  }
</style>
<div class="half">
  <h1>院線片清單</h1>
  <div class="rb tab movies">
    <?php
    $today = date("Y-m-d");
    $ondate = date("Y-m-d", strtotime("-2 days"));
    $all = $Movie->count(" where `sh`=1 && ");
    $movies = q("select * from `movies` where `sh`=1 && `ondate` between $ondate $today order by `rank`");
    ?>
    <div class="movie">
      <div style="width: 30%;">
        <a href="">
          <img src="upload/" style="width:60%">
        </a>
      </div>
      <div style="width:69%;">

      </div>


    </div>
  </div>
  <div class="ct">
    <?php
    if ($now - 1 > 0) {
      echo "<a href='?p=" . ($now - 1) . "'> < </a>";
    }
    for ($i = 1; $i <= $pages; $i++) {
      $fontsize = ($i == $now) ? "24px" : "16px";
    }
    if ($now + 1 <= $pages) {
      echo "<a href='?p=" . ($now + 1) . "'> > </a>";
    }
    ?>
  </div>
</div>