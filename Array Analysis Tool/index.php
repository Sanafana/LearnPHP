<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: grid;
            place-items: center;
            height: 100vh;
            margin: 0;
            font-family: sans-serif;
        }
    </style>
</head>

<body>
<?php 
    $nums = [10, -20, 60, 40, 50];// array

    //call functions AI MAIN 

//------------------------call calculateSum---------------------
    $totalSum = calculateSum($nums); 
    echo ("the sum is: $totalSum "); 
    echo '<br/>';
 //------------------------END call calculateSum---------------------

//------------------------call calculateAvg---------------------
    $average = calculateAvg($nums, $totalSum);
    echo ("the average is: $average");
    echo '<br/>';
//------------------------END call calculateAvg---------------------

//------------------------call calculateAvgWithoutSum---------------------
    $avgWOsum = calculateAvgWithoutSum($nums);
    echo ("avg without Sum $avgWOsum");
    echo '<br/>';
//------------------------END call calculateAvgWithoutSum---------------------

$max = maxvalue($nums);
echo ("Max Value of the array: $max");
echo '<br/>';

$min = minvalue($nums);
echo ("Min value of the array: $min");

// --------------------FUNCTIONS ------------------------------------

    function calculateSum($numbers) {
        $sum = 0;
        foreach ($numbers as $number) {
            $sum += $number;
        }
        return $sum;
    }

    function calculateAvg($numbers, $totalSum) {
       $num = count( $numbers);
       return $totalSum / $num;
    }


   function calculateAvgWithoutSum($numbers) {
    $totalSum = 0;
    foreach ($numbers as $number) {
            $totalSum += $number;
}
    return $totalSum / count($numbers);
   }


   function maxvalue($numbers) {
    $max = $numbers[0];
    foreach ($numbers as $number) {
        if ($number > $max) {
            $max = $number;
    }
   }
   return $max;
}

function minvalue($numbers) {
$min = $numbers[0];
foreach ($numbers as $number) {
    if ($number < $min) {
        $min = $number;
    }

}
return $min;
}
?>


</body>

</html>