<?php

/*
 * PHP SimpleXML
 * Loading a XML from a file, adding new elements and editing elements
 */
//get details from form
if(isset($_SERVER['HTTP_REFERER'])){
    header("Location: " . $_SERVER['HTTP_REFERER']);    
} else {
    echo "An Error";
}

$author = $_POST["author"];
$title = $_POST["title"];
$genre = $_POST["genre"];
$price = $_POST["price"];


//echo "Hello, "+$author;

if (file_exists('books.xml')) {
    //loads the xml and returns a simplexml object
    
    $xml = simplexml_load_file('books.xml');
    $newChild = $xml->addChild('book');
    $newChild->addChild('author', $author);
    $newChild->addChild('title', $title);
    $newChild->addChild('genre', $genre);
    $newChild->addChild('price', $price);

    //transforming the object in xml format
    $output = $xml->asXML();
    echo '<u><b>This is the xml code from test2.xml with new elements added:</b></u>
     <br /><br />
     <pre>' . htmlentities($output, ENT_COMPAT | ENT_HTML401, "ISO-8859-1") . '</pre>';
} else {
    exit('Failed to open books.xml.');
}
//save changes
 file_put_contents('/home/cabox/workspace/UpdateXml/books.xml', $xml->asXML());
?>