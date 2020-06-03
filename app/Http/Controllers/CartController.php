<?php

namespace App\Http\Controllers;

use App\DetailOrder;
use App\DetailProduct;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function getAddToCart(Request $request, $id)
    {
        $detail = Product::select('id', 'name', 'price', 'quantity', 'image')->find($id);
        if (!$detail) return redirect(route('index'));
        \Cart::add([
            'id' => $id,
            'name' => $detail->name,
            'quantity' => 1,
            'price' => $detail->price,
            'attributes' => array(
                'image' => $detail->image
            )
        ]);
        return redirect()->back();
    }

    public function getDelItemCart($id)
    {
        \Cart::remove($id);
        return redirect()->back();
    }

    public function getListCart()
    {
        $product_cart = \Cart::getContent();
        return view('frontend.gio_hang', compact('product_cart'));
    }

    public function getCheckout()
    {
        $product_cart = \Cart::getContent();
        return view('frontend.dat_hang', compact('product_cart'));
    }

    public function postCheckout(Request $request)
    {
        //Kiêm tra xem số lượng mỗi sản phẩm có còn trong kho hàng nữa không
        $flag = true;
        $list_soil_out = "";
        foreach (\Cart::getContent() as $row) {
            $detail = Product::find($row->id);
            $quantity = $detail->quantity;
            if ($quantity == 0) {
                $list_soil_out .= " " . $row->name . " đã hết hàng.";
                $flag = false;
                \Cart::remove($row->id);
            } //nếu số lượng trong cart lớn hơn kho
            else if ($row->quantity > $quantity) {
                $list_soil_out .= " " . $row->name . " còn " . $quantity . " sản phẩm.";
                $flag = false;
                //update lại số lượng sản phẩm trong cart bằng số lượng trong kho.
                \Cart::update($row->id, array(
                    'quantity' => -$row->quantity + 1,
                ));
            }
        }
        if (!$flag) {
            return redirect('user/dat-hang')->with('loi', "Bạn vui lòng kiểm tra lại giỏ hàng: " . $list_soil_out);
        } else {
            $this->validate($request, [
                "phone" => "required",
                "address" => "required",
                "name" => "required",
            ], [
                "phone.required" => "Bạn phải nhập số điện thoại",
                "address.required" => "Bạn phải nhập địa chỉ",
                "name.required" => "Bạn phải nhập họ tên",
            ]);
            //thêm thông tin người dùng vào hóa đơn và chi tiết hóa đơn
            $total = \Cart::getSubTotal();
            $customer = new Order();
            $customer->user_id = get_data_user('web');
            $customer->payment = $request->payment;
            $customer->total_price = $total;
            $customer->save();

            $product_cart = \Cart::getContent();
            foreach ($product_cart as $product) {
                $detail = new DetailOrder();
                $detail->order_id = $customer->id;
                $detail->detail_product_id = $product->id;
                $detail->quantity = $product->quantity;
                $detail->save();
                $detail_p = Product::where('id', $product->id)->first();
                $quantity_remain = $detail_p->quantity - $product->quantity;
                //cập nhật lại số lượng hàng trong kho
               DB::table('products')->where('id', $product->id)->update(['quantity' => $quantity_remain]);
            }
            \Cart::clear();
            return redirect('user/dat-hang')->with('thanhcong', "Bạn đã đặt hàng thành công. Quay lại trang chủ để xem những sảm phẩm khác nhé!");
        }
    }
}
