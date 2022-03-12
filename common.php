<?php

function headerMain(){
    //header 
    echo '<div id="bannerarea">';
    echo '<img src="./images/nerdluv.png" alt="banner logo"/><br />';
    echo 'where meek geeks meet';
    echo '</div>';
}
function footerMain(){
    //footer
    echo "<div>";
    echo "<p>This page is for single nerds to meet and date each other!  
            Type in your personal information and wait for the nerdly luv to begin!  
            Thank you for using our site.</p>";
    echo "<p>Results and page (C) Copyright NerdLuv Inc.</p>";
			
    echo "<ul>";
    echo "<li>";
    echo "<a href='index.php'>";
    echo "<img src='./images/back1.PNG' alt='icon' />";
    echo "Back to front page";
    echo "</a>";
    echo "</li>";
    echo "</ul>";
	echo "</div>";

    echo "<div id='w3c'>";
    echo "<a href='https://webster.cs.washington.edu/validate-html.php'>";
    echo "<img src='./images/w3c-html.png' alt='Valid HTML' />";
    echo "</a>";
    echo "<a href='https://webster.cs.washington.edu/validate-css.php'>";
    echo "<img src='./images/w3c-css.png' alt='Valid CSS' />";
    echo "</a>";
    echo "</div>";
}
?>