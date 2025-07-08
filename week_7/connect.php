<?php

$connect= mysqli_connect('localhost', 'PaulDhawan', 'Paulie@123', 'schools');

    if(!$connect){
        die("Connection Failed: " . mysqli_connect_error());
    }