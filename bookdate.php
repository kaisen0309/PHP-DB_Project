<!DOCTYPE html>
<html>

<head>
  <script>
    function displayDate() {
      var dateInput = document.getElementById('date');
      var dateValue = dateInput.value;
      document.getElementById('dateDisplay').textContent = dateValue;
    }
  </script>
</head>

<body>
  <div class="form-group">
    <form action='booking.php' method="post">
      <label for="date">日期</label>
      <input type="date" id="date" name="date" required>
      <input type='submit' name='submit' value='提交'>
  </div>

  <div id="dateDisplay"></div>

  <script>
    document.getElementById('date').addEventListener('change', displayDate);
  </script>
</body>

</html>