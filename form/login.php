<!-- ------------------------------------------ PHP ----------------------------------------------- -->
<?php
$login = false;
$showerror = false;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    include './componenet/db.php';
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "SELECT * from contact where user='$user'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($pass, $row['pass'])) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['user'] = $user;
                header("location:home.php");
            } else {
                $showerror = true;
            }
        }
    } else {
        $showerror = true;
    }
}
// }
?>
<!-- -################################  HTML  #################################-->

<!Doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="./componenet/style1.css">

    <title>Form</title>

</head>

<body>
    <?php
    require './componenet/navbar.php';
    ?>
    <?php
    if ($login) {
        echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Sucess ! </strong>You are login now.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> ';
    }
    if ($showerror) {
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed ! </strong>Invalid password or username.
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div> ';
    }
    ?>
    <div class="login-page-bg">

        <div class="container d-flex justify-content-center">
            <form action="login.php" method="POST" class="login-text my-5 login-shadow">
                <!-- ----------------------------- uname ----------------------------------- -->
                <div class="mb-3">
                    <label for="Name" class="form-label">Username </label>
                    <input type="text" class="form-control" id="Name" aria-describedby="emailHelp" name="user" required>
                </div>
                <!-- ----------------------------- password (password)---------------------------------- -->
                <div class="mb-5">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" required>
                    <div id="emailHelp" class="sky-blue-text">We'll never share your email and password with anyone else.</div>
                </div>
                <button type="submit" class="btn btn-primary col-sm-12">Submit</button>
            </form>
        </div>
        <div class="containers d-flex justify-content-center login-text my-5">
            <h5>New user?
                Please <a href="/form/signup.php" class="link">Sign up</a> first
            </h5>
        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>