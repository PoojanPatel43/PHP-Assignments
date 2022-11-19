<?php
    $server = "localhost"; $username = "root"; $password = ""; $dbname = "shopping";
    $conct = new mysqli ( $server, $username, $password);
    if ( $conct -> error  ) {
        die ( "Failed to create connection" );
    } else {
        $sql = "CREATE DATABASE IF NOT EXISTS SHOPPING";
        if ( $conct->query( $sql ) === true ) {
        } else { echo "Failed to create database<br>"; }
    }
    $conct->close();
    $conct = new mysqli ( $server, $username, $password, $dbname);
    $sql = "CREATE TABLE IF NOT EXISTS CUSTOMER ( CUST_NAME VARCHAR(30), CUST_ID VARCHAR(30) PRIMARY KEY, DOB DATE, MOBILENO BIGINT, EMAIL TEXT, PASS TEXT)";
    if ( $conct->query($sql) ) {} else {
        echo "failed to create";
    }
?>