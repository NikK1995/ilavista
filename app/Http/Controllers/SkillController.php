<?php

namespace App\Http\Controllers;
use Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Skill;
use Illuminate\Http\Request;
class SkillController extends Controller
{
  /**
 * Create a new controller instance.
 *
 * @return void
 */

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    $skill = Skill::all();
    return view('show_skills',compact('skill'));
}

/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    $skills = Skill::all();
    return view('create_skills',compact('skill'));
}

/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{
    $this->validate($request,[
        'name' =>'required|max:50|unique:skills'
        ]);
    $skill = new Skill;
    $skill->name = $request->name;
    $skill->save();

    return redirect('admin/create_skills');
}

/**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    //
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $skill = Skill::find($id);

    return view('skill_edit',compact('skill')->with('id',$id));
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
  $rules =array('name' => 'unique:skills'

               );
    $validator = Validator::make(Input::all(), $rules);
    if($validator -> fails())
       return Redirect::to('admin/create_skills')->withInput()->withErrors($validator ->messages());
    $skill = Skill::find($id);
    if (Input::has('name')) $skill->name = Input::get('name');

    $skill->save();
    return Redirect::to('admin/create_skills');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy(Skill $skill)
{
//Skill::where('id',$id)->delete();
    //return Redirect::to('admin/show_skills');
    $skill->delete();
    return Redirect::to('admin/show_skills');
}
}
