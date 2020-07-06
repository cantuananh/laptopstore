<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\RoleUser;
use App\Traits\StoreImageTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use StoreImageTrait;

    protected $imagePath = "uploads/users/";
    protected $user;
    protected $role;
    protected $roleUser;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->role = new Role();
        $this->roleUser = new RoleUser();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $role = $request->input('role');
        $users = $this->user->search($name, $role);
        $roles = $this->role->all();

        return view('backend.users.index', compact('users', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->role->all();

        return view('backend.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $data['image'] = $this->uploadImage($request->file('image'), $this->imagePath);
        $data['password'] = bcrypt($request->password);
        $user = $this->user->create($data);
        $user->roles()->sync($data['roles']);

        return redirect()->route('users.create')->with('message', 'Thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = $this->user->getListRoleBy($id);
        $roles = $this->role->all();
        $listRole = $user->roles()->pluck('role_id')->toArray();

        return view('backend.users.edit', compact('user', 'roles', 'listRole'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $user = $this->user->getUserBy($id);
        $data = $request->except('image');
        $data['image'] = $this->updateImage($request, $user->image, $this->imagePath);
        $this->user->update($data);
        $user->roles()->sync($data['roles']);

        return redirect()->route('users.edit', ['user' => $id])->with('message', 'Sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->getUserBy($id);
        $this->deleteImage($user->image, $this->imagePath);
        $this->user->destroy($id);

        return redirect()->route('users.index')->with('message', 'Xóa thành công');
    }

    public function profile()
    {
        return view('backend.profile');
    }

    public function getEditUser()
    {
        return view('backend.edit_profile');
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
        return redirect('admin/profile/sua')->with('message', 'Sửa thông tin thành công');
    }
}
