<?php
/**
 * Book class
 */
class Book {
    private $title;
    private $availableCopies;

    public function __construct($title, $availableCopies) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true;
        } else {
            return false;
        }
    }

    public function returnBook() {
        $this->availableCopies++;
    }
}

/**
 * Member Class
 */
class Member {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function borrowBook($book) {
        return $book->borrowBook();
    }

    public function returnBook($book) {
        $book->returnBook();
    }
}

// books
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);
$books = [$book1, $book2];

// members
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

// members borrow books
$member1->borrowBook($book1);
$member2->borrowBook($book2);

// output
$format = php_sapi_name() == "cli" ? "\n" : "<br>\n";
$output = "";
foreach ($books as $book) {
    $output .= "Available Copies of '" . $book->getTitle() . "': " . $book->getAvailableCopies() . $format;
}

echo $output;