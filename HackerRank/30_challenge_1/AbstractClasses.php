<?php
abstract class Book
{
    
    protected $title;
    protected  $author;
    
     function __construct($t,$a){
        $this->title=$t;
        $this->author=$a;
    }
    abstract protected function display();
}

class MyBook extends Book 
{
    protected $price;

    function __construct($title, $author, $price)
    {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
    }

    function display() {
        print("Title: {$this->title}");
        print("Author: {$this->author}");
        print("Price: {$this->price}\n");
    }
}

$stdin = fopen("AbstractClasses.txt", "r");

$title=fgets($stdin);
$author=fgets($stdin);
$price=intval(fgets($stdin));
$novel=new MyBook($title,$author,$price);
$novel->display();

?>