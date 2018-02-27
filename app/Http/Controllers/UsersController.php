<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\User;
use App\Skill;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $skill = Skill::all();
      $users = User::all();
    return view('users',compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $users = User::find($id);
       $skill = Skill::all();
       return view('profile', compact('users','skill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$users = User::find($id);
        //$user = User::with('skill')->where('id',$id)->first();
        $users = User::find($id);
        $skill = Skill::all();
        //$skills = User::find(1)->skills;
      //  User::find($id)->skills()->sync($request->skill);
        return view('edit_profile',compact('users','skill'))->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $rules =array('name' => 'unique:users'

                     );
          $validator = Validator::make(Input::all(), $rules);
          if($validator -> fails())
             return Redirect::to('users/'.$id.'/edit')->withInput()->withErrors($validator ->messages());
          $user = User::find($id);

        //$skill = Skill::find($id);
        //  $skill = Skill::find($id);
          if (Input::has('name')) $user->name = Input::get('name');
          if (Input::has('bio')) $user->bio = Input::get('bio');
          if (Input::has('password')) $user->password = bcrypt(Input::get('password'));
          $user->skill()->sync($request->skill);
          $user->save();


          //$skill->permissions()->sync($request->permission);
          //User::find($id)->skills()->sync($request->skill);
          //$skill = Skill::find($id);

          return Redirect::to('users/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
