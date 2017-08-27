<?php
include_once '../model/AuthorModel.php';
include_once '../default.php';

$act = isset($_GET['act']) ? $_GET['act'] : $_POST['act'];
switch ($act) {
    case 'default':
        include_once '../view/list-author.php';
        break;

    case 'show-all-author':
        $listAuthor = getAllAuthor();
        include_once '../view/table-author.php';
        break;

    case 'add-author':
        if (isset($_GET['act'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $birthDate = $_POST['birthDate'];
            $address = $_POST['address'];
            addAuthor($name, $email, $phone, $birthDate, $address);
        }
        include_once '../view/list-author.php';
        break;

    case 'get-detail-author':
        $auId = $_GET['id'];
        $author = getAuthorById($auId);
        echo $author['name'] . '/' . $author['email'] . '/' . $author['phoneNumber'] . '/' . $author['birthDate'] . '/' . $author['address'];
        break;

    case 'edit-author':
        if (isset($_GET['act'])) {
            $auId=$_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $birthDate = $_POST['birthDate'];
            $address = $_POST['address'];
            editAuthor($auId, $name, $email, $phone, $birthDate, $address);
        }
        include_once '../view/list-author.php';
        break;

    case 'delete-author':
        $auId = $_GET['id'];
        deleteAuthor($auId);
        break;
}