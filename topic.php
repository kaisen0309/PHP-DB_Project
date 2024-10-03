<!DOCTYPE html>
<html lang="en">


<head>
  <?php
  include("header.php");
  ?>

  <style>
    /* 字設定為五行 */
    .row p {
      overflow: hidden;
      display: -webkit-box;
      text-overflow: ellipsis;
      -webkit-line-clamp: 5;
      /*行數*/
      -webkit-box-orient: vertical;
      white-space: normal;
    }
  </style>

</head>

<body>

  <!-- 輪播end -->
  <!-- 主題介紹start -->
  <section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading" style="margin-top:-100px">
            <h2>遊戲介紹</h2>
          </div>
        </div>
        <!-- 分類 -->
        <div class="col-lg-4">
          <div class="categories">
            <h4>主題分類查詢</h4>
            <ul>
              <?php
              $link = mysqli_connect('localhost', 'root', '', 'phpproject2');
              if (!mysqli_select_db($link, 'phpproject2'))
                die("error<br/>");
              mysqli_set_charset($link, "utf8");


              $sql = "SELECT * FROM kind";
              if ($result = mysqli_query($link, $sql)) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo " <li><a href='topic.php?kind=" . $row['K_ID'] . "#meetings'>" . $row['K_NAME'] . "</a></li><br/>";
                }
              }
              ?>
            </ul>
            <div class="main-button-red">
              <a href="topic.php">全部</a>
            </div>
          </div>
        </div>
        <!-- 分類 end -->

        <div class="col-lg-8">
          <div class="row">
            <!-- 個別遊戲 start -->
            <?php
            $kind = 0;
            if (isset($_GET['kind'])) {
              $kind = $_GET['kind'];
            }

            $link = mysqli_connect('localhost', 'root', '', 'phpproject2');
            if ($kind == 0) {
              $sql = "SELECT * FROM topic where t_exist='1'";
            } else {
              $sql = "SELECT * FROM kind,topic WHERE kind.K_ID=$kind && kind.K_ID=topic.K_ID && t_exist='1'";
            }
            if ($result = mysqli_query($link, $sql)) {
              if (mysqli_num_rows($result)  == 0) {
                echo "暫無此主題遊戲<br/>敬請期待";
              } else {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo " <div class='col-lg-6'>";
                  echo "<div class='meeting-item' style='width:350px'>";
                  echo "<div class='thumb'>";
                  echo "<div class='price'>";
                  echo "<span>" . $row["T_price"] . "</span>";
                  echo "</div>";
                  echo "<a href='topic-details.php?T_ID=" . $row["T_ID"] . "'><img src='" . $row["T_photo"] . "' alt=''></a>";
                  echo "</div>";
                  echo "<div class='down-content'>";
                  echo " <div class='date'>";
                  echo "<h6>建議人數<span>" . $row["T_number"] . "</span></h6>";
                  echo "</div>";
                  echo "<a href='topic-details.php?T_ID=" . $row["T_ID"] . "'>";
                  echo "<h4>" . $row["T_name"] . "</h4></a>";
                  echo "<p>" . $row["T_information"] . "</p>";
                  echo "</div></div></div>";
                }
              }
            } else {
              echo "error";
            }

            ?>
            <!-- 個別遊戲 end-->

          </div>
        </div>

      </div>
    </div>
  </section>

  </div>
  </section>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/lightbox.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/isotope.js"></script>
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