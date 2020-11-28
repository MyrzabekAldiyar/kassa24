<?php
    $title = 'Авторизация';
    include('header.php');
    include('auth.php');
    $error = $_GET['error'];
    $blockTime = $_GET['blockTime'];
    $success = $_GET['success'];
    $username = $_GET['username'];
    $password = $_GET['password'];
    if(isset($_SESSION['login_user'])){
        header("location: profile.php"); // Redirecting To Profile Page
    }
?>
    <style>
        body {
            background: #6b0f24 !important;
        }
        input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
            }
    </style>
    <script src='js/mask.js'></script>

</head>
<body>
<div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh">
    <div class="panel panel-default" style='padding: 10px; width: 400px;'>
        <div class="panel-heading text-center">Авторизация</div>
        <div class="panel-body">
            <form action='auth.php' method="POST">
                <div id='login-inputs'>
                <?php
                    if($error == 1){
                        ?>
                        <div class="panel panel-danger" id='errorLog' style='display: block'>
                            <div class="panel-heading">Неверное имя пользователя или пароль!
                            </div>
                        </div>
                    <?php } ?>
                        <div class="form-group">
                            <label for="iin">Имя пользователя:</label>
                            <input type="text" class="form-control field" id="iinlog" name='uname' value='<?php if($success == 1 && $username != '' && $password != '') echo $username;?>'>
                            
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль:</label>
                            <input type="password" class="form-control field" id="password" name='pswd' value='<?php if($success == 1 && $username != '' && $password != '') echo $password;?>'>
                        </div>
                </div>
          
            
                
                <div class="form-group">
                    <input type="submit" class="btn btn-success center-block" id='login' name='login' value='Войти'>
                   
                    
                   
                </div>  
            </form>              
            
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
      


        $("#login").click(function(){
            $("#signup-inputs").hide("slow");
            $("#login-inputs").show("slow");
            $("#login").val("Войти");
            $("#signup").attr("disabled", false);
            $("#errorLog").hide("slow");
            $("#passwordchecker").hide("slow");
            $("#forgot").show("slow");
        });


        $('.field').keyup(function() {

            var empty = false;
            $('.field').each(function() {
                if ($(this).val().length == 0) {
                    empty = true;
                }
            });

            if (empty) {
                $('#login').attr('disabled', 'disabled');
                $('#login').attr('type', 'button');
            } else {
                $('#login').removeAttr('disabled');
                $('#login').attr('type', 'submit');
            }
        });

        $('.fieldreg').keyup(function() {

            var empty = false;
            $('.fieldreg').each(function() {
                if ($(this).val().length == 0) {
                    empty = true;
                }
            });

            if (empty) {
                $('#signup').attr('disabled', 'disabled');
                $('#signup').attr('type', 'button');
            } else {
                if(checker == 'true'){
                    $('#signup').removeAttr('disabled');
                    $('#signup').attr('type', 'submit');
                }

            }
        });


        
});
</script>
</body>

</html>