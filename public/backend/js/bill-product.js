function addColumBillProduct(billProduct) {
    return `           <tr class="odd gradeX">
                        <td>${billProduct.bills[0].pivot.id}</td>
                            <td>${billProduct.name}</td>
                            <td><img src="../uploads/products/${billProduct.image}" height="100"
                                     width="100">
                            <td>
                                 ${billProduct.promotion_price}
                                <u>đ</u>
                            </td>
                            <td>${billProduct.bills[0].pivot.quantity}</td>
                            <td class="center">
                                <button class="btn btn-danger btnDeleteBillProductModal btn-del" data-toggle="modal"
                                        style="border-radius: 50%"
                                        data-target="#btnDeleteBillDetailModal" data-id="${billProduct.bills[0].pivot.id}"
                                        title="xoa">
                                    <i class="far fa-trash-alt"></i></button>

                                <button class="btn btn-primary btnEditBillProductModal" data-toggle="modal"
                                        style="border-radius: 50%"
                                        data-target="#editBillProductModal" data-id="${billProduct.bills[0].pivot.id}"
                                        title="sua">
                                    <i class="fas fa-pencil-alt"></i></button>
                            </td>
                        </tr> `;
}

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
        billProductUrl = '/admin/billProduct';
        callApi(billProductData, billProductUrl, 'post')
            .done(response => {
                $('#newBillProductModal').modal('hide');
                swal("Thành công!", "Hãy bấm vào nút này!", "success");
                $('.swal-button--confirm').click(function () {
                });
                let addColumBillProducts = addColumBillProduct(response.data);
                $('tbody').prepend(addColumBillProducts);
            })
            .fail(error => {
                showErrorBillProduct(error.responseJSON.errors);
            });
    });

    $(document).on("click", '.btnDeleteBillProductModal', function () {
        billproduct_id = $(this).attr('data-id');
        billProductUrl = '/admin/billProduct/' + billproduct_id;
        callApi(billproduct_id, billProductUrl, 'delete')
            .done(response => {
                swal("Thành công!", "Hãy bấm vào nút này!", "success");
                $('.swal-button--confirm').click(function () {
                })
                $(this).parents('tr').remove();
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
                let addColumBillProducts = addColumBillProduct(response.data);
                $(".btnEditBillProductModal[data-id=" + billproduct_id + "]").parents('tr').replaceWith(addColumBillProducts);
                $('.swal-button--confirm').click(function () {
                })
            })
            .fail(error => {
                showErrorBillProduct(error.responseJSON.errors);
            });
    });

    $('#createQuantity,#editQuantity').keyup(function () {
        $('.qtyError').html("");
    });

});
