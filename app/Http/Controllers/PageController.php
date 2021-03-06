<?php

namespace App\Http\Controllers;

use App\Brand;
use App\DetailOrder;
use App\FeedBack;
use App\Order;
use App\Product;
use App\Slide;
use App\Traits\StoreImageTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    use StoreImageTrait;

    protected $imagePath = "uploads/users/";
    protected $product;
    protected $brand;

    public function __construct()
    {
        $this->product = new Product();
        $this->brand = new Brand();
    }

    public function index(Request $request)
    {
        $name = $request->input('name');
        $slides = Slide::all();
        $products = $this->product->getSearch($name);
        $product_news = $this->product->orderBy('created_at', 'desc')->where('deleted_at', null)->take(4)->get();
        return view('frontend/index', compact('products', 'slides', 'product_news'));
    }

    public function getLoaisanpham($type)
    {
        try {
            $sp_theoloai = Product::where('brand_id', $type)->get();
            $chi_tiet = DB::table('products as b')->join('brands as c', 'b.brand_id', '=', 'c.id')->select('b.*')->where('c.id', $type)->paginate(3);
            $sp_khac = DB::table('products as b')->join('brands as c', 'b.brand_id', '=', 'c.id')->select('b.*')->where('c.id', '<>', $type)->paginate(6);
            $loai = Brand::all();
            $loai_sp = Brand::where('id', $type)->first();
            return view('frontend.loaisanpham', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp', 'chi_tiet'));
        } catch (\Exception $exception) {

        }
    }

    public function getChitietsanpham(Request $request)
    {
        try {
            $check = Auth::check();
            $id = $request->id;
            $feed_backs = FeedBack::where('product_id', $request->id)->paginate(3);
            $detail_product = Product::where('id', $request->id)->first();
            $sanpham_tuongtu = Product::where('brand_id', $detail_product->brand_id)->paginate(6);
            $sanpham_noibat = Product::where('price', '<>', 0)->paginate(8);
            return view('frontend.chitietsanpham', compact('detail_product', 'sanpham_tuongtu', 'sanpham_noibat', 'feed_backs', 'id', 'check'));
        } catch (\Exception $exception) {
        }
    }

    public function getLienhe()
    {
        return view('frontend.thongtinlienhe');
    }

    public function getGioithieu()
    {
        return view('frontend.gioithieu');
    }

    public function getLogin()
    {
        return view('frontend.dang_nhap');
    }

    public function postLogin(Request $request)
    {

        $credenttials = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($credenttials)) {
            return redirect()->route('index')->with('success', '????ng nh???p th??nh c??ng');
        } else {
            return redirect()->back()->with('error', '????ng nh???p kh??ng th??nh c??ng. Sai t??i kho???n ho???c m???t kh???u');
        }
    }

//
    public function getLoginDatHang()
    {
        return view('frontend.dang_nhap_dat_hang');
    }

    public function postLoginDatHang(Request $request)
    {

        $credenttials = array('email' => $request->email, 'password' => $request->password);
        if (Auth::attempt($credenttials)) {
            return redirect()->route('dathang')->with('success', '????ng nh???p th??nh c??ng');
        } else {
            return redirect()->back()->with('error', '????ng nh???p kh??ng th??nh c??ng. Sai t??i kho???n ho???c m???t kh???u');
        }
    }

//
    public function getSignup()
    {
        return view('frontend.dang_ky');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'name' => 'required|max:250',
            'address' => 'required|max:250',
            'password' => 'required|max:12|min:6',
            'repassword' => 'required|same:password|min:6|max:12',
            'phone' => 'required',
            'birthday' => 'required',
        ], [
            "email.unique" => "Email ???? t???n t???i",
            "email.email" => "Ch??a ????ng ?????nh d???ng email",
            "email.required" => "B???n ph???i nh???p email",
            "name.required" => "B???n ph???i nh???p t??n",
            "name.max" => "T??n kh??ng qu?? 250 k?? t???",
            "password.required" => "B???n ph???i nh???p m???t kh???u",
            "password.min" => "M???t kh???u ??t nh???t 6 k?? t???",
            "password.max" => "M???t kh???u kh??ng qu?? 12 k?? t???",
            "repassword.required" => "B???n ph???i nh???p l???i m???t kh???u",
            "repassword.same" => "M???t kh???u kh??ng kh???p nhau",
            "repassword.min" => "Nh???p l???i m???t kh???u ??t nh???t 6 k?? t???",
            "repassword.max" => "Nh???p l???i m???t kh???u kh??ng qu?? 12 k?? t???",
            "phone.required" => "B???n ph???i nh???p s??? ??i???n tho???i",
            "birthday.required" => "B???n ph???i nh???p ng??y sinh",
            "address.required" => "B???n ph???i nh???p ?????a ch???",
            "address.max" => "?????a ch??? kh??ng qu?? 250 k?? t???",
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->gender = $request->rdoGender;
        $user->birthday = $request->birthday;
        $user->status = $request->status;
        $user->address = $request->address;
        $user->address = $request->address;
        $get_image = $request->file('image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $get_image->move('uploads/users', $get_name_image);
            $user->image = $get_name_image;
            $user->save();
            return redirect('dang-nhap')->with('message', '???? t???o t??i kho???n th??nh c??ng');
        } else
            $user->image = "default.jpg";
        $user->save();
        return redirect()->back()->with('message', '???? t???o t??i kho???n th??nh c??ng');
    }

    public function getLogout()
    {
        Auth::logout();
        \Cart::clear();
        return redirect()->route('index');
    }

    public function getInfoUser()
    {
        return view('frontend.profile');
    }

    public function getEditUser()
    {
        return view('frontend.edit_profile');
    }

    public function postEditUser(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'name' => 'required|max:250',
            'address' => 'required|max:250',
            'password' => 'required|max:12|min:6',
            'repassword' => 'required|same:password|min:6|max:12',
            'phone' => 'required',
            'birthday' => 'required',
        ], [
            "email.email" => "Ch??a ????ng ?????nh d???ng email",
            "email.required" => "B???n ph???i nh???p email",
            "name.required" => "B???n ph???i nh???p t??n",
            "name.max" => "T??n kh??ng qu?? 250 k?? t???",
            "password.required" => "B???n ph???i nh???p m???t kh???u",
            "password.min" => "M???t kh???u ??t nh???t 6 k?? t???",
            "password.max" => "M???t kh???u kh??ng qu?? 12 k?? t???",
            "repassword.required" => "B???n ph???i nh???p l???i m???t kh???u",
            "repassword.same" => "M???t kh???u kh??ng kh???p nhau",
            "repassword.min" => "Nh???p l???i m???t kh???u ??t nh???t 6 k?? t???",
            "repassword.max" => "Nh???p l???i m???t kh???u kh??ng qu?? 12 k?? t???",
            "phone.required" => "B???n ph???i nh???p s??? ??i???n tho???i",
            "birthday.required" => "B???n ph???i nh???p ng??y sinh",
            "address.required" => "B???n ph???i nh???p ?????a ch???",
            "address.max" => "?????a ch??? kh??ng qu?? 250 k?? t???",
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $data = $request->except('image');
        $data['image'] = $this->updateImage($request, $user->image, $this->imagePath);
        $user->update($data);
        return redirect('profile/sua')->with('message', 'S???a th??ng tin th??nh c??ng');
    }

    public function comment($id, Request $request)
    {
        try {
            $data = [
                'user_id' => Auth::user()->id,
                'product_id' => $id,
                'content' => $request->comment
            ];
            FeedBack::create($data);
        } catch (\Exception $e) {

        }
        return back();
    }

    public function order()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderby('created_at', 'DESC')->get();
        return view('frontend.order', compact('orders'));
    }
}
