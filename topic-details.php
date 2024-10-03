<!-- 星星函數 -->
<?php
function convertToStars($number)
{
  // 取整數部分
  $integerPart = floor($number);
  // 取小數點部分
  $decimalPart = $number - $integerPart;

  // 轉換整數部分為星星
  $stars = str_repeat('★', $integerPart);

  // 如果有小數點，則添加半顆星或空心星
  if ($decimalPart > 0) {
    if ($decimalPart >= 0.5) {
      $stars .= '☆'; // 半顆星
    } else {
      $stars .= '□'; // 空心星
    }
  }

  return $stars;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" content="text/css" href="style.css" />

  <?php
  include("header.php");
  ?>


</head>

<body>

  <?php
  $T_ID = $_GET['T_ID'];

  $link = mysqli_connect('localhost', 'root', '', 'phpproject2');
  if (!mysqli_select_db($link, 'phpproject2'))
    die("error<br/>");
  mysqli_set_charset($link, "utf8");

  $sql = "SELECT * FROM schedule_detail, schedules, topic WHERE schedule_detail.S_ID=schedules.S_ID && schedule_detail.T_ID=topic.T_ID && topic.T_ID=$T_ID ORDER BY schedules.S_ID ASC;";




  if ($result = mysqli_query($link, $sql)) {
    $row = mysqli_fetch_assoc($result);
    $number = $row["T_star"];
    $stars = convertToStars($number);

    echo "<section class='meetings-page' id='meetings'>
  <div class='container'>
    <div class='row'>
      <div class='col-lg-12'>
        <div class='row'>
          <div class='col-lg-12'>
            <div class='meeting-single-item'>
              <div class='thumb'>";
    // <!-- 難度 -->
    echo "<div class='price'>";
    echo "<p><span class='star'style='color:#ffd700'><font color='black'>難度:";
    echo "&nbsp</font>" . $stars . "</span></p>";


    // 圖片start
    echo "<div class='topicDetail-container'>
            <div class='topicDetail-image-container'>";
    $imagePath = $row["T_photo"]; // 替換成你的圖片路徑

    // 取得圖片尺寸
    $imageSize = getimagesize($imagePath);
    $imageWidth = $imageSize[0];
    $imageHeight = $imageSize[1];

    // 計算縮小比例
    $scale = min(500 / $imageWidth, 1000 / $imageHeight);

    // 計算縮小後的寬度和高度
    $newWidth = $imageWidth * $scale;
    $newHeight = $imageHeight * $scale;

    echo "<img src=" . $imagePath . " width=" . $newWidth . " height=" . $newHeight . " alt='圖片'>
            </div>
        </div>";

    // 圖片end

    echo "</div></div>";



    //<!-- 標題 -->
    echo "<div class='down-content'><br />";
    echo " <h3><b><font color='black'>" . $row["T_name"] . "</font></b></h3><br/>";
    // <!-- 小標 -->
    //<!-- 建議人數 -->
    echo "<p>";
    echo "<div class='date' style='margin-bottom: -30px;'>";
    echo "<h6> <span>建議人數： " . $row["T_number"] . "</span></h6></p>";
    echo "<p style='margin-top:8px'><h6><span>價格： " . $row["T_price"] . "</span></h6>";
    echo "</div></p>";
    //<!-- 內容 -->

    echo "<div style='width:400px'><p class='description'>" . $row["T_information"] . "</p></div>";
    echo "<div class='row'>";
    //<!-- 時間 -->
    echo "<div class='col-lg-4' style='width:200px;'>
    <div class='hours'>";

    echo "<h5>時間</h5>";
    $time = "SELECT DISTINCT(schedules.S_time) 
    FROM schedule_detail, schedules, topic
    WHERE schedule_detail.S_ID=schedules.S_ID && schedule_detail.T_ID=topic.T_ID && topic.T_ID=$T_ID 
    ORDER BY schedules.S_ID;";
    if ($result3 = mysqli_query($link, $time)) {
      while ($row3 = mysqli_fetch_assoc($result3))
        echo "<p>" . $row3["S_time"] . "<//p><br/>";
    }

    echo "</div></div>
    <div class='col-lg-4';>
    <div class='location' >";
    echo "<h5>時長</h5>";
    $long = "SELECT DISTINCT(T_long)
    FROM schedule_detail, schedules, topic
    WHERE schedule_detail.S_ID=schedules.S_ID && schedule_detail.T_ID=topic.T_ID && topic.T_ID=$T_ID;";
    if ($result2 = mysqli_query($link, $long)) {
      while ($row2 = mysqli_fetch_assoc($result2))
        echo "<p>" . $row2["T_long"] . "分鐘</p><br/>";
    }
    echo " 
    </div>
    </div>


    <div class='col-lg-12'>
      <div class='main-button-red'>
        <a href='booking.php?T_ID=" . $row["T_ID"] . "'>立即預約</a></a>
      </div>
    </div>";

    echo "
    </div> </div> </div> </div> </div> </div> ";
  }
  ?>





  <!-- 返回連結 -->

  </div>
  </div>
  </div>
  </div>
  <div class="footer">

  </div>
  </section>


  <!-- comment start -->
  <?php
  $link = mysqli_connect('localhost', 'root', '', 'phpproject2');
  if (!mysqli_select_db($link, 'phpproject2'))
    die("error<br/>");
  mysqli_set_charset($link, "utf8");

  $sql2 = "SELECT * FROM comment c, topic t WHERE c.T_ID=t.T_ID && t.T_ID=$T_ID;";

  $result = mysqli_query($link, $sql2);


  if ($comment_result = mysqli_query($link, $sql2)) {


    echo "<section class='meetings-page' id='meetings' style='margin-top:-350px'>";
    echo "<div class='container'>";
    echo "<div class='row'>";
    echo "<div class='col-lg-12'>";
    echo "<div class='row'>";
    echo "<div class='col-lg-12'>";
    echo "<div class='meeting-single-item'>";
    echo "<div class='down-content'>
                  <h4>網友評論</h4>
                  <p>來看看其他玩家的評價</p>";
    while ($comment = mysqli_fetch_assoc($comment_result)) {
      echo "<p class='description'>";
      echo $comment['Co_recode'];
      echo "</p>";
    }

    echo "</div>
              </div>
            </div>
            <div class='col-lg-12'>
              <div class='main-button-red'>
                <a href='topic.php'>回到遊戲介紹</a>
              </div>
              <br><br><br><br />
            </div>
          </div>
        </div>
      </div>
    </div>";
  }
  ?>
  </section>






  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/lightbox.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/video.js"></script>
  <script src="assets/js/slick-slider.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
    //according to loftblog tut
    $('.nav li:first').addClass('active');

    var showSection = function showSection(section, isAnimate) {
      var
        direction = section.replace(/#/, ''),
        reqSection = $('.section').filter('[data-section="' + direction + '"]'),
        reqSectionPos = reqSection.offset().top - 0;

      if (isAnimate) {
        $('body, html').animate({
            scrollTop: reqSectionPos
          },
          800);
      } else {
        $('body, html').scrollTop(reqSectionPos);
      }

    };

    var checkSection = function checkSection() {
      $('.section').each(function() {
        var
          $this = $(this),
          topEdge = $this.offset().top - 80,
          bottomEdge = topEdge + $this.height(),
          wScroll = $(window).scrollTop();
        if (topEdge < wScroll && bottomEdge > wScroll) {
          var
            currentId = $this.data('section'),
            reqLink = $('a').filter('[href*=\\#' + currentId + ']');
          reqLink.closest('li').addClass('active').
          siblings().removeClass('active');
        }
      });
    };

    $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function(e) {
      e.preventDefault();
      showSection($(this).attr('href'), true);
    });

    $(window).scroll(function() {
      checkSection();
    });
  </script>
</body>


</body>

</html>