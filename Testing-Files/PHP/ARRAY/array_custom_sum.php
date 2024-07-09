<?php

function array_custom_sm(array $arr){

    $num = 0;

    foreach($arr as $sum){
        $num  += $sum;
    }

    ECHO  $num;

}

array_custom_sm([2]); echo "<br>"; // instead of ECHO array_sum([32,54]); build in function

function all_employees($arr){

   $sum = 0;
    for ($i = 0; $i < count($arr); $i++) { // 0 <= 2 // 0 to 1 , 1 to 2
      
        $sum++;
    }

    return $sum;
}

echo all_employees(['mkarim','dulal']); // 1 index, count 2  //  1 < 2 ,, 2 = 2

echo "<br>";


$category_totals = [];
$category_totals = ['Electronices'];
$category_totals = ['Electronices' => 0];
$category_totals = ['Electronices' => 34]; // 0 + 34
$category_totals = ['Electronices' => 40 , 'Accessories' => 0]; // 0 + 34 + 6

echo "<br>";

$category_totals = ['Electronices' => 34];

echo $category_totals['Electronices']; // 34

$counts = 0;
$counts++; $counts = $counts + 1;

function count_occurrences($arr){
    $counts  = [];
    foreach($arr as $item){
        if(isset($counts[$item])){
            $counts[$item]++; // $counts[$item] = $count[item] + 1; means ['apple' => 1+1]
        }else{
            $counts[$item] = 1; // means ['apple' => 1]
        }
    }
}