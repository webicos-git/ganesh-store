<?php

namespace App\Http\Controllers;

use App\Group;
use Redirect;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $groups = Group::all();
        return view('group.index', ['groups' => $groups]);
    }

    public function create()
    {
        return view('group.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $group = new Group();
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();

        return Redirect::route('group.index')->with('success', 'Group Added Successfully');
    }

    public function show(Group $group)
    {
        //
    }

    public function edit($id)
    {
        $group = Group::find($id);
        return view('group.edit', ['group' => $group]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        
        $group = Group::find($request->id);
        $group->name = $request->name;
        $group->description = $request->description;
        $group->save();

        return Redirect::route('group.index')->with('success', 'Group Edited Successfully');
    }

    public function destroy($id)
    {
        Group::destroy($id);
        return Redirect::route('group.index')->with('success', 'Group Deleted Successfully');
    }
}
