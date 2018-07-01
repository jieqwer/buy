<?php

session_start();
$str="0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM";
function createcode($str,$num,$type){
    $arr=array([0,9],[10,35],[0,35],[10,61],[0,61],[36,61]);
    if($type<count($arr)){
        $num1=$arr[$type][0];
        $num2=$arr[$type][1];
        $randNum="";
        for($i=0;$i<$num;$i++){
            $starNum=mt_rand($num1,$num2);
            $randNum.=substr($str,$starNum,1);
        }

        $_SESSION['code'] = $randNum;
        $code=json_encode($randNum);
        echo $code;
    }


    if($type==6){
        $num1=$arr[2][0];
        $num2=$arr[2][1];
        $randNum="";
        for($i=0;$i<$num;$i++){
            $starNum=mt_rand($num1,$num2);
            $randNum.=strtoupper(substr($str,$starNum,1));
        }
        $_SESSION['code'] = $randNum;
        $code=json_encode($randNum);
        echo $code;
    }
}

createcode($str,4,0);







?>