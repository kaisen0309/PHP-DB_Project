<!DOCTYPE html>

<?php
$link =  @mysqli_connect('localhost', 'root', '', 'phpproject2');;
mysqli_set_charset($link, "utf8");
$an1 = "SELECT S_time, COUNT(*) AS total
FROM schedules
JOIN orders ON schedules.S_ID = orders.S_ID
GROUP BY S_time  
ORDER BY `schedules`.`S_ID` ASC;";
$result1 = mysqli_query($link, $an1);





?>

<html>

<head>

    <link rel="stylesheet" href="style1.css" />
    <?php
    include("header.php");
    ?>

    <!-- 長條圖1 -->
    <meta charset='utf8'>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>




    <script type="text/javascript">
        google.charts.load('current', {
            packages: ['corechart', 'bar']
        });
        google.charts.setOnLoadCallback(drawStacked);

        function drawStacked() {
            var data = google.visualization.arrayToDataTable([
                ['時段', '人數'],
                <?php
                $result1 = mysqli_query($link, $an1);
                while ($row1 = mysqli_fetch_assoc($result1)) {
                    echo "['";
                    echo $row1['S_time'];
                    echo "', ";
                    echo $row1['total'];
                    echo "],";
                }
                ?>
            ]);
            var options = {
                title: '各時段遊玩人數  ',
            };
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
    <!-- 長條圖1end -->

</head>

<body>

    <!-- <div id="piechart" style="width: 800px; height: 500px;"></div> -->
    <div id="chart_div" style="width: 600px; height: 500px; margin-top:100px; margin-left:350px"></div>

</body>

</html>