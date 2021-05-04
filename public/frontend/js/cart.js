function callAjax1(url, data = null, type = 'get') {
    return $.ajax({
        url: url,
        type: type,
        data: data,
        dataType: 'json'
    });
}

$(function () {
    $('.quantity-update').click(function (event) {
        event.preventDefault();
        let id = $(this).attr('cart');
        let url = '/sua-gio-hang/' + id;
        let quantity = $('#qty-' + id).val();
        let data = {
            "qty": quantity,
            "_token": $('meta[name="csrf-token"]').attr('content')
        };
        callAjax1(url, data, 'post')
            .done(data => {
                location.reload();
            })
    });
});
