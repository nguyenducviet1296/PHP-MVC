<?php
foreach ($listBook as $book): ?>
    <tr>
        <th><?php echo $book['ID']; ?></th>
        <th><?php echo $book['NAME']; ?></th>
        <th><?php echo $book['AUTHOR']; ?></th>
        <th><?php echo $book['CATEGORY']; ?></th>
        <th><?php echo $book['PublishedYear']; ?></th>
        <th><a id="btn-edit" class="fa fa-pencil-square-o" style="font-size: 20px;text-decoration: none" onclick="GetBookByID(<?php echo $book['ID']; ?>);" href="#"></a></th>
        <th><a id="btn-del" class="fa fa-trash" style="font-size: 20px;text-decoration: none" onclick="DeleteBook(<?php echo $book['ID']; ?>);" href="#"></a></th>
    </tr>
<?php endforeach; ?>


