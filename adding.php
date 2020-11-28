<?php
    $error = $_GET['error'];
    $added = $_GET['added'];
    include 'session.php';
    $title = 'Добавление';
    include('header.php');
    if (!isset($_SESSION['login_user'])) {
        header("location: index.php"); // Redirecting To Home Page
    }
    
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
        .redLabel {
            color: red;
        }
    </style>
    <script src='js/mask.js'></script>
</head>
<body>
    
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="profile.php">Вторично выданные карты доступа</a>
    </div>
    <ul class="nav navbar-nav">
   
          <li class=""><a href="profile.php">Полный список</a></li>
          <li class="active"><a href="adding.php">Добавление</a></li>

    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="profile.php"><span class="glyphicon glyphicon-user" style='margin-right: 5px'></span> <?php echo $login_session; ?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style='margin-right: 5px'></span> Выйти</a></li>
    </ul>
  </div>
</nav>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>

<div class="container" style="display: flex; justify-content: center; align-items: center; height: 100%; margin-top: 35px;">
    
    <div class="panel panel-default" style='padding: 10px; width: 400px; opacity: 0.9;'>
            <div class="panel-heading text-center">Добавление вторично выданной карты доступа</div>
            <div class="panel-body">
    <form action='add.php' method="POST">
                <div id='signup-inputs'>
    <?php 
        if($added == 1){
    ?>
        <div class="panel panel-success center-block" style=' opacity: 1;'>
            <div class="panel-heading">Успешно добавлено!</div>
        </div>
    <?php } ?>
                    <div class="form-group">
                        <label><span class="redLabel">*</span> - обязательное поле</label>
                    </div>
                    <div class="form-group">
                        <label for="surname">Фамилия <span class="redLabel">*</span>:</label>
                        <input type="text" class="form-control field" id="surname" name='surname'>
                    </div>
                    <div class="form-group">
                        <label for="name">Имя <span class="redLabel">*</span>:</label>
                        <input type="text" class="form-control field" id="name" name='name'>
                    </div>
                    <div class="form-group">
                        <label for="patronymic">Отчество:</label>
                        <input type="text" class="form-control field" id="patronymic" name='patronymic'>
                    </div>
                    <div class="form-group">
                        <label for="semeistvo">Семейство <span class="redLabel">*</span>: </label>
                        <input type="text" class="form-control field" id="semeistvo" name='semeistvo'>
                    </div>
                    <div class="form-group">
                        <label for="nomer">Номер <span class="redLabel">*</span>:</label>
                        <input type="text" class="form-control field" id="nomer" name='nomer' placeholder=''>
                    </div>
                    <div class="form-group">
                        <label for="additionalInfo">Дополнительная информация:</label>
                        <input type="text" class="form-control field" id="additionalInfo" name='additionalInfo' placeholder='необязательное поле'>
                    </div>
                 
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" id='add' name='add' value='Добавить'>
                    <input type="button" class="btn btn-warning" id='clear' name='clear' value='Стереть'>
                    <?php 
                        if($error == 1){
                    ?>
                        <div class="panel panel-danger" id='errorLog' style='display: block; margin-top: 5px;'>
                            <div class="panel-heading">Ошибка при добавлении!</div>
                        </div>
                    <?php } else if ($error == 2) {?>
                        <div class="panel panel-danger" id='errorLog' style='display: block; margin-top: 5px;'>
                            <div class="panel-heading">Уже существует!</div>
                        </div>
                    <?php } else if ($error == 3) {?>
                        <div class="panel panel-danger" id='errorLog' style='display: block; margin-top: 5px;'>
                            <div class="panel-heading">Заполните все поля!</div>
                        </div>
                    <?php } ?>
                </div>  
            </form>      
        </div>


</div>
<script>

    $(document).ready(function(){
        

        $("#clear").click(function(){
            $('.field').val('');
        });


    });
    

</script>
</body>



</html>