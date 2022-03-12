<!DOCTYPE html>
<html lang="en">

<head>
    <title>NerdLuv</title>
    <meta charset="utf-8"/>
    <link href="./images/heart.gif" type="image/gif" rel="shortcut icon" />
    <link href="./nerdluv.css" type="text/css" rel="stylesheet" />

</head>

<body>
    <?php 
    include("./common.php");
    headerMain();
    ?>
    <div>
        <h1>Welcome!</h1>
        <ul>
            <li>
                <a href="./signup.php">
                    <img src="./images/signup.gif" alt="icon" />
                    Sign up for a new account
                </a>
            </li>
            
            <li>
                <a href="./matches.php">
                    <img src="./images/heartbig.gif" alt="icon" />
                    Check your matches
                </a>
            </li>
        </ul>
    </div>
    <?php footerMain();?>
</body>
</html>



