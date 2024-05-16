<html>
    <body>
        
 <?php

$books = [
     [
    'name' => 'Do Androids Dream of Eletric Sheep',
    'author' => 'Philip K. Dick',
    'releaseYear' => 1968,
    'purchaseURL' => 'http://example.com'  
     ],
     [
        'name'=> 'Project Hail Mary',
        'author' => 'Andy Weir',
        'releaseYear'=> 2021,
        'purchaseURL'=> 'http://example.com'
     ],
     [
        'name'=> 'The Martian',
        'author'=> 'Andy Weir',
        'releaseYear'=> 2011,
        'purchaseURL' => 'http://example.com'
        ],	
];

/*function filter ($items, $fn){

    $filteredItems = [];
    foreach ($items as $item) {
        if ($fn($item)) {
            $filteredItems[] = $item;
        }
    } 
    return $filteredItems;
}*/



//$filteredBooks = filter ($books, function($book){

$filteredBooks = array_filter ($books, function($book){
            return $book['releaseYear'] >=2000;
            
});


?>
<ul>
  <?php foreach ($filteredBooks as $book) : ?>
    
    <li>
      <a href="<?= $book['purchaseURL'] ?>">
        <?= $book['name']; ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
      </a>
    </li>
    <?php endforeach; ?>

  
</ul>

</body>
</html>
