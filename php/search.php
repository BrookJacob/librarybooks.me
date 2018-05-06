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
        <div class="splash"></div>
        <div class="results-search-bar">
            <form class="main-search-bar" name="search" action="search.php?go" method="post">
                <input class="main-search-bar" type="text" name="main-search-bar" placeholder="isbn, title, author, genre" autocomplete="off">
            </form>
            <div class="live-results"></div>	
        </div>
        <div class="search">
            <ul class="search-results">
            <li class="search-result"><a class="search-result-link" href="result.php?ISBN=978-0451524935">1984, George Orwell, Science Fiction</a><i class="material-icons">menu</i><div class="hidden-add"><a class="hidden-add-link">add to my library</a></div></li>
<?php
	require("common.php");
    $search = $_POST['main-search-bar'];
	$sql = "SELECT b.ISBN13, b.title, b.author, g.genreName FROM books AS b, genres as g WHERE b.title LIKE '%".$search."%' OR b.author LIKE '%".$search."%' OR b.ISBN13 = '".$search."' OR b.ISBN10 = '".$search."' OR g.genreName LIKE '%".$search."%' AND b.genreID = g.genreID";
    $params = array( &$search, &$search, &$search, &$search, &$search );
    $stmt = sqlsrv_query( $conn, $sql, $params );
    if( $stmt === false ){
        echo sqlsrv_errors();
        die( print_r( sqlsrv_errors(), true) );
    }
	while ( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
		echo '<li class="search-result"><a class="search-result-link" href="result.php?ISBN13='.$row['ISBN13'].'">'.$row['title'].', '.$row['author'].', '.$row['genreName'].'</a><a href="  "><i class="material-icons">menu</i></a><div class="hidden-add"><a class="hidden-add-link">add to my library</a></div></li>';
    }
    
    sqlsrv_close( $conn );
?>
            </ul>
        </div>
</body>
</html>