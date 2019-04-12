<?php
namespace App\Http\Controllers\Api\V1;

use App\User;
use App\Role;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get()->load('roles');
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

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
        Image::make($request->get('picture'))->save(public_path('avatars/') . $fileName);
        $user = User::create([
            'name'            => $request->input('name'),
            'email'           => $request->input('email'),
            'password'        => bcrypt($request->input('password')),
            'picture'         => $fileName,
        ]);
        $name_role = $request->get('role');
        $user
            ->roles()
            ->attach(Role::where('id', $name_role)->first());
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
        return User::findOrFail($id);
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
        if (!Gate::allows('actions-user')) {
            $user = User::findOrFail($id);
            $picture = $request->get('picture');
            if ($picture != '') {
                $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . explode('/', explode(':', substr($picture, 0, strpos($picture, ';')))[1])[1];
                Image::make($request->get('picture'))->save(public_path('avatars/') . $fileName);
                $user->picture = $fileName;
            }
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            return response([
                'result' => 'success'
            ], 200);
        } else {
            return response([
                'result' => 'error'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response([
            'result' => 'success'
        ], 200);
    }
}
