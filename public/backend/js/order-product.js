function callApi(data, url, type) {
    return $.ajax({
        type: type,
        url: url,
        dataType: 'json',
        data: data,
    })
}

function showErrorOrderProduct(error) {
    error.quantity ? $('.qtyError').html(error.quantity[0]) : "";
}

$(function () {
    $('#handleAddOrderProduct').click(function (event) {
        event.preventDefault();
        billProductData = $('#newResourceFormOrderProduct').serialize();
        billProductUrl = '/admin/orderDetail';
        callApi(billProductData, billProductUrl, 'post')
            .done(response => {
                $('#newBillProductModal').modal('hide');
                swal("Thành công!", "Hãy bấm vào nút này!", "success");
                $('.swal-button--confirm').click(function () {
                });
              location.reload();
            })
            .fail(error => {

            });
    });

    $(document).on("click", '.btnDeleteOrderProductModal', function () {
        billproduct_id = $(this).attr('data-id');
        billProductUrl1 = '/admin/orderDetail/' + billproduct_id;
        callApi(billproduct_id, billProductUrl1, 'delete')
            .done(response => {
                swal("Thành công!", "Hãy bấm vào nút này!", "success");
                $('.swal-button--confirm').click(function () {
                })
                location.reload();
            })
            .fail(function (error) {
            });
    });

    $(document).on("click", ".btnEditOrderProductModal", function () {
        billproduct_id = $(this).attr('data-id');
        billProductUrl = '/admin/billProduct/' + billproduct_id;
        callApi(billproduct_id, billProductUrl, 'get')
            .done(function (data) {
                $('#product_' + data.data.product_id).attr('selected', 'selected');
                $('#editQuantity').val(data.data.quantity);
            })
            .fail(function (error) {
            })
    });

    $('#handleEditOrderProduct').click(function (event) {
        event.preventDefault();
        billProductData = $('#editResourceFormOrderProduct').serialize();
        billProductUrl = '/admin/billProduct/' + billproduct_id;
        callApi(billProductData, billProductUrl, 'put')
            .done(response => {
                $('#editBillProductModal').modal('hide');
                swal("Thành công!", "Hãy bấm vào nút này!", "success");
                $('.swal-button--confirm').click(function () {
                })
                location.reload();
            })
            .fail(error => {
                showErrorBillProduct(error.responseJSON.errors);
            });
    });

    $('#createQuantity,#editQuantity').keyup(function () {
        $('.qtyError').html("");
    });

});
