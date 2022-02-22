<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <title>Quizhub | Log In</title>
</head>
<body>
    <div class="wrapper">
        <div class="logo"> <img src="./images/Quiz-modified.png" alt=""> </div>
        <div class="text-center mt-4 name"> QuizHub </div>
        <form action="loginSubmit.php" method="POST" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="userName" id="userName" placeholder="Username"> </div>
            <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="password" id="pwd" placeholder="Password"> </div>
            <?php if(isset($_GET['err'])){ ?>
            <div class="d-flex align-items-center text-danger">*Invalid Credential</div>
                <?php } ?>
            <button type="submit" class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6"> Don't have account? <a href="signup.php">Sign up</a> </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>