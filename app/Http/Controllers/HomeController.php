<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Article;
use App\Image;
use Carbon\Carbon;
use Laracasts\Flash\Flash;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles= Article::orderBy('created_at','desc')
                    ->paginate(12);
        
        return view('home',['articles'=>$articles]);
    }

    public function viewArticle($slug)
    {
        $article= Article::where('slug','=',$slug)->first();
        //dd($article);
        return view('article',['article'=>$article]);
    }

    public function add()
    {
        return view('add');
    }

    public function store(ArticleRequest $request)
    {
        $article = new Article();
        $article->title =$request->title;
        $article->content = $request->content;
        $article->slug = Str::slug($request->title);
        $article->user_id= \Auth::user()->id;
        $article->save();

        if($request->file("image")){

            $file = $request->file("image");
            $extension=$file->getClientOriginalExtension();
            $name = 'blog_'.time().'.'.$extension;
            $file->getClientOriginalExtension();
            $path = $request->file('image')->storeAs('/',$name);

            $image= new Image();
            $image->name = $name ;
            $image->extension = $extension ;
            $image->article()->associate($article);
            $image->save();
        }

        Flash::success("Se ha creado el articulo <b>$article->title</b>");

        return redirect("/home");
    }
}
