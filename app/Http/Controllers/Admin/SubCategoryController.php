<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\lsCategory;
use App\Model\lsSubCategory;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    //
	public function index()
	    {
	        $Subcategories = lsSubCategory::all();
	        // return $Subcategories;
	        return view('admin.SubCategory.index',compact('Subcategories'));
	    }

	public function create(Request $request)
	    {
	    	$categories = lsCategory::all();
	    	// return $categories;
	        return view('admin.SubCategory.create',compact('categories'));
	    }
	public function store(Request $request)
	    {
	        $validator = Validator::make($request->all(), [
	        	'cid'   => 'required:ls_sub_categories',
	            'scname'   => 'required|unique:ls_sub_categories',
	        ],
	        [
	        	'cid.required' => 'The Category name is required.',
	            'scname.required' => 'The SubCategory name is required.',
	            'scname.unique' => 'The SubCategory name is Already Exist!!!.',
	        ])->validate();
	        // return $request;
	        // exit();

	        $create = lsSubCategory::create($request->all());
	        return redirect()->route('admin.SubCategory.index');
	    }
	public function edit($id)
	    {
	        $Subcategorie = lsSubCategory::find($id);
	        $categories = lsCategory::all();
	        // return $categories;
	        return view('admin.SubCategory.edit',compact('Subcategorie','categories'));
	    }
	public function show($id){
	        return $id;
	    }
    public function update(Request $request, $id,lsSubCategory $lsCategory)
    {
        $validator = Validator::make($request->all(), [
        	'cid'   => 'required:ls_sub_categories',
            'scname'   => 'required|unique:ls_sub_categories,scname,'.$id.',scid',
        ],
        [
            'scname.required' => 'The SubCategory name is required.',
            'scname.unique' => 'The SubCategory name is Already Exist!!!.',
        ])->validate();

        // $lsCategory->update($request->all());

        $data = request()->except(['_token','_method']);
        $create = lsSubCategory::where('scid',$id)
                            ->update($data);
        return redirect()->route('admin.SubCategory.index');
    }
    public function destroy($id)
    {
       $lsSubCategory = lsSubCategory::where('scid',$id)->delete();
        return redirect()->route('admin.SubCategory.index');
    }
}
