<?php
foreach ($listAuthor as $author): ?>
    <tr>
        <th><?php echo $author['id']; ?></th>
        <th><?php echo $author['name']; ?></th>
        <th><?php echo $author['email']; ?></th>
        <th><?php echo $author['phoneNumber']; ?></th>
        <th><?php echo $author['birthDate']; ?></th>
        <th><?php echo $author['address']; ?></th>
        <th><a class="fa fa-pencil-square-o" style="font-size: 20px;text-decoration: none" href="#" onclick="GetAuthorByID(<?php echo $author['id']; ?>)">
            </a>
        </th>
        <th><a class="fa fa-trash" style="font-size: 20px;text-decoration: none" onclick="DeleteAuthor(<?php echo $author['id']; ?>);"
               href="#"></a></th>
    </tr>
<?php endforeach;?>