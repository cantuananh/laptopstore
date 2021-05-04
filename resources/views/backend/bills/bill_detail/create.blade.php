<div class="modal fade" id="newBillProductModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thêm chi tiết phiếu nhập kho</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div id="error"></div>
            <div class="modal-body">
                <form action="" data-url="" method="POST" id="newResourceFormBillProduct">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-xs-4 control-label">Tên sản phẩm</label>
                        <div class="col-xs-8">
                            <select class="form-control" name="product_id" style="margin-bottom: 10px"
                                    id="createProductId">
                                @foreach($products as $product)
                                    <option value='{{$product->id}}'>{{$product->name}}</option>
                                @endforeach
                            </select>
                            <div class="nameError" style="color: red">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="bill_id" id="" value="{{$bill->id}}">
                    <div class="form-group">
                        <label for="name" class="col-xs-4 control-label">Số lượng</label> &emsp;
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="quantity" id="createQuantity"
                                   placeholder="Nhập số lượng" onchange="loadInputSeri(this)">
                            <div class="qtyError" style="color: red">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-xs-4 control-label">Nhập các số seri</label> &emsp;
                        <div class="col-xs-8" id="listSeris">
                            <div class="qtyError" style="color: red"></div>
                        </div>
                    </div>
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary" id="handleAddBillProduct">Lưu</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

