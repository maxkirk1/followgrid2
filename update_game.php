<?php
    require("config.php");

    $q = strval($_GET['sql']);

    $con = mysqli_connect('107.180.4.88','maxkirkpatrick','jefferson1','FirstNameBasis');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }

    mysqli_select_db($con,"ajax_demo");
    $sql=$q;

    $result = mysqli_query($con,$sql);

/*
    $index = 0;
    while($row = mysqli_fetch_array($result)) {

        $gamess[$index] = $row;
        $index++;

    }  */
    echo json_encode($result);
    mysqli_close($con);
?>