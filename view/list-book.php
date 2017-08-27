<?php
include 'layout/header.php'
?>
<?php include_once '../controller/bookController.php' ?>
    <!-- /#page-wrapper -->
    <div id="page-wrapper">
        <div>
            <h1 style="margin-top: 0%">List book</h1>
            <a id="add-book" href="#" onclick="OpenFormAdd();">Add new book</a>
            <!--Form Add-->
            <div id="form-add" class="row">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <form id="form-add-book" name="act" action="" method="POST">
                        <h1 id="title">Add new book</h1>
                        <div id="idbook" class="form-group">
                            <label>Id</label>
                            <input id="bookId" type="text" name="bookId" class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input id="name" type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <select id="author" name="author">
                                <option value="">--Select Author--</option>
                                <?php
                                global $connect;
                                $query = 'SELECT id,name FROM authors';
                                $result = $connect->query($query);
                                $list = $result->fetchAll();
                                foreach ($list as $au) {
                                    ?>
                                    <option value="<?php echo $au['id']; ?>">
                                        <?php echo $au['name'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select id="category" name="category">
                                <option value="">--Select Category--</option>
                                <?php
                                global $connect;
                                $query = 'SELECT id,name FROM categories';
                                $result = $connect->query($query);
                                $list = $result->fetchAll();
                                foreach ($list as $cate) {
                                    ?>
                                    <option value="<?php echo $cate['id']; ?>">
                                        <?php echo $cate['name'] ?>
                                    </option>
                                    <?php
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Published Year</label>
                            <input id="publishyear" type="text" name="publishyear" class="form-control"
                                   placeholder="Published year">
                        </div>
                        <input id="btn-save" type="submit" value="Save" class="btn btn-primary" name="act">
                        <input type="button" value="Cancel" class="btn btn-primary" onclick="CloseFormAdd();">
                    </form>
                </div>
            </div>

            <!--Form Add-->
            <!--Form Edit-->
            <!--Form Edit-->
            <!--List-->
            <div style="margin-top:20px" class="custom-search-form">
                <input id="txt-search" type="text" class="form-control" placeholder="Search book...">
            </div>
            <table class="table table-hover" id="default-table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Published year</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody id="list-main">
                </tbody>
            </table>
            <!--List-->
        </div>
    </div>
    <!-- /#page-wrapper -->
    <script>
        var checkInsert = true; // true:insert , false: update

        $('#idbook').hide();
        $('#form-add').hide();
        FormLoad();

        function ClearAll() {
            $('#name').val("");
            $('#author').val("");
            $('#category').val("");
            $('#publishyear').val("");
        }

        function FormLoad() {
            $.ajax({
                    url: 'bookController.php?act=show-all-book',
                    type: 'GET',
                    success: function (data) {
                        $('#list-main').html(data);
                    }
                }
            );
        }

        function CloseFormAdd() {
            ClearAll();
            $('#form-add').hide();
            $('#add-book').show();
            $('#idbook').hide();

        }

        function OpenFormAdd() {
            checkInsert = true;
            $('#title').text('Add new book');
            $('#add-book').hide();
            $('#form-add').show();
        }

        function GetBookByID(id) {
            checkInsert = false;
            $.ajax({
                type: 'GET',
                url: 'bookController.php?act=get-detail-book&id=' + id,
                success: function (data) {
                    var book = data.split('/');
                    $('#title').text('Edit book');
                    $('#bookId').val(id);
                    $('#category').val(book[0]);
                    $('#author').val(book[1]);
                    $('#name').val(book[2]);
                    $('#publishyear').val(book[3]);
                    $('#form-add').show();
                    $('#idbook').show();
                    $('#add-book').hide();
                }
            })
        }

        function DeleteBook(id) {
            if (confirm('Bạn chắc chắn muốn xóa cuốn sách này?')) {
                $.ajax({
                    type:'GET',
                    url:'bookController.php?act=delete-book&id='+id,
                    success:function () {
                        FormLoad();
                    }
                })
            }
        }

        $(document).ready(function () {
            $("#txt-search").keyup(function () {
                var txt = $(this).val();
                $.get('bookController.php?act=search-book&data=' + txt, {data: txt}, function (data) {
                    $("#list-main").html(data);
                })
            });
            $('#btn-save').click(function (e) {
                e.preventDefault();
                var dataAdd = {
                    name: $('#name').val(),
                    author: $('#author').val(),
                    category: $('#category').val(),
                    publishyear: $('#publishyear').val()
                };
                var dataEdit = {
                    bookId: $('#bookId').val(),
                    name: $('#name').val(),
                    author: $('#author').val(),
                    category: $('#category').val(),
                    publishyear: $('#publishyear').val()
                };
                if (checkInsert) {
                    $.ajax({
                        type: 'POST',
                        url: 'bookController.php?act=add-book',
                        data: dataAdd,
                        success: function () {
                            FormLoad();
                            $('#add-book').show();
                            ClearAll();
                            $('#form-add').hide();
                        }
                    })
                }
                else {
                    $.ajax({
                        type: 'POST',
                        url: 'bookController.php?act=edit-book',
                        data: dataEdit,
                        success: function () {
                            checkInsert = true;
                            $('#idbook').hide();
                            FormLoad();
                            $('#add-book').show();
                            ClearAll();
                            $('#form-add').hide();
                        }
                    })
                }
            });
        });

    </script>
<?php include 'layout/footer.php' ?>