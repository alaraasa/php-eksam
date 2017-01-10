<?php
/**
 * @author Alar Aasa <alar@alaraasa.ee>
 * @description Menu for navigating the website
 */

?>

<div>
    <a href="index.php?page=list">Monitors</a>
    <?php
    if(isset($_SESSION["username"])){
        echo '<a href="index.php?page=logout">Log out</a>';
    } else {
        echo '
            <a href="index.php?page=login">Log in</a>
            <a href="index.php?page=register">Register</a>
            ';
    }
    ?>


</div>
