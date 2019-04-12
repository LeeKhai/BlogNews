<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use App\Category;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $news = News::find(1);
        // $post = $news->category;
        // dd($post);
        $newsblog = News::all();
        return $newsblog;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $picture = $request->get('picture');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($picture, 0, strpos($picture, ';')))[1])[1];

        Image::make($request->get('picture'))->save(public_path('images/') . $fileName);

        News::create([
            'name'            => $request->input('name'),
            'description'     => $request->input('description'),
            'slug'            => $request->input('slug'),
            // 'user_id'         => Auth::user()->id,
            'user_id'         => 1,
            'category_id'     => $request->input('category_id'),
            'content'         => $request->input('content'),
            'picture'         => $fileName,
        ]);
        return '';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return News::findOrFail($id);
        // $news = News::with('category')->with('user')->find($id);
        // return $news;
    }

    public function showNews($slug)
    {
        $news = News::where('slug', $slug);
        return view('welcome.home.single', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $picture = $request->get('picture');
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($picture, 0, strpos($picture, ';')))[1])[1];
        Image::make($request->get('picture'))->save(public_path('images/') . $fileName);
        
        $news = News::findOrFail($id);
        $news->name = $request->input('name');
        $news->description = $request->input('description');
        $news->slug = $request->input('slug');
        $news->category_id = $request->input('category_id');
        $news->content = $request->input('content');
        $news->picture = $fileName;
        $news->save();
        return response([
            'result' => 'success'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return '';
    }
}
