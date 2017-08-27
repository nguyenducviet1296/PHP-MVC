<?php

function getAllBook()
{
    global $connect;
    $query = 'SELECT book.id as ID,book.name as NAME,
                                    authors.name as AUTHOR ,categories.name AS CATEGORY,
                                    book.publishedYear as PublishedYear FROM book
                                    INNER JOIN authors ON authors.id= book.idAuthor
                                    INNER JOIN categories ON book.idCategorie=categories.id';
    $result = $connect->query($query);
    $listBook = $result->fetchAll();
    return $listBook;
}

function addBook($name, $auId, $cateId, $pubYear)
{
    global $connect;
    $query = "INSERT INTO book (book.name,idAuthor,idCategorie,publishedYear)
              VALUES ('{$name}',$auId,$cateId,$pubYear)";
    $result = $connect->exec($query);
}

function editBook($bookId, $name, $auId, $cateId, $pubYear)
{
    global $connect;
    $query = "UPDATE book SET 
                    book.name = '{$name}',
                    idAuthor = {$auId},
                    idCategorie = {$cateId},
                    publishedYear = {$pubYear}
                     WHERE id=$bookId";
    $result = $connect->exec($query);
}

function deleteBook($bookId)
{
    global $connect;
    $query = "DELETE FROM book WHERE id=$bookId";
    $result = $connect->exec($query);
}

function getBookbyID($bookId)
{
    global $connect;
    $query = "SELECT categories.id as cateid,authors.id as auid, book.id as ID,book.name as NAME,
                                        authors.name as AUTHOR ,categories.name AS CATEGORY,
                                        book.publishedYear as PublishedYear FROM book
                                        INNER JOIN authors ON authors.id= book.idAuthor
                                        INNER JOIN categories ON book.idCategorie=categories.id WHERE book.id=$bookId";
    $result = $connect->query($query);
    $listBook = $result->fetch();
    return $listBook;
}

function searchBook($data)
{
    global $connect;
    $query = "SELECT book.id as ID, book.name as NAME,
                                    authors.name as AUTHOR, categories.name AS CATEGORY,
                                    book.publishedYear as PublishedYear FROM book
                                    INNER JOIN authors ON authors.id= book.idAuthor
                                    INNER JOIN categories ON book.idCategorie=categories.id WHERE book.name LIKE '%$data%'";
    $result = $connect->query($query);
    $list = $result->fetchAll();
    return $list;
}
