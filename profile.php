<?php
    include 'session.php';
    $title = 'Личный кабинет';
    include('header.php');
    if (!isset($_SESSION['login_user'])) {
        header("location: index.php"); // Redirecting To Home Page
    }
    $deleted = $_GET['deleted'];
?>
<style>
    input[type=number]::-webkit-inner-spin-button, 
		input[type=number]::-webkit-outer-spin-button { 
      -webkit-appearance: none; 
      margin: 0; 
    }
    body { 
        background-image: url('img/logo-60.png');
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
        background-size: 5%;
    }
</style>
</head>
<body>


  <!-- Content for Shanlayakov Arken -->


  <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="profile.php">Вторично выданные карты доступа</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="profile.php">Полный список</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="profile.php"><span class="glyphicon glyphicon-user" style='margin-right: 5px'></span> <?php echo $login_session; ?></a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style='margin-right: 5px'></span> Выйти</a></li>
        </ul>
      </div>
    </nav>

    <?php
      $q = "SELECT * from cards where user_id='$login_id'";
          
      $rs = mysqli_query($conn, $q);
      $count = mysqli_num_rows($rs);
    ?>
<?php 
        if($deleted == 1){
      ?>
      <div class="container" id='panelremoved'>
        <div class="row">
          <div class="col-md-12">
          <div class="panel panel-success" style='width:50%; margin: 0 auto; opacity: 1;'>
            <div class="panel-heading">Успешно удалено! <span id='closepanel' class='glyphicon glyphicon-remove' style='float: right; cursor: pointer;'></span></div>
            
        </div>
          </div>
        </div>
      </div>
        
      <?php    
        }
      ?>

  <div class="container">
      
      <h3>Общее количество - <?=$count?></h3><br>
      <a href="adding.php" class='btn btn-success btn-md'>Добавить</a>
      <br><br>
      <div class="pre-scrollable" style='max-height: 500px'>
      
        <table class="table table-hover">
        <thead>
          <tr>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Семейство</th>
            <th>Номер</th>
            <th>Дата Регистрации</th>
            <th>Дополнительная Информация</th>
            <th>Операция</th>
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
              <?=$row['Семейство']?>
            </td>
            <td>
              <?=$row['Номер']?>
            </td>
            <td>
              <?=$row['ДатаРегистрации']?>
            </td>
            <td>
              <?=$row['ДополнительнаяИнформация']?>
            </td>
            <td>
              <a class='btn btn-warning' href="delete.php?id=<?=$row['id']?>">Удалить</a>
            </td>
          </tr>
          <?php } ?>
          </tbody>
      </table>
    </div>
  </div>

</body>
<script>
 $("#closepanel").click(function(){
            $("#panelremoved").hide("slow");
        });
</script>

</html>