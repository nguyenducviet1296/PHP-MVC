<?php
include 'layout/header.php'
?>
<?php include_once '../controller/categoryController.php' ?>
    <!-- /#page-wrapper -->
    <div id="page-wrapper">
        <div>
            <h1 style="margin-top: 0%">List category</h1>
            <a id="add-category" href="#" onclick="OpenAddCategory();">Add new category</a>
            <div id="form-add-category" class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <form name="act" action="" method="POST">
                        <h1 id="title-category">Add new category</h1>
                        <div id="idcategory" class="form-group">
                            <label>Id</label>
                            <input id="categoryId" type="text" name="categoryId" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input id="categoryName" type="text" name="categoryName" class="form-control"
                                   placeholder="Name">
                        </div>

                        <input id="btn-save-category" type="submit" value="Save" class="btn btn-primary" name="act">
                        <input type="button" value="Cancel" class="btn btn-primary" onclick="CloseAddCategory();">
                    </form>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody id="list-category">

                </tbody>
            </table>
        </div>
    </div>
    <!-- /#page-wrapper -->

<?php include 'layout/footer.php' ?>