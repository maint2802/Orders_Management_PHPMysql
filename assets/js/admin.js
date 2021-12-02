 // add dialod show and hide
 $('#add-order-btn').click(function (e) { 
    $('#add-order-dialog').show();
});

$('#btn-cancel').click(function (e) { 
    $('#add-order-dialog').hide();
});

$('#add-order-dialog').click(function (e) { 
    $('#add-order-dialog').hide();
});

$('#add-form-dialog').click(function (event) { 
    event.stopPropagation()
});

//thông báo trc khi delete đơn hàng
function Del(){
    return confirm("Bạn có chắc muốn xóa đơn hàng này?");
}





// dùng ajax để tìm kiếm tên đơn hàng 
$('#search-input').keyup(function (e) { 
    var result = $('#search-input').val();
    $.post("search.php", {data: result},
        function (data) {
            $('#table-body').html(data);
        },
    );
});



// lọc theo trạng thái đơn hàng 
$('#status-cbx').change(function (e) { 
    var result = $('#status-cbx').val();
    $.post("filterStatus.php", {data: result},
        function (data) {
            $('#table-body').html(data);
        },
    );
});


// lọc theo loại đơn hàng 
$('#type-cbx').change(function (e) { 
    var result = $('#type-cbx').val();
    $.post("filtertype.php", {data: result},
        function (data) {
            $('#table-body').html(data);
        },
    );
});



$('#sort-cbx').change(function (e) { 
    var result = $('#sort-cbx').val();
    $.post("sort.php", {data: result},
        function (data) {
            $('#table-body').html(data);
        },
    );
});