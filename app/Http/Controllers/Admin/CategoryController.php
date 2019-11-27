<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\lsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = lsCategory::all();
        return view('admin.category.index',compact('categories'));
    }

    public function create(Request $request)
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cname'   => 'required|unique:ls_categories',
        ],
        [
            'cname.required' => 'The Category name is required.',
            'cname.unique' => 'The Category name is Already Exist!!!.',
        ])->validate();
           // return $request;

        $create = lsCategory::create($request->all());
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $categorie = lsCategory::find($id);
        return view('admin.category.edit',compact('categorie'));
    }

    public function show($id){
        return $id;
    }
    public function update(Request $request, $id,lsCategory $lsCategory)
    {
        $validator = Validator::make($request->all(), [
            'cname'   => 'required|unique:ls_categories,cname,'.$id.',cid',
        ],
        [
            'cname.required' => 'The Category name is required.',
            'cname.unique' => 'The Category name is Already Exist!!!.',
        ])->validate();

        // $lsCategory->update($request->all());

        $data = request()->except(['_token','_method']);
        $create = lsCategory::where('cid',$id)
                            ->update($data);
        return redirect()->route('admin.category.index');
    }

    public function destroy($id)
    {
       $lsCategory = lsCategory::where('cid',$id)->delete();
        return redirect()->route('admin.category.index');
    }
}
