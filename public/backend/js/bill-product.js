
function callApi(data, url, type) {
    return $.ajax({
        type: type,
        url: url,
        dataType: 'json',
        data: data,
    })
}

function showErrorBillProduct(error) {
    error.quantity ? $('.qtyError').html(error.quantity[0]) : "";
}

$(function () {
    $('#handleAddBillProduct').click(function (event) {
        event.preventDefault();
        billProductData = $('#newResourceFormBillProduct').serialize();
        billProductUrl = '/laptopstore/public/admin/billDetail';
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

    $(document).on("click", ".btnDeleteBillProductModal", function () {
        billproduct_id = $(this).attr('data-id');
        billProductUrl1 = '/laptopstore/public/admin/billDetail/' + billproduct_id;
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

    $(document).on("click", ".btnEditBillProductModal", function () {
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

    $('#handleEditBillProduct').click(function (event) {
        event.preventDefault();
        billProductData = $('#editResourceFormBillProduct').serialize();
        billProductUrl = '/admin/billProduct/' + billproduct_id;
        callApi(billProductData, billProductUrl, 'put')
            .done(response => {
                $('#editBillProductModal').modal('hide');
                swal("Thành công!", "Hãy bấm vào nút này!", "success");
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
