<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Brand;
use DB;

class BrandController extends Controller
{

    /**
     * 展示列表
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $page = request()->page??1;
        $brand_name = request()->brand_name??'';
        $brand_desc = request()->brand_desc??'';
        $post = request()->post();
        $res = Cache::get('res_'.$page.'_'.$brand_name.'_'.$brand_desc);

        if(!$res) {
            echo 'Db____';
            $where = [];
            $brand_name = request()->brand_name;
            if (!empty($brand_name)) {
                $where[] = [
                    'brand_name', 'like', '%' . $brand_name . '%'
                ];
            }
            $brand_desc = request()->brand_desc;
            if (!empty($brand_desc)) {
                $where[] = [
                    'brand_desc', 'like', '%' . $brand_desc . '%'
                ];
            }
            DB::connection()->enableQueryLog();
            $res = Brand::where($where)->paginate(4);
            Cache::put('res_'.$page.'_'.$brand_name.'_'.$brand_desc, $res, 60);
            $logs = DB::getQueryLog();
        }
        return view('admin.brand.index',['res'=>$res,'post'=>$post]);
    }

    /**
     * 添加列表
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin\brand\create');
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

        $validator = \Validator::make($request->all(), [
            'brand_name' => 'required|unique:brand|alpha_dash',
            'brand_logo' => 'required|image',
            'brand_url' => 'required',
            'brand_desc' => 'required',
        ],[
            'brand_name.required'=>'品牌名称不能为空',
            'brand_name.unique'=>'此品牌已存在',
            'brand_name.alpha_dash'=>'品牌名称可以字母和数字，以及破折号和下划线',
            'brand_logo.required'=>'请选择品牌LOGO',
            'brand_url.required'=>'URL网址未填写',
            'brand_desc.required'=>'描述不能为空',
        ]);
        if ($validator->fails()) {
            return redirect('post/create')
                ->withErrors($validator)
                ->withInput();
        }
        if(!$request->hasFile('brand_logo')) {
            abort(404);
        }else{
            $post['brand_logo'] = $this->uplode('brand_logo');
        }

//        $res = DB::table('brand')->insert($post);
//        $brand = new Brand;
//        $brand->brand_name = $post['brand_name'];
//        $brand->brand_url = $post['brand_url'];
//        $brand->brand_logo = $post['brand_logo'];
//        $brand->brand_desc = $post['brand_desc'];
//        $res = $brand->save();
//        var_dump($res);
        $brand = Brand::create($post);
        if($brand->brand_id){
            return redirect('/brand/index');
        }
    }

    /**
     * Display the specified resource.
     *单挑展示
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 编辑列表
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $find = Brand::find($id);
        return view('admin.brand.edit',['find'=>$find]);

    }

    /**
     * 编辑执行
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $request->except('_token');
        //验证
        if(!$request->hasFile('brand_logo')) {
            abort(404);
        }else{
            $post['brand_logo'] = $this->uplode('brand_logo');
        }
        $res = Brand::where('brand_id',$id)->update($post);
        return redirect('brand\index');
    }

    /**
     * 删除
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Brand::destroy($id);
        if (!$res){
            echo '删除未成功';
        }
        return redirect('/brand/index');
    }

    /**
     * 上传文件类
     * @param $filename 文件名称
     * @return false|string
     */
    public function uplode($filename){
        if (request()->file($filename)->isValid()) {
            $photo = request()->file($filename);
            $store_result = $photo->store('photo');
            return $store_result;
        }
        exit('未获取到上传文件或上传过程出错');
    }

}
