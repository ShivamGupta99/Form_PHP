<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- FONT AWSOME LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Signup</title>
    <style>
        .nav-link {
            color: white;
        }
    </style>
</head>

<body>
    <?php
    if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true) {
        $loggesin = true;
    } else {
        $loggesin = false;
    }
    echo '
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">iSecure</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/form/Home.php">Home</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="#">Contact</a>
                        </li>
                        </ul> ';
    //-------------------------------signup and  Login----------------------------
    if ($loggesin) {
        echo '
                            <ul class="nav justify-content-end">   
                            
                            <li class="nav-item">
                            <a class="nav-link" href="/form/login.php"><i class="fa-solid fa-user"></i>Login</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="/form/signup.php">Signup</a>
                   </li>
               </ul> ';
    }
    if (!$loggesin) {
        //------------------------------- Logout----------------------------
        echo ' <ul class="nav justify-content-end">
                                        <li class="nav-item">
                                        <a class="nav-link " aria-current="page" href="/form/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
                                        </li>
                                    </ul>
                                        ';
    }
    echo '                
            </div>
        </div>
    </nav>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
'
    ?>
</body>

</html>