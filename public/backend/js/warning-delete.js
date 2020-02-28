$(document).ready(function () {
    $('.btn-del').click(function () {
        var del = confirm('Bạn muốn xóa dòng dữ liệu này?');
        if (del == false) {
            return false;
        }
    });
});

