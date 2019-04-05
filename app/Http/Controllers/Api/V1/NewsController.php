<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use Carbon\Carbon;
use Image;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return News::all();
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
        
        // $imageData = $request->get('picture');
       // $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($imageData, 0, strpos($imageData, ';')))[1])[1];

        // Image::make($request-get('picture'))->save(public_path('images/'));

        // $imageName = time().'.'.$request->picture->getClientOriginalExtension();

        // $request->picture->move(public_path('images'), $imageName);


        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $request->image->move(public_path('images'), $imageName);
        // return 'ok';
        // News::create([
        //     'name'               => $request->input('name'),
        //     'description'        => $request->input('description'),
        //     'user_id'            => $request->input('user_id'),
        //     'category_id'        => $request->input('category_id'),
        //     'content'            => $request->input('content'),
        //     // 'picture'            => $request->picture
        // ]);

        // return response([
        //     'result' => 'success'
        // ], 200);

        $news = News::create($request->all());

        // News::create([
        //     'name'               => $request->input('name'),
        //     'description'        => $request->input('description'),
        //     'user_id'            => $request->input('user_id'),
        //     'category_id'        => $request->input('category_id'),
        //     'content'            => $request->input('content'),
        //     'picture'            => 'aabcbcbcbcbc'
        // ]);
        // return response([
        //     'result' => 'success'
        // ], 200);
        return news;
        // $news->picture = $imageName;
     
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
        $news = News::findOrFail($id);
        $news->update($request->all());
        return '';
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
