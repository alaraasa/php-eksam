<?php
/**
 * @author Alar Aasa <alar@alaraasa.ee>
 */
if(!isset($mysqli)){
    header("Location: index.php");
}
$usrError = "";
$pswdError = "";
if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["firstname"]) && isset($_POST["lastname"])){
    if (!$_POST["username"]){
        $usrError = "Kasutajanimi on kohustuslik!";
    } else if (strlen($_POST["username"]) < 6) {
        $usrError = "Kasutajanimi peab olema pikem kui 6 tähemärki!";
    } else if (!$_POST["username"]) {
        $pswdError = "Salasõna on kohustuslik!";
    } else if (strlen($_POST["password"]) < 6) {
        $pswdError = "Salasõna peab olema pikem kui 6 tähemärki!";
    } else if($User->create($_POST["username"], $_POST["password"], $_POST["firstname"], $_POST["lastname"])){
        echo "<b> User created successfully!</b><br>
              <a href='index.php?page=login'>Log in</a>";
    } else {
        echo "<b> User creation failed! Please try again.</b>";
    }
}
?>

<form method="post">
    <label for="firstname">First name</label>
    <input type="text" name="firstname" id="firstname">

    <label for="lastname">Last name</label>
    <input type="text" name="lastname" id="lastname">

    <?=$usrError?>
    <label for="username">Username</label>
    <input type="text" name="username" id="username">

    <?=$pswdError?>
    <label for="password">Password</label>
    <input type="password" name="password" id="password">

    <button type="submit">Create account</button>
</form>

