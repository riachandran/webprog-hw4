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
    <form action="signup-submit.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>New User Signup:</legend>

            <ul>
                <li>
                    <strong>Name:</strong>
                    <input type="text" name="name" size="16" maxlength="35" <?php if(!empty($name_error)) {  ?> value="<?php echo $name_error; ?>" <?php } ?>/>
                </li>

                <li><strong>Gender:</strong>
                    <label><input type="radio" name="gender" value="M" />Male</label>
                    <label><input type="radio" name="gender" value="F" checked="checked" />Female</label>
                </li>

                <li>
                    <strong>Age:</strong>
                    <input type="text" name="age" size="6" maxlength="2" /><?php if(!empty($age_error)) { ?><p> <?php echo $age_error; ?> </p><?php } ?>
                </li>

                <li>
                    <strong>Personality type:</strong>
                    <input type="text" name="personality" size="6" maxlength="4" />
                    <a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">(Don't know your type?)</a><?php if(!empty($personality_error)) { ?><p> <?php echo $personality_error; ?> </p><?php } ?>
                </li>

                <li>
                    <strong>Favorite OS:</strong>
                    <select name="os">
                        <option selected="selected">Windows</option>
                        <option>Mac OS X</option>
                        <option>Linux</option>
                    </select>
                </li>

                <li>
                    <strong>Seeking age:</strong>
                    <input type="text" name="minage" size="6" maxlength="2" placeholder="min" />to<input type="text" name="maxage" size="6" maxlength="2" placeholder="max" /><?php if(!empty($minmax_age_error)) { ?><p> <?php echo $minmax_age_error; ?> </p><?php } ?>
                </li>

                <li>
                    <strong>Photo:</strong>
                    <input type="file" id="photo" name="image"/>
                </li>
            </ul>
                                    
            <input type="submit" value="Sign Up" name="signUp">
        </fieldset>
    </form>
    <?php footerMain();?>
</body>
</html>
