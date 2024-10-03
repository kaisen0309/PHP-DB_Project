<!DOCTYPE html>
<html lang="en">

<head>

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

  <?php
  include("header.php");
  ?>
  <!-- ***** Main Banner Area Start ***** -->
  <section class="section main-banner" id="top" data-section="section1">
    <img src="images/indexbg.jpg" alt="">

    <div class="video-overlay header-text">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="caption">
              <h6>Hello Everyone</h6>
              <h2>歡迎來到密室逃脫!</h2>
              <!-- intro -->
              <?php
              $link =  @mysqli_connect('localhost', 'root', '', 'phpproject2');;
              mysqli_set_charset($link, "utf8");
              $SQL = "SELECT home_intro FROM intro ";

              if ($result = mysqli_query($link, $SQL)) {
                $row = mysqli_fetch_assoc($result);
                echo  "<p>" . $row['home_intro'] . "</p>";
              }
              ?>
              <!-- intro end -->

              <!-- 管理者修改intro -->
              <div class="main-button-red">
                <?php
                if (isset($_SESSION['login'])) {
                  if ($_SESSION['login'] == 'admin') {
                    $SQL = "SELECT home_intro FROM intro ";
                    if ($result = mysqli_query($link, $SQL)) {
                      $row = mysqli_fetch_assoc($result);
                      echo "<div class='scroll-to-section' ><a href='updateIntro.php'>修改 </a></div>";
                    } else {
                      echo "search error";
                    }
                  }
                }
                ?>
              </div>
              <!-- 管理者修改intro end-->

              <div class="main-button-red">
                <?php
                if (isset($_SESSION["login"])) {
                  echo "<div class='scroll-to-section'><a href='topic.php'>立即預約!</a></div>";
                } else {
                  echo "<div class='scroll-to-section'><a href='login.php'>立即登入!</a></div>";
                }

                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <!-- 主題介紹start -->
  <section class="upcoming-meetings" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="section-heading" style="margin-top:-150px">
            <h2>熱門遊戲介紹</h2>
          </div>
        </div>
        <!-- 分類 -->
        <div class="col-lg-4">
          <div class="categories">
            <h4>熱門遊戲分類</h4>
            <ul>
              <?php
              $link = mysqli_connect('localhost', 'root', '', 'phpproject2');
              if (!mysqli_select_db($link, 'phpproject2'))
                die("error<br/>");
              mysqli_set_charset($link, "utf8");
              $sql2 = "SELECT DISTINCT(k.K_NAME),k.K_ID FROM orders o join topic t on o.T_ID=t.T_ID join kind k on t.K_ID=k.K_ID WHERE O_date >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH) GROUP BY o.T_ID HAVING COUNT(*) >= 5 ORDER BY `k`.`K_ID` ASC";

              $sql = "SELECT * FROM orders o join topic t on o.T_ID=t.T_ID join kind k on t.K_ID=k.K_ID WHERE O_date >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH) GROUP BY o.T_ID HAVING COUNT(*) >= 5;";
              //$sql = "SELECT * FROM kind";
              if ($result = mysqli_query($link, $sql2)) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo " <li><a href='index.php?kind=" . $row['K_ID'] . " #meetings'> " . $row['K_NAME'] . "</a></li><br/>";
                }
              }
              ?>
            </ul>
            <div class="main-button-red">
              <a href="index.php#meetings" onclick="setActiveLink(this)">全部</a>
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
              $sql = "SELECT * FROM orders o join topic t on o.T_ID=t.T_ID join kind k on t.K_ID=k.K_ID WHERE O_date >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH) GROUP BY o.T_ID HAVING COUNT(*) >= 2;";
            } else {
              $sql = "SELECT * FROM orders o join topic t on o.T_ID=t.T_ID join kind k on t.K_ID=k.K_ID WHERE O_date >= DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH) && k.K_ID=$kind && k.K_ID=t.K_ID GROUP BY o.T_ID HAVING COUNT(*) >= 2;";
            }
            if ($result = mysqli_query($link, $sql)) {
              if (mysqli_num_rows($result)  == 0) {
                echo "暫無此主題遊戲<br/>敬請期待";
              } else {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "  <div class='col-lg-6'>";
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



  <!--Scripts -->
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