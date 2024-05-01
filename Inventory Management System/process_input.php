<?php
    $inventory = [
        ['name' => 'Banana', 'price' => '0.50', 'quantity' => '30'],
        ['name'=> 'Apples', 'price' => '0.30','quantity'=> '50'],
        ['name' => 'Oranges', 'price' => '0.40', 'quantity' => '10']
    ];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
$name = htmlspecialchars($_POST['fruit']);
$price = htmlspecialchars($_POST['price']);
$action = $_POST['action'];
$found = false;

if ($action == 'search') {

foreach ($inventory as $item){

    if (strtolower($item['name']) == strtolower($name)){

        echo "Item: {$item['name']}, Price: \${$item['price']}, Quantity: {$item['quantity']}<br>"; 
    }



}
}else if ($action == "list_all") {

    foreach ($inventory as $item){
        echo "Item: {$item['name']}, Price: \${$item['price']}, Quantity: {$item['quantity']}<br>";  
        echo "test";
    }
}else if ($action == "update_price") {
    updatePrice($inventory, $name, $price);
    foreach ($inventory as $item){
        echo "Item: {$item['name']}, Price: \${$item['price']}, Quantity: {$item['quantity']}<br>";  
        echo "test";
    }
}

function updatePrice (&$inventory, $name, $newPrice = null) {
    if (isset($inventory[$name])){
        if ($newPrice != null) {
            $inventory[$name]["price"] = $newPrice;
        }
    }
}

}