<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Product;
use App\Slide;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
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
        return view('frontend/index', compact('products', 'slides'));
    }

    public function getLoaisanpham($type)
    {
        $sp_theoloai = Product::where('brand_id', $type)->get();
        $chi_tiet = DB::table('products as b')->join('brands as c', 'b.brand_id', '=', 'c.id')->select('b.*')->where('c.id', $type)->paginate(3);
        $sp_khac = DB::table('products as b')->join('brands as c', 'b.brand_id', '=', 'c.id')->select('b.*')->where('c.id', '<>', $type)->paginate(6);
        $loai = Brand::all();
        $loai_sp = Brand::where('id', $type)->first();
        return view('frontend.loaisanpham', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp', 'chi_tiet'));
    }

    public function getChitietsanpham(Request $request)
    {
        $detail_product = Product::where('id', $request->id)->first();
        $sanpham_tuongtu = Product::paginate(6);;
        $sanpham_noibat = Product::where('price', '<>', 0)->paginate(8);
        return view('frontend.chitietsanpham', compact('detail_product', 'sanpham_tuongtu', 'sanpham_noibat'));
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
            return redirect()->route('index')->with('success', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('error', 'Đăng nhập không thành công. Sai tài khoản hoặc mật khẩu');
        }
    }

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
            "email.unique" => "Email đã tồn tại",
            "email.email" => "Chưa đúng định dạng email",
            "email.required" => "Bạn phải nhập email",
            "name.required" => "Bạn phải nhập tên",
            "name.max" => "Tên không quá 250 kí tự",
            "password.required" => "Bạn phải nhập mật khẩu",
            "password.min" => "Mật khẩu ít nhất 6 kí tự",
            "password.max" => "Mật khẩu không quá 12 kí tự",
            "repassword.required" => "Bạn phải nhập lại mật khẩu",
            "repassword.same" => "Mật khẩu không khớp nhau",
            "repassword.min" => "Nhập lại mật khẩu ít nhất 6 kí tự",
            "repassword.max" => "Nhập lại mật khẩu không quá 12 kí tự",
            "phone.required" => "Bạn phải nhập số điện thoại",
            "birthday.required" => "Bạn phải nhập ngày sinh",
            "address.required" => "Bạn phải nhập địa chỉ",
            "address.max" => "Địa chỉ không quá 250 kí tự",
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
            return redirect('dang-nhap')->with('message', 'Đã tạo tài khoản thành công');
        } else
            $user->image = "default.jpg";
        $user->save();
        return redirect()->back()->with('message', 'Đã tạo tài khoản thành công');
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
            "email.email" => "Chưa đúng định dạng email",
            "email.required" => "Bạn phải nhập email",
            "name.required" => "Bạn phải nhập tên",
            "name.max" => "Tên không quá 250 kí tự",
            "password.required" => "Bạn phải nhập mật khẩu",
            "password.min" => "Mật khẩu ít nhất 6 kí tự",
            "password.max" => "Mật khẩu không quá 12 kí tự",
            "repassword.required" => "Bạn phải nhập lại mật khẩu",
            "repassword.same" => "Mật khẩu không khớp nhau",
            "repassword.min" => "Nhập lại mật khẩu ít nhất 6 kí tự",
            "repassword.max" => "Nhập lại mật khẩu không quá 12 kí tự",
            "phone.required" => "Bạn phải nhập số điện thoại",
            "birthday.required" => "Bạn phải nhập ngày sinh",
            "address.required" => "Bạn phải nhập địa chỉ",
            "address.max" => "Địa chỉ không quá 250 kí tự",
        ]);
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->gender = $request->rdoGender;
        $user->birthday = $request->birthday;
        $user->status = Auth::user()->status;
        $user->address = $request->address;
        $user->address = $request->address;
        $get_image = $request->file('image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $get_image->move('uploads/users', $get_name_image);
            $user->image = $get_name_image;
            $user->save();
            return redirect('profile/sua')->with('message', 'Sửa thông tin thành công');
        } else
            $user->image = "default.jpg";
        $user->save();
        return redirect('profile/sua')->with('message', 'Sửa thông tin thành công');
    }
}
