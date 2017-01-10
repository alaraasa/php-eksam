<?php
if (!isset($mysqli)) {
    header("Location: index.php");
}
/**
 * @author Alar Aasa <alar@alaraasa.ee>
 */

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $login = $User->login($_POST["username"], $_POST["password"]);
    if ($login){
        header("Location: index.php");
    } else {
        echo "Log in failed. Please try again.";
    }
}
?>


<form method="post">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">

    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <button type="submit">Log in</button>
</form>

