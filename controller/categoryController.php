<?php
include_once '../model/CategoryModel.php';
include_once '../default.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];
} else {
    $act = $_POST['act'];
}
$act = isset($_GET['act']) ? $_GET['act'] : $_POST['act'];
switch ($act) {
    case 'default':
        include_once '../view/list-category.php';
        break;

    case 'show-all-category':
        $listCategory = getAllCategory();
        include_once '../view/table-category.php';
        break;

    case 'add-category':
        if (isset($_GET['act'])) {
            $name = $_POST['name'];
            addCategory($name);
        }
        include_once '../view/list-category.php';
        break;

    case 'get-detail-category':
        $catId = $_GET['id'];
        $category = getCategoryById($catId);
        echo $category['name'];
        break;

    case 'edit-category':
        if (isset($_GET['act'])) {
            $catId=$_POST['id'];
            $name = $_POST['name'];
            editCategory($catId, $name);
        }
        break;

    case 'delete-category':
        $catId = $_GET['id'];
        deleteCategory($catId);
        break;
}
