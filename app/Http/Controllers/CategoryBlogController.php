<?php

namespace App\Http\Controllers;

use App\Models\CategoryBlog;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\DataTables\CategoryBlogDataTable;
use Illuminate\View\View;

class CategoryBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public $data;

    public function __construct()
    {
        $this->data['modul'] ="categoryblog";
        $this->data['title'] = "Category";
    }

    public function index(CategoryBlogDataTable $dataTable)
    {
        return $dataTable->render('categoryBlog.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categoryBlog.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=>'required|unique:category_blog'
        ]);

        CategoryBlog::create($request->all());
        return redirect()->route('CategoryBlog')->with('success','Category Blog Create Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): view
    {
        $categoryBlog = CategoryBlog::find($id);
        $this->data['categoryBlog'] = compact('categoryBlog');
        return view('CategoryBlog.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): view
    {
        $categoryBlog = CategoryBlog::find($id);
        $this->data['categoryBlog'] = compact('categoryBlog');
        return view('CategoryBlog.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CategoryBlog $categoryBlog): RedirectResponse
    {
        $request->validate([
            'category_name'=>'required|unique:category_blog'
        ]);
        $categoryBlog->update($request->all());
        return redirect()->route('CategoryBlog')->with('success','Category Blog Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        CategoryBlog::find( $id )->delete();
        echo "sukses";
    }
}
