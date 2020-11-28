<?php
	include('db.php');
    $title = 'Table export';
?>

</head>
<body>


    <?php
      $q = "SELECT * from abiturients where user_id='$login_id'";
          
      $rs = mysqli_query($conn, $q);
      $count = mysqli_num_rows($rs);
    ?>
  <div class="container">
      <h3>Количество добавленных вами абитуриентов - <?=$count?></h3><br>
      <a href="adding.php" class='btn btn-default btn-md'>Добавить абитуриента</a>
      <br><br>
      <div class="pre-scrollable" style='max-height: 500px'>
      
        <table class="table table-hover">
        <thead>
          <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>ИИН</th>
            <th>Специальность</th>
            <th>Учебное заведение</th>
            <th>Телефон</th>
            <th>Дополнительная Информация</th>
            <th>Дата Регистрации</th>
          </tr>
        </thead>
        <tbody>
        <?php
          while ($row = mysqli_fetch_assoc($rs)) {
          ?>
          <tr>
            <td>
              <?=$row['Фамилия']?>
            </td>
            <td>
              <?=$row['Имя']?>
            </td>
            <td>
              <?=$row['Отчество']?>
            </td>
            <td>
              <?=$row['ИИН']?>
            </td>
            <td>
              <?=$row['Специальность']?>
            </td>
            <td>
              <?=$row['УчебноеЗаведение']?>
            </td>
            <td>
              <?=$row['Телефон']?>
            </td>
            <td>
              <?=$row['ДополнительнаяИнформация']?>
            </td>
            <td>
              <?=$row['ДатаРегистрации']?>
            </td>
          </tr>
          <?php } ?>
          </tbody>
      </table>
    </div>
  </div>

</body>


</html>