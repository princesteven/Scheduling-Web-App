<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::get();

    	return view('categories', compact('categories'));
    }

    public function create(Request $request)
    {
    	$name = $request->name;

    	$checkCategory = Category::where('name',$name)->count();

    	if ($checkCategory > 0) {
    		return redirect()->back()->with('danger', 'Category already Exists');
    	}

    	$create = Category::create([
    		'name' => $name,
    	]);

    	if ($create) {
    		return redirect()->back()->with('success', 'Category Added');
    	}

    	return redirect()->back()->with('danger', 'Category Not Added');
    	
    }

    public function edit(Request $request)
    { 
    	$id = $request->id;
		$findCategory = Category::find($id);
		if($findCategory){
			$findCategory->name = $request->name;
			$findCategory->save();
		return redirect()->back()->with('success', '1 Category edited');
		}
		return redirect()->back()->with('danger', 'Category does not Exists');
	}

	public function delete(Request $request){
		$items_to_delete = (string)$request->delete[0];
		
        if($items_to_delete){
            $items_to_delete = explode(",",$items_to_delete);
            Category::destroy($items_to_delete);
            return redirect()->back()->with('success', 'Category(s) deleted');
        }
        
		return redirect()->back()->with('danger', 'Oop! an error occured,please try again');
		
	}
}
