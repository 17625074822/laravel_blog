<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use APP\Admin;
use App\User;

class UserController extends Controller
{

    /**
     *处理登录信息
     */
    public function dologin(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'pwd' => ['required']
        ]);
        $users = User::where(['name' => $request->name, 'password' => $request->pwd])->get();
        foreach ($users as $user) {
            if ($user->name != '') {
                return view('admin.index');
            } else {
            }
        }
        return view('admin.login');

    }

    /**
     * 查看用户列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(5);
        return view('admin.userList', ['users' => $users, 'name' => '']);
    }

    /**
     * 添加用户
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->age = $request->age;
        return json_encode($user->save());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 查看用户
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show' . $id;
    }

    /**
     * 编辑用户
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:5',
            'age' => 'required|integer',
            'pwd' => 'required'
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->age = $request->age;
        $user->pwd = $request->pwd;
        return ($user->save);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return 'update' . $id;
    }

    /**
     *删除
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    /** 查询用户
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function select(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->name . '%')->orderBy('id', 'desc')->paginate(5);
        return view('admin.userList', ['users' => $users, 'name' => '%' . $request->name . '%']);
    }
}
