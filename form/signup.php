 <!-- ------------------------------------------ PHP ----------------------------------------------- -->
 <?php
    require './componenet/navbar.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include './componenet/db.php';
        // ------------------------- Connect to server ----------------------
        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $database = "shivam";
        // $conn = mysqli_connect($servername, $username, $password, $database);
        // if (!$conn) {
        //     die("Sorry! failed to connect the serer:" . mysqli_connect_error());
        //     echo "<br>";
        // } 

        $name = $_POST['name'];
        $fname = $_POST['fname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];
        // $exits = false;
        // -----------------  check for user exit or not------------------
        $exitsql = "SELECT * FROM `contact` WHERE user='$user'";
        $result = mysqli_query($conn, $exitsql);
        $numexitrows = mysqli_num_rows($result);
        if ($numexitrows > 0) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed ! </strong>Your username already exits. please try again
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div> ';
        } else {

            if (($conn) && ($pass == $cpass)) {
                $hash = password_hash($pass, PASSWORD_DEFAULT);

                $sql = "INSERT INTO `contact` (`Name`, `Father's name`, `phone`, `email`, `pass`,`user`) VALUES ('$name', '$fname', '$phone', '$email', '$hash','$user')";

                $result = mysqli_query($conn, $sql);

                if ($result) {
                    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Congrulatiion ! </strong>Your email and password  has been submitted succesfully.You can login now.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div> ';
                }
            }
        }
        if (!($pass == $cpass)) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>Failed ! </strong>Your password does\'t match. please try again
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
           </div> ';
        }
    }
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
     <link rel="stylesheet" href="./componenet/style2.css">
     <link rel="stylesheet" href="./componenet/style1.css">
     <title>Form</title>
     
 </head>

 <body>
    <div class="signup-page-bg">
        <div class="container d-flex justify-content-center ">
            <form action="signup.php" method="POST"class="signup-border">
                <!-- ----------------------------- Name ----------------------------------- -->
                <div class="mb-3">
                    <label for="Name" class="form-label">Name </label>
                    <input type="text" class="form-control" id="Name" aria-describedby="emailHelp" name="name">
                </div>
   
                <!-- ----------------------------- uname ----------------------------------- -->
                <div class="mb-3">
                    <label for="Name" class="form-label">Username </label>
                    <input type="text" class="form-control" id="Name" aria-describedby="emailHelp" name="user" required>
                </div>
                
                <!-- ----------------------------- password (password)---------------------------------- -->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1" required>
                    <div id="emailHelp" class="form-text text-warning">We'll never share your email and password with anyone else.</div>
                </div>
                <!-- ------------------------- cpassword ( confirm password) ------------------------------- -->
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" name="cpass" class="form-control" id="exampleInputPassword1" required>
                </div>
   
                <button type="submit" class="btn btn-primary col-sm-4 my-33">Submit</button>
            </form>
        </div>
    </div>



     <!-- Option 1: Bootstrap Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


 </body>

 </html>