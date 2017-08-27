<?php
foreach ($listCategory as $category): ?>
    <tr>
        <th><?php echo $category['id']; ?></th>
        <th><?php echo $category['name']; ?></th>
        <th><a class="fa fa-pencil-square-o" style="font-size: 20px;text-decoration: none" href="#" onclick="GetCategoryByID(<?php echo $category['id']; ?>);">
            </a>
        </th>
        <th><a class="fa fa-trash" style="font-size: 20px;text-decoration: none" onclick="DeleteCategory(<?php echo $category['id'] ?>);"
               href="#" ></a></th>
    </tr>
<?php endforeach;?>