<?php

include_once '../model/BookModel.php';
include_once '../default.php';
$act = isset($_GET['act']) ? $_GET['act'] : $_POST['act'];
switch ($act) {
    case 'default':
        include_once '../view/list-book.php';
        break;

    case 'show-all-book':
        $listBook = getAllBook();
        include_once '../view/table.php';
        break;

    case 'add-book':
        if (isset($_GET['act'])) {
            $name = $_POST['name'];
            $idAu = $_POST['author'];
            $idCate = $_POST['category'];
            $pubYear = $_POST['publishyear'];
            addBook($name, $idAu, $idCate, $pubYear);
        }
        include_once '../view/list-book.php';
        break;

    case 'get-detail-book':
        $id=$_GET['id'];
        $book=getBookbyID($id);
        echo $book['cateid'].'/'.$book['auid'].'/'.$book['NAME'].'/'.$book['PublishedYear'];
        break;

    case 'edit-book':
        if (isset($_GET['act'])) {
            $id = $_POST['bookId'];
            $name = $_POST['name'];
            $idAu = $_POST['author'];
            $idCate = $_POST['category'];
            $pubYear = $_POST['publishyear'];
            editBook($id, $name, $idAu, $idCate, $pubYear);
        }
        include_once '../view/list-book.php';
        break;

    case 'delete-book':
        $id = $_GET['id'];
        deleteBook($id);
        include_once '../view/list-book.php';
        break;

    case 'search-book':
        $data = isset($_GET['data']) ? $_GET['data'] : '';
        $list = searchBook($data);
        ?>
        <?php foreach ($list as $boo): ?>
        <tr>
            <th><?php echo $boo['ID']; ?></th>
            <th><?php echo $boo['NAME']; ?></th>
            <th><?php echo $boo['AUTHOR']; ?></th>
            <th><?php echo $boo['CATEGORY']; ?></th>
            <th><?php echo $boo['PublishedYear']; ?></th>
            <th><a id="btn-edit" class="fa fa-pencil-square-o" style="font-size: 20px;text-decoration: none" onclick="GetBookByID(<?php echo $boo['ID']; ?>);" href="#"></a></th>
            <th><a id="btn-del" class="fa fa-trash" style="font-size: 20px;text-decoration: none" onclick="DeleteBook(<?php echo $boo['ID']; ?>);" href="#"></a></th>
        </tr>
    <?php endforeach; ?>
        <?php break;
} ?>