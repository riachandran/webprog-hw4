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
    $userName = $_GET["name"];
    $records = explode("\n", file_get_contents("singles.txt"));
    $currentuser = array();
    //checking if user exists in file
    foreach (file("singles.txt") as $line) {
        $data = explode(',', $line);
        if($data[0] == $userName){
            $flag = 1;
            $currentuser = $data;
            break;
        }
        else{
            $flag = 0;
        }
    }
    if($flag == 0){
        echo "Please sign up first";
        footerMain();
        exit();
    }
    //checking if atleast one personality matches or not
    function commonPersonality($partnerPersona, $userPersona){
        for($i=0; $i<4; $i++){
            if ($partnerPersona[$i] == $userPersona[$i]){
                return true;
            }
        }
    }
    // creating match for current user
    function createMatch(){
        global $records;
        global $currentuser;
        $totalmatches = $records;
        $matchSize = sizeof($totalmatches);
        
        for ($i=0; $i<$matchSize; $i++){
            $match = explode(",", $totalmatches[$i]);
            if ($match[1] == $currentuser[1]){
                unset($totalmatches[$i]); //avoiding same gender matches
            }
            else if ($match[4] != $currentuser[4]){
                unset($totalmatches[$i]); //avoiding different OS favorites
            }
            else if (($match[2] < $currentuser[5] || $match[2] > $currentuser[6]) || ($currentuser[2] < $match[5] || $currentuser[2] > $match[6])){
                unset($totalmatches[$i]); //checking gap preference and removing ones not matching
            }
            else if (!commonPersonality(str_split($match[3]), str_split($currentuser[3])))
            {
                unset($totalmatches[$i]); //removing records that do not have atleast matching personailties.
    
            }
        }
        $totalmatches = array_values($totalmatches); 
        return $totalmatches;
    }
    // preparing to display matches
    function displayMatches(){
        $totalmatch = createMatch();
        for ($i=0; $i<sizeof($totalmatch); $i++) {
            $recMatch = explode(",", $totalmatch[$i]);
            $filename = str_replace(" ","_",strtolower($recMatch[0]));
            $findfile = glob("./images/" . $filename . ".*")[0];
            //print all records
            echo "<div class='match'>
            <p><img src=" . $findfile . " alt='user icon' />
            " . $recMatch[0] . "</p>
            <ul>
                <li><strong>gender:</strong>" . $recMatch[1] . "</li>
                <li><strong>age:</strong>" . $recMatch[2] . "</li>
                <li><strong>type:</strong>" . $recMatch[3] . "</li>
                <li><strong>OS:</strong>" . $recMatch[4] . "</li>                        
            </ul>
            </div>";
        }
    }
    ?>
    <h1>Matches for <?=$userName?></h1>

    <?php displayMatches();?>
    <?php footerMain();?>
</body>
</html>



