<?php

function getAllAuthor()
{
    global $connect;
    $query = "SELECT * FROM authors";
    $result = $connect->query($query);
    $listAuthors = $result->fetchAll();
    return $listAuthors;
}

function addAuthor($name, $email, $phone, $birthDay, $address)
{
    global $connect;
    $query = "INSERT INTO authors(name,email,phoneNumber,birthDate,address)
            VALUES ('{$name}', '{$email}', '{$phone}', '{$birthDay}', '{$address}')";
    $result = $connect->exec($query);
}

function editAuthor($auId, $name, $email, $phone, $birthDay, $address)
{
    global $connect;
    $query = "UPDATE  authors
            SET name ='{$name}',
                email ='{$email}',
                phoneNumber ='{$phone}',
                birthDate ='{$birthDay}',
                address ='{$address}' 
                WHERE id = $auId";
    $result = $connect->exec($query);
}

function deleteAuthor($auId)
{
    global $connect;
    $query = "DELETE FROM authors WHERE id = $auId";
    $result = $connect->exec($query);
}

function getAuthorById($auId)
{
    global $connect;
    $query = "SELECT * FROM authors WHERE id = $auId";
    $result = $connect->query($query);
    $listAuthors = $result->fetch();
    return $listAuthors;
}

