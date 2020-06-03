<div class="modal fade" id="indexBillProductModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chi tiết</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form action="" data-url="" method="POST" id="indexResourceFormBillProduct">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-xs-4 control-label">Tên Sản phẩm</label>
                        <div class="col-xs-8">
                            Verdie Braun
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-xs-4 control-label">Số lượng</label>
                        <div class="col-xs-8">2</div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-xs-4 control-label">Số seri</label>
                        <div class="col-xs-8">1, 123456789</div>
                        <div class="col-xs-8">2, 123456788</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
