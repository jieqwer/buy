<?php

include_once("opensql.php");

$begin=$_POST['begin'];
$from=$_POST['from'];



echo json_encode([$begin,$from]);
