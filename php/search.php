<?php
    $serverName = "librarybooks.database.windows.net";
    $connectionOptions = array(
        "Database" => "librarybooks",
        "Uid" => "LBADMIN",
        "PWD" => "Pirate88"
     );
    //Establishes the connection
    $conn = sqlsrv_connect($serverName, $connectionOptions);
    if( $conn ) {
        echo "Connection established. <br />";
    } else {
        echo "Connection could not be established. <br />";
        die( print_r( sqlsrv_errors(), true));
    }
    $sql = "SELECT * FROM books";
    $stmt = sqlsrv_query( $conn, $sql);
    if( $stmt === false) {
        die(print_r( sqlsrv_errors(), true));
    }
    sqlsrv_close( $conn );
?>