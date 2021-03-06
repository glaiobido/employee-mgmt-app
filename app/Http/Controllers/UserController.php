<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::where('id', '<>', Auth::user()->id);
        $users = User::where('id', '<>', auth()->user()->id)->get();

        return response()->view('layouts.Users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {

      return User::create([
          'firstname' => $data['firstname'],
          'lastname' => $data['lastname'],
          'username' => $data['username'],
          'email' => $data['email'],
          'password' => Hash::make($data['password']),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => ['required', 'string', 'max:60'],
            'lastname' => ['required', 'string', 'max:60'],
            'username' => ['required', 'string', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        $user = $this->create($request->all());
        return response()->json(['data' => $user, 'status' => 200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $query = $request->query();

        // get user
        $user = User::find($query['user_id']);
        return response()->view('layouts.Users.modal-form',
                                  ['user' => $user, 'action' => $query['action']]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $validatedData = $request->validate([
          'firstname' => ['required', 'string', 'max:60'],
          'lastname' => ['required', 'string', 'max:60'],
          'username' => ['required', 'string', 'max:20'],
          'email' => ['required', 'string', 'email', 'max:255']
      ]);
      
      $user = User::find($request['user_id']);
      $user->firstname = $request['firstname'];
      $user->lastname = $request['lastname'];
      $user->email = $request['email'];
      $user->username = $request['username'];
      $user->save();

      return response()->json(['status' => 200]);
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

        return response()->json(['status' => 200]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:60'],
            'lastname' => ['required', 'string', 'max:60'],
            'username' => ['required', 'string', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }
}
