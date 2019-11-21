<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\User;
class UserController extends Controller
{
    /**
     * 管理员展示
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = User::all();
        return view('admin\user\index',['res'=>$res]);
    }

    /**
     * 添加列表
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin\user\create');
    }

    /**
     * 添加执行
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->except('_token');
        $post['user_pwd'] = Crypt::encryptString($post['user_pwd']);
        $res = User::create($post);
        if($res->user_id){
            return redirect('user\index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 修改展示
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = User::find($id);
        $find['user_pwd'] = Crypt::decryptString($find['user_pwd']);
        return view('admin.user.edit',['find'=>$find]);
    }

    /**
     * 修改执行
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $request->except('_token');
        $res = User::where('user_id',$id)->update($post);
        return redirect('user\index');
    }

    /**
     * 删除
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $res = User::destroy($id);
        if (!$res){
            echo '删除未成功';
        }
        return redirect('\user\index');
    }
}
