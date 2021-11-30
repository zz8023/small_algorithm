<?php

$test = [
    ['2021-11-25 02:01:00', '2021-11-25 06:12:00'],
    ['2021-11-25 05:59:00', '2021-11-25 09:42:00'],
    ['2021-11-25 10:00:00', '2021-11-25 11:11:00'],
    ['2021-11-25 15:32:00', '2021-11-25 20:23:00'],
    ['2021-11-25 22:19:00', '2021-11-25 23:55:00'],
    ['2021-11-25 13:26:00', '2021-11-25 19:06:00'],
    ['2021-11-25 09:00:00', '2021-11-25 10:00:00'],
    ['2021-11-25 08:00:00', '2021-11-25 12:00:00'],
    ['2021-11-25 11:00:00', '2021-11-25 15:00:00']
];


$arr = [];
$n   = 1;
foreach($test as $value) {
    $arr[$n.':s'] = strtotime($value[0]); 
    $arr[$n.':e'] = strtotime($value[1]);
    $n ++; 
}




function format($arr)
{
    // 排序
    asort($arr);
    var_dump($arr);exit();

    // 格式化
    $offset = 0;
    foreach ($arr as $key => $value) {
        list($n, $p) = explode(':', $key);

        if ($p === 'e') {
            $offset --;
        }

        if ($offset !== 0) {
            unset($arr[$key]);
        }

        if ($p === 's') {
            $offset ++;
        }
    }

    // 分片
    $des_arr = array_chunk($arr, 2);

    // 汇总
    $total = 0;
    foreach ($des_arr as $value) {
        $total += ($value[1] - $value[0]); 
    }

    return $total;
}

$total = format($arr);
var_dump($total);