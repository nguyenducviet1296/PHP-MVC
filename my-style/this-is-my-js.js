
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


var checkAddCategory = true;
CategoryLoad();
$('#idcategory').hide();
$('#form-add-category').hide();

function CategoryLoad() {
    $.ajax({
            url: 'categoryController.php?act=show-all-category',
            type: 'GET',
            success: function (data) {
                $('#list-category').html(data);
            }
        }
    );
}

function ClearFormCategory() {
    $('#categoryId').val("");
    $('#categoryName').val("");
}

function OpenAddCategory() {
    checkAddCategory = true;
    $('#title-category').html("Add new category");
    $('#form-add-category').show();
    $('#add-category').hide();
}

function CloseAddCategory() {
    ClearFormCategory();
    $('#idcategory').hide();
    $('#form-add-category').hide();
    $('#add-category').show();
}

function GetCategoryByID(id) {
    checkAddCategory = false;
    $.ajax({
        type: 'GET',
        url: 'categoryController.php?act=get-detail-category&id=' + id,
        success: function (data) {
            $('#title-category').text('Edit category');
            $('#categoryId').val(id);
            $('#categoryName').val(data);
            $('#form-add-category').show();
            $('#idcategory').show();
            $('#add-category').hide();
        }
    })
}

function DeleteCategory(id) {
    if (confirm('Bạn chắc chắn muốn xóa danh mục này?')) {
        $.ajax({
            type: 'GET',
            url: 'categoryController.php?act=delete-category&id=' + id,
            success: function () {
                CategoryLoad();
            }
        })
    }
}

$(document).ready(function () {
    $('#btn-save-category').click(function (e) {
        e.preventDefault();
        var dataAdd = {
            name: $('#categoryName').val()
        };
        var dataEdit = {
            id: $('#categoryId').val(),
            name: $('#categoryName').val()
        };
        if (checkAddCategory) {
            $.ajax({
                type: 'POST',
                url: 'categoryController.php?act=add-category',
                data: dataAdd,
                success: function () {
                    CategoryLoad();
                    $('#add-category').show();
                    ClearFormCategory();
                    $('#form-add-category').hide();
                }
            })
        }
        else {
            $.ajax({
                type: 'POST',
                url: 'categoryController.php?act=edit-category',
                data: dataEdit,
                success: function () {
                    checkAddCategory=true;
                    CategoryLoad();
                    $('#idcategory').hide();
                    $('#add-category').show();
                    ClearFormCategory();
                    $('#form-add-category').hide();
                }
            })
        }
    })
});


var checkAddAuthor = true;
AuthorLoad();
$('#idauthor').hide();
$('#form-add-author').hide();

function AuthorLoad() {
    $.ajax({
            url: 'authorController.php?act=show-all-author',
            type: 'GET',
            success: function (data) {
                $('#list-author').html(data);
            }
        }
    );
}

function ClearFormAuthor() {
    $('#authorId').val("");
    $('#authorName').val("");
    $('#authorEmail').val("");
    $('#authorPhone').val("");
    $('#authorAddress').val("");
    $('#birthDateAuthor').val("");
}

function OpenAddAuthor() {
    checkAddAuthor = true;
    $('#title-author').html("Add new author");
    $('#form-add-author').show();
    $('#add-author').hide();
}

function CloseAddAuthor() {
    ClearFormAuthor();
    $('#idauthor').hide();
    $('#form-add-author').hide();
    $('#add-author').show();
}

function GetAuthorByID(id) {
    checkAddAuthor = false;
    $.ajax({
        type: 'GET',
        url: 'authorController.php?act=get-detail-author&id=' + id,
        success: function (data) {
            var author = data.split('/');
            $('#title-author').text('Edit author');
            $('#authorId').val(id);
            $('#authorName').val(author[0]);
            $('#authorEmail').val(author[1]);
            $('#authorPhone').val(author[2]);
            $('#authorAddress').val(author[4]);
            $('#birthDateAuthor').val(author[3]);
            $('#form-add-author').show();
            $('#idauthor').show();
            $('#add-author').hide();
        }
    })
}

function DeleteAuthor(id) {
    if (confirm('Bạn chắc chắn muốn xóa tác giả này?')) {
        $.ajax({
            type:'GET',
            url:'authorController.php?act=delete-author&id='+id,
            success:function () {
                AuthorLoad();
            }
        })
    }
}

$(document).ready(function () {
    $('#btn-save-author').click(function (e) {
        e.preventDefault();
        var dataAdd = {
            name: $('#authorName').val(),
            email: $('#authorEmail').val(),
            phone: $('#authorPhone').val(),
            address: $('#authorAddress').val(),
            birthDate: $('#birthDateAuthor').val()
        };
        var dataEdit = {
            id: $('#authorId').val(),
            name: $('#authorName').val(),
            email: $('#authorEmail').val(),
            phone: $('#authorPhone').val(),
            address: $('#authorAddress').val(),
            birthDate: $('#birthDateAuthor').val()
        };
        if (checkAddAuthor) {
            $.ajax({
                type: 'POST',
                url: 'authorController.php?act=add-author',
                data: dataAdd,
                success: function () {
                    AuthorLoad();
                    $('#add-author').show();
                    ClearFormAuthor();
                    $('#form-add-author').hide();
                }
            })
        }
        else {
            $.ajax({
                type: 'POST',
                url: 'authorController.php?act=edit-author',
                data: dataEdit,
                success: function () {
                    checkAddAuthor=true;
                    AuthorLoad();
                    $('#idauthor').hide();
                    $('#add-author').show();
                    ClearFormAuthor();
                    $('#form-add-author').hide();
                }
            })
        }
    })
});




