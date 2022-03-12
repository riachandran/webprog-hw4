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
    <?php
    $userName = $_POST["name"];
    $userData = $userName;
    if(isset($_POST['signUp'])){
        $image_name = $_FILES['image']['name'];
        $image_temp = $_FILES['image']['tmp_name'];
        $folder = 'images/';
        move_uploaded_file($image_temp, $folder.$image_name);
    }

    if(empty($_POST['name'])){
        $name_error = "Name cannot be blank";
    }
    else if(strpos(file_get_contents('singles.txt'),$userName)==TRUE){
        $name_error = "User already exists";
    }
    if(empty($_POST['age'])){
        $age_error = "Age required";
    }
    if (empty($_POST["personality"])) {
        $personality_error = "Personality Type required";	
    }
    if(strlen($_POST["personality"]) != 4){
        $personality_error = "Personality Type needs to have a length of 4 letters";
    }
    elseif(strcmp(substr($_POST["personality"], 0, 1), "I")!==0 && strcmp(substr($_POST["personality"], 0, 1), "E")!==0){
        $personality_error = "The first letter should be I or E";
    }
    elseif(strcmp(substr($_POST["personality"], 1, 1), "N")!==0 && strcmp(substr($_POST["personality"], 1, 1), "S")!==0){
        $personality_error = "The Second letter should be N or S";
    }
    elseif(strcmp(substr($_POST["personality"], 2, 1), "F")!==0 && strcmp(substr($_POST["personality"], 2, 1), "T")!==0){
        $personality_error = "The Third letter should be F or T";
    }
    elseif(strcmp(substr($_POST["personality"], 3, 1), "J")!==0 && strcmp(substr($_POST["personality"], 3, 1), "P")!==0){
        $personality_error = "The Fourth letter should be J or P";
    }

    if (empty($_POST["minage"])) {
        $minmax_age_error = "Minimum age required";	
    }
    elseif (empty($_POST["maxage"])) {
        $minmax_age_error = "Maximum age required";	
    }
    elseif($_POST["minage"] > $_POST["maxage"]){
        $minmax_age_error = "Maximum age should be greater than or equal to the Minimum age";
    }
    if(empty($name_error) && empty($age_error) && empty($min_max_error) && empty($personality_error)){
        // $uploadfile = $targetdir . basename($_FILES['userphoto']['name']);
        // $new_filename = str_replace(" ","_",strtolower($userName));
        //checking if user already exists in file
        foreach (file("singles.txt") as $line) {
            $data = explode(',', $line);
            if($data[0] == $userName){
                $flag = 1;
                break;
            }
            else{
                $flag = 0;
            }
        }
        // if user does not exist, the user's record will be added to txt file
        if($flag == 0){

            echo "<div>
            <h1>Thank you!</h1>
            <p>
            Welcome to NerdLuv, " . $_POST["name"] . "!<br /><br />
            Now <a href='./matches.php'>log in to see your matches!</a>
            </p>
            </div>";

            foreach ($_POST as $key => $value) {
                if ($key != "name" && $key != "image" && $key != "signUp"){
                    $userData = $userData.",".$value;
                }
            }
            file_put_contents("singles.txt", "\n".$userData, FILE_APPEND);

            footerMain();
        }
    }
    else{
        include("signup-failure.php");
    }

    ?>
</body>
</html>



