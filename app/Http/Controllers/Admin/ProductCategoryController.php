<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\lsCategory;
use App\Model\lsSubCategory;
use App\Model\lsProductCategory;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    //
    public function index()
	    {
	        $Productcategories = lsProductCategory::all();
	        // return $Productcategories;
	        return view('admin.ProductCategory.index',compact('Productcategories'));
	    }
	public function create(Request $request)
	    {
	    	$Productcategories = lsProductCategory::all();
	    	$Subcategories = lsSubCategory::all();
	    	// return $categories;
	        return view('admin.ProductCategory.create',compact('Productcategories','Subcategories'));
	    }
	public function store(Request $request)
	    {
	        $validator = Validator::make($request->all(), [
	        	'scid'   => 'required:ls_sub_categories',
	            'pcname'   => 'required|unique:ls_product_categories',
	        ],
	        [
	        	'scid.required' => 'The SubCategory name is required.',
	            'pcname.required' => 'The ProductCategory name is required.',
	            'pcname.unique' => 'The ProductCategory name is Already Exist!!!.',
	        ])->validate();
	        // return $request;
	        // exit();
	        // return $request;
	        $create = lsProductCategory::create($request->all());
	        return redirect()->route('admin.ProductCategory.index');
	    }
	public function edit($id)
	    {
	        $Productcategories = lsProductCategory::find($id);
	        $Subcategories = lsSubCategory::all();
	        // return $Subcategories;
	        return view('admin.ProductCategory.edit',compact('Productcategories','Subcategories'));
	    }
	public function show($id){
	        return $id;
	    }
	public function update(Request $request, $id,lsSubCategory $lsCategory)
    {
        $validator = Validator::make($request->all(), [
        	'scid'   => 'required:ls_product_categories',
            'pcname'   => 'required|unique:ls_product_categories,pcname,'.$id.',pcid',
        ],
        [
            'scid.required' => 'The SubCategory name is required.',
	            'pcname.required' => 'The ProductCategory name is required.',
	            'pcname.unique' => 'The ProductCategory name is Already Exist!!!.',
        ])->validate();

        // $lsCategory->update($request->all());

        $data = request()->except(['_token','_method']);
        $create = lsProductCategory::where('pcid',$id)
                            ->update($data);
        return redirect()->route('admin.ProductCategory.index');
    }
    public function destroy($id)
    {
       $lsSubCategory = lsProductCategory::where('pcid',$id)->delete();
        return redirect()->route('admin.ProductCategory.index');
    }
}
