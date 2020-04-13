<?php

function findMin(){
    $random_number_array = range(0, 100);
    shuffle($random_number_array );
    $random_number_array = array_slice($random_number_array ,0,10);

    echo implode(', ',$random_number_array);
    $min=$random_number_array[0];
    $index=0;
    for ($i=1;$i<count($random_number_array);$i++){
        if ($random_number_array[$i]<$min){
            $min=$random_number_array[$i];
            $index=$i;
        }
    }
    echo '<br>';
    echo 'The smallest number is: '.$min.' and its index is: '.($index+1);
}
findMin();