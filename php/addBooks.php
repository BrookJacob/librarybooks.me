<?php
    session_start();
?>
<html>
<head>
    <title>library books</title>
    <link href="../css/main.css" type="text/css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
    <body class="splash">
        <div class="menu-bar">
            <ul class="menu-buttons">
                <li class="menu-button"><a class="menu-button-link" href="../index.php">library books</a></li>
                <li class="menu-button"><a class="menu-button-link" href="../index.php#about">about</a></li>
                <li class="menu-button"><a class="menu-button-link" href="../index.php#feedback">feedback</a></li>
                <?php
                if(empty($_SESSION['user'])){
                    echo '<li class="menu-button menu-right"><a class="menu-button-link" href="login.php">sign in</a></li>';
                    echo '<li class="menu-button menu-right"><a class="menu-button-link" href="register.php">sign up</a></li>';
                    echo '<li class="cheat"></li>';
                } else {
                    echo '<li class="menu-button"><a class="menu-button-link" href="library.php">my library</a></li>';
                    echo '<li class="menu-button menu-right"><a class="menu-button-link" href="account.php">account</a></li>';
                    echo '<li class="menu-button menu-right"><a class="menu-button-link" href="logout.php">log out</a></li>';
                    echo '<li class="cheat"></li>';
                }
                ?>
            </ul>
        </div>
        <div class="add-result">
            <form class="add-results" action="addBooks()" method="post">
                <input class="add-results-input" type="text" placeholder="Book Title" name="title">
                <input class="add-results-input" type="text" placeholder="Author" name="author">
                <input class="add-results-input" type="text" placeholder="Genre" name="genre"><br>
                <input class="add-results-input" type="text" placeholder="publisher" name="publisher">
                <input class="add-results-input" type="text" placeholder="ISBN10" name="ISBN10">
                <input class="add-results-input" type="text" placeholder="ISBN13" name="ISBN13"><br>
                <input class="add-results-input submit" type="submit" name="submit">
            </form>
            </div>
        <?php
                require("common.php");

                function addBooks() {
                    echo 'hello';
                }
        ?>
    </body>
</html>