<?php

$connect= mysqli_connect('localhost', 'PaulDhawan', 'Paulie@123', 'designer_tracker');

    if(!$connect){
        die("Connection Failed: " . mysqli_connect_error());
    }