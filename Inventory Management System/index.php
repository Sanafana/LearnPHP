<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management System</title>
</head>
<body>
    <h4>Simulate a basic inventory system where you have an array of items,</h4>
    <h4>each with properties like name, price, and quantity. Use foreach to loop through the items and perform tasks like listing all items, updating quantities, and calculating total inventory value.</h4>

  
    <?php
    $inventory = [
                ['name' => 'Banana', 'price' => '0.50', 'quantity' => '30'],
                ['name'=> 'Apples', 'price' => '0.30','quantity'=> '50'],
                ['name' => 'Oranges', 'price' => '0.40', 'quantity' => '10']
            ];


        foreach ($inventory as $item){
            echo "Item: {$item['name']}, Price: \${$item['price']}, Quantity: {$item['quantity']}<br>";   
        }





    ?>

    

</body>
</html>