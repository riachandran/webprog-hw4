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
    <form action="matches-submit.php" method="get">
    <fieldset>
        <legend>Returning User:</legend>

        <ul>
            <li>
            <strong>Name:</strong>
            <input type="text" name="name" size="16" maxlength="35"/>
            </li>
        </ul>
                                
        <input type="submit" value="View My Matches">
    </fieldset>
</form>
    <?php footerMain();?>
</body>
</html>



