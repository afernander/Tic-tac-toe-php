<?php include 'top.php';
    ?>
<?php // Do not put any HTML above this line
    if ( isset($_POST['cancel'] ) ) {
        // Redirect the browser to index.php
        header("Location: index.php");
        return;
    }
    //$salt = 'XyZzy12*_';
    //$stored_hash = 'a8609e8d62c043243c4e201cbb342862';  // Pw is meow123
    $salt = 'XyZzy12*_';
    $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1'; //new pwd php123
    //login name umsi@umich.edu
    $failure = false;  // If we have no POST data
    // Check to see if we have some POST data, if we do process it
    if ( isset($_POST['who']) && isset($_POST['pass']) ) {
        if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
            $failure = "User name and password are required";
        } else {
            //check = hash(newSalt + POST password)
            $check = hash('md5', $salt.$_POST['pass']);
            if ( $check == $stored_hash ) {
                // Redirect the browser to game.php
                header("Location: tttgame.php?name=".urlencode($_POST['who']));
                return;
            } else {
                $failure = "Incorrect password";
            }
        }
    }
    

    // Fall through into the View
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once "bootstrap.php"; ?>
        <title>32fb0afb</title>
        <link href="css/site.css" rel="stylesheet"/>
        <link type="text/css" rel="stylesheet" href="normalize.css">
        <link type="text/css" rel="stylesheet" href="boxes.css">
    </head>
    <body>
        <div class="container">
            <h1>Please Log In</h1>
            <?php
            // Note triple not equals and think how badly double
            // not equals would work here...
            if ( $failure !== false ) {
                // Look closely at the use of single and double quotes
                echo('<p style="color: red; font-style: italic;">'.htmlentities($failure)."</p>\n");
            }
            ?>
            <form method="POST">
                <label for="nam">User Name</label>
                <input type="text" name="who" id="nam" placeholder="Name"><br/>
                <label for="id_php123">Password</label>
                <input type="password" name="pass" id="id_php123" placeholder="Password"><br/>
                <input type="submit" name="login" value="Log In" >
                <input type="submit" name="cancel" value="Cancel">
            </form>
            <p>
            <!-- Hint: Old password is meow123 new ne is php123 -->
            </p>
        </div>
    </body>
<html>