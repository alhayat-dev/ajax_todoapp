<?php

namespace App\Http\Controllers;

use App\TodoList;
use Illuminate\Http\Request;

class TodoListsController extends Controller
{

    public function index(Request $request)
    {
        $todolists = $request->user()
                            ->todolists()
                            ->orderby('updated_at', 'desc')
                            ->get();
        return view('todolists.index')->with('todolists', $todolists);
    }

    public function create()
    {
        $todolist = new TodoList();
        return view('todolists.form')->with('todolist', $todolist);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'min:5'
        ]);
        $data = $request->all();
        $todolist = $request->user()->todolists()->create($request->all());
//        $data['user_id'] = $request->user()->id;
//        $todolist =  TodoList::create($data);
        return view('todolists.item', compact('todolist'));
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
        //
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
