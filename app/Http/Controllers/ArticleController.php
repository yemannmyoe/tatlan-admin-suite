<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
use App\Models\Category;



class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where(null)->orderby('published_date','desc')->orderby('created_at', 'desc')->paginate(10);
        $array = [];

        foreach($articles as $article){
          
                $data = [
                    "id" => $article->id,
                    "title" => $article->title,
                    "description" => $article->description,
                    "date" => $article->published_date
                   
                ];
                array_push($array, $data);
            
        }
        // return view('pages.article.index', 'array', ['data'=>$data]);

        return view('pages.article.index', compact('array'))->with('articles', $articles,'i', (request()->input('page',1)- 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::orderby('id', 'DESC')->get();
        $data = [
            'category' => $category,
        ];

        return view('pages.article.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            // 'youtube_url' => ['required'],
            // 'vimeo_url'=>['required'],
            'category'=>['required'],
            'type'=>['required'],
            'article_image'=>['required'],
            'description'=>['required'],
            'published_date'=>['required']
            
        ]);

        $fn = time().'.'.$request->article_image->extension();
        $request->article_image->move(public_path('uploads'),$fn);

        $article = new Article;
        $article->title=$request->title;
        $article->youtube_url=$request->youtube_url;
        $article->vimeo_url=$request->vimeo_url;
        $article->category=$request->category;
        $article->type=$request->type;
        $article->article_image= $fn;
        $article->description=$request->description;
        $article->published_date=$request->published_date;
        
        $article->save();

        return redirect()->route('articles.index')->with('Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article=Article::findOrfail($id);

        $category = Category::all();
        $format_published_date = $article->published_date->format('Y-m-d');
       
        return view('pages.article.edit', compact('article','category' ,'format_published_date'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required'],
            'youtube_url' => ['required'],
            'vimeo_url'=>['required'],
            // 'category'=>['required'],
            'type'=>['required'],
            
            'description'=>['required'],
            'published_date'=>['required']
            
        ]);


        $article =Article::find($id);
        $article->title=$request->title;
        $article->youtube_url=$request->youtube_url;
        $article->vimeo_url=$request->vimeo_url;
        $article->category=$request->category;
        $article->type=$request->type;
        $article->description=$request->description;
        $article->published_date=$request->published_date;


        
        if ($request->article_image) {
            $request->validate([
                'article_image' => ['required','image']
            ]);
        unlink(public_path('uploads/'.$article->article_image));
        $fn = time().'.'.$request->article_image->extension();
        $request->article_image->move(public_path('uploads'),$fn);
        $article->article_image= $fn;
    }
        
        $article->update();

        return redirect()->route('articles.index')->with('success', 'updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::findOrfail($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'deleted successfully');
    }
}
