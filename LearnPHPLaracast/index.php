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

function filterByAuther ($books) {
  $filteredBooks = [];
  foreach ($books as $book) {   
  if ($book['name'] === "Andy Weir") {
    $filteredBooks[] = $book;
  }
}

}

?>

<ul>

</ul>

</body>
</html>
