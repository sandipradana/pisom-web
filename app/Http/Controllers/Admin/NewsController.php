<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\NewsDataTable as MainDataTable;
use App\Models\News;
use App\Models\NewsCategory;

class NewsController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('admin.news.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function create(){
        $categories = NewsCategory::all();
        return view('admin.news.create', compact(['categories']));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => ['required', 'max:200'],
            'content' => ['required'],
            'featured' => ['required'],
            'category_id' => ['required'],
			'thumbnail' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $news = new News();

        $news->title       = $request->title;
        $news->content     = $request->content;
        $news->category_id = $request->category_id;

        $thumbnail = $request->file('thumbnail');
        if($thumbnail != null){
            $filename = time()."_".$thumbnail->getClientOriginalName();
            $thumbnail->move('news', $filename);
            $news->thumbnail   = 'news/'.$filename;
        }else{
            $news->thumbnail   = 'news/default.jpg';
        }

        $news->featured    = $request->featured;
        $news->date        = date("Y-m-d");

        $news->save();

        return redirect()->route('admin.news.show', $news->id);
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        $categories = NewsCategory::all();
        return view('admin.news.show', compact(['news', 'categories']));
    }

    public function edit($id)
    {
        
        $news = News::findOrFail($id);

        return view('admin.news.show', compact(['news']));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => ['required', 'max:200'],
            'content' => ['required'],
            'featured' => ['required'],
            'category_id' => ['required'],
			'thumbnail' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $news = News::findOrFail($id);

        $news->title       = $request->title;
        $news->content     = $request->content;
        $news->category_id = $request->category_id;
        
        $thumbnail = $request->file('thumbnail');
        if($thumbnail != null){
            $filename = time()."_".$thumbnail->getClientOriginalName();
            $thumbnail->move('news', $filename);
            $news->thumbnail   = 'news/'.$filename;
        }

        $news->featured    = $request->featured;
        $news->date        = date("Y-m-d");

        $news->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->back();
    }
}