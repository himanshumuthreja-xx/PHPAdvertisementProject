<head>
    <link rel="stylesheet" href="style.css" content-type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="includes/customScript.js"></script>
</head>


<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="Home.php">Ad</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="Register.php">Register</a>
                </li>
                <?php if(isset($_SESSION["loggedInUser"])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="PostAd.php">Post Ad</a>
                </li>
                <?php } ?>

                <?php if(isset($_SESSION["loggedInUser"])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="Logout.php">LogOut</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="Login.php">Login <span class="sr-only">(current)</span></a>
                </li>
                <?php  } ?>
            </ul>
            <!--
<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>
-->
        </div>
    </nav>
</div>
