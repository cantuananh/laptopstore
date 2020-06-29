<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Role;
use App\RoleUser;
use App\Traits\StoreImageTrait;
use App\User;
use Illuminate\Http\Request;

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

}
