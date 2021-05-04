<div class="modal fade" id="editBillProductModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Sửa chi tiết phiếu nhập kho</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" data-url="" method="POST" id="editResourceFormBillProduct">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-xs-4 control-label">Tên</label>
                        <div class="col-xs-8">
                            <select class="form-control" name="product_id" id="editProductId"
                                    style="margin-bottom: 10px">
                                @foreach($products as $product)
                                    <option value='{{$product->id}}'
                                            id="product_{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                            <div class="nameError" style="color: red">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-xs-4 control-label">Số lượng</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="quantity" id="editQuantity"
                                   value="" placeholder="Nhập số lượng">
                            <div class="qtyError" style="color: red">
                            </div>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary " id="handleEditBillProduct">Lưu</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
