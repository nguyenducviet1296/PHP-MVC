<?php
function getAllCategory()
{
    global $connect;
    $query = "SELECT * FROM categories";
    $result = $connect->query($query);
    $listCategory = $result->fetchAll();
    return $listCategory;
}

function getCategoryById($catId)
{
    global $connect;
    $query = "SELECT * FROM categories WHERE id=$catId";
    $result = $connect->query($query);
    $category = $result->fetch();
    return $category;
}

function addCategory($name)
{
    global $connect;
    $query = "INSERT INTO categories(name) VALUES ('{$name}')";
    $result = $connect->exec($query);
}


function editCategory($catId, $name)
{
    global $connect;
    $query = "UPDATE categories SET name = '{$name}' where id = $catId";
    $result = $connect->exec($query);
}

function deleteCategory($catId)
{
    global $connect;
    $query = "DELETE FROM categories WHERE id=$catId";
    $result = $connect->exec($query);
}