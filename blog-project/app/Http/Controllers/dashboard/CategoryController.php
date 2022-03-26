<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\dashboard\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::paginate(12);
        return view('dashboard.category.index')->with('categories', $categories);
    }

    public function create(){
        return view('dashboard.category.create');
    }

    public function store(Request $request){
        //var_dump($request->all());
        $request->validate([
            'name'=>'required|string',
            'description'=>'required|string'
        ]);

        $category = new Category();

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        Session::flash('success', 'New Category created.');
        return redirect()->route('category.create');
    }

    public function update(Request $request, $categoryid){
        $request->validate([
            'name'=>'required|string',
            'description'=>'required|string'
        ]);

        $category = Category::find($categoryid);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        Session::flash('success', 'Category updated. Thanks.');        
        return redirect()->route('category.index');
    }

}
