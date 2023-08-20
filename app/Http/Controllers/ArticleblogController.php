<?php

namespace App\Http\Controllers;

use App\Models\articleblog;
use Illuminate\Http\Request;
use App\DataTables\ArticleBlogDataTable;
use DataTables;

class ArticleblogController extends Controller
{
    public $data;

    public function __construct()
    {
        $this->data['modul'] ="articleblog";
        $this->data['title'] = "Article";
    }
    /**
     * Display a listing of the resource.
     */
    public function index(ArticleBlogDataTable $dataTable,Request $request)
    {
        return $dataTable->render('articleBlog.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articleBlog.create',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:article_blog',
            'description'=>'required',
            'fk_category'=>'required',
            'thumbnail'=>'required',
        ]);

        articleblog::create($request->all());
        return redirect()->route('ArticleBlog')->with('success','Article Blog Create Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $articleBlog = ArticleBlog::find($id);
        $this->data['articleBlog'] = compact('articleBlog');
        return view('ArticleBlog.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoryBlog = articleblog::find($id);
        $this->data['articleBlog'] = compact('articleblog');
        return view('ArticleBlog.edit',$this->data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, articleblog $articleblog)
    {
        $request->validate([
            'title'=>'required|unique:article_blog',
            'description'=>'required',
            'fk_category'=>'required',
            'thumbnail'=>'required',
        ]);
        $articleblog->update($request->all());
        return redirect()->route('ArticleBlog')->with('success','Article Blog Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        ArticleBlog::find( $id )->delete();
        echo "sukses";
    }
}
