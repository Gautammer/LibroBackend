<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\lsCategory;
use App\Model\lsCity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = lsCategory::all();
        // $cityid = $categories->cityId;
        // $cities = lsCity::where('cityid',$cityid)->select('cityname')->get();
        foreach ($categories as $key => $cat){
            $cityid = $cat->cityId;
            $cat->cityid = lsCity::where('cityid',$cityid)->select('cityname')->get();
           
        }

        // return $categories;
        return view('admin.category.index',compact('categories'));
    }

    public function create(Request $request)
    {
        $cities = lsCity::all();
        
        return view('admin.category.create',compact('cities'));
    }

    public function store(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'cname'   => 'required|unique:ls_categories',
            // 'cityid'   => 'required',
        ],
        [
            'cname.required' => 'The Category name is required.',
            // 'cityid.required' => 'The City name is required.',
            'cname.unique' => 'The Category name is Already Exist!!!.',
        ])->validate();
        //    return $validator;

        // $create = lsCategory::create($request->all());
        $create = new lsCategory;
        $create->cname =  $request->cname;
        $create->cityid = 1;
        $create->save();
        // return $create;
        return redirect()->route('admin.category.index')->with('success','SuccessFully Add Category');
    }

    public function edit($id)
    {
        $categorie = lsCategory::find($id);
        $cities = lsCity::all();
        return view('admin.category.edit',compact('categorie','cities'));
    }

    public function show($id){
        return $id;
    }
    public function update(Request $request, $id,lsCategory $lsCategory)
    {
        $validator = Validator::make($request->all(), [
            'cname'   => 'required|unique:ls_categories,cname,'.$id.',cid',
            // 'cityid' => 'required',
        ],
        [
            'cname.required' => 'The Category name is required.',
            // 'cityid.required' => 'The City name is required.',
            'cname.unique' => 'The Category name is Already Exist!!!.',
        ])->validate();

        // $lsCategory->update($request->all());

        $data = request()->except(['_token','_method']);
        $create = lsCategory::where('cid',$id)
                            ->update($data);
        return redirect()->route('admin.category.index')->with('success','SuccessFully Update Category');
    }

    public function destroy($id)
    {
       $lsCategory = lsCategory::where('cid',$id)->delete();
        return redirect()->route('admin.category.index')->with('success','SuccessFully Delete Category');
    }
}
