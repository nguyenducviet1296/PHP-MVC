<?php
include 'layout/header.php'
?>
<?php include_once '../controller/authorController.php' ?>
    <!-- /#page-wrapper -->
    <div id="page-wrapper">
        <div>
            <h1 style="margin-top: 0%">List author</h1>
            <a id="add-author" href="#" onclick=" OpenAddAuthor();">Add new author</a>
            <div id="form-add-author" class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <form name="act" action="" method="POST">
                        <h1 id="title-author">Add new author</h1>
                        <div id="idauthor" class="form-group">
                            <label>Id</label>
                            <input id="authorId" type="text" name="authorId" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input id="authorName" type="text" name="authorName" class="form-control"
                                   placeholder="Name">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input id="authorEmail" type="text" name="authorEmail" class="form-control"
                                   placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label>Phone number</label>
                            <input id="authorPhone" type="text" name="authorPhone" class="form-control"
                                   placeholder="Phone number">
                        </div>

                        <div class="form-group">
                            <label>Birth of date</label>
                            <input id="birthDateAuthor" type="text" name="birthDateAuthor" class="form-control"
                                   placeholder="yyyy/dd/MM">
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <input id="authorAddress" type="text" name="authorAddress" class="form-control"
                                   placeholder="Address">
                        </div>

                        <input id="btn-save-author" type="submit" value="Save" class="btn btn-primary" name="act">
                        <input type="button" value="Cancel" class="btn btn-primary" onclick="CloseAddAuthor();">
                    </form>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Birth of date</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody id="list-author">

                </tbody>
            </table>
        </div>
    </div>
    <!-- /#page-wrapper -->

<?php include 'layout/footer.php' ?>