<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\TodoRepositoryInterface;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private TodoRepositoryInterface $todoRepository;
    public function __construct(TodoRepositoryInterface $todoRepository)
    {
        //$this->middleware('auth')->except(['index', 'todo']);
        $this->todoRepository = $todoRepository;
    }
    public function index()
    {
        #$toDos = $this->todoRepository->getAllToDoTasks();
        $user = auth()->user();
        return view('dashboard')->with('toDos', $user->todos);
    }

    /**composer require "laravelcollective/html":"^5.4.0"
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $description = $request->input('description');
        $user_id = Auth::id();
        $payload = array(
            "title" => $title, "description" => $description,
            "user_id" => $user_id
        );
        $this->todoRepository->createToDoTask($payload);
        return redirect('/todo')->with('success', 'To do item created');
    }

    /**
     * Display the specified resource.
     * @param  \App\Models\Todo  $todo
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('pages.todo', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        if ($todo->user_id === Auth::id()) {
            return view('pages.edit')->with('todo', $todo);
        } else {
            return redirect('/todo')->with('error', 'Action not allowed - you can only update items created by you');
        }
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
        $todo = Todo::find($id);
        $title = $todo->title = $request->input('title');
        $description = $todo->description = $request->input('description');
        $user_id = $todo->user_id = Auth::id();
        $payload = array(
            "title" => $title, "description" => $description,
            "user_id" => $user_id
        );
        $this->todoRepository->updateToDoTask($id, $payload);
        return redirect('/todo')->with('success', 'To do item updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get todo item by it's ID
        $todo = Todo::find($id);
        //to avoid foreign deletion we compair the user_id and logged in user id
        //
        if ($todo->user_id === Auth::id()) {
            $this->todoRepository->deleteToDoTask($id);
            return redirect('/todo')->with('success', 'Item Deleted Successfully');
        } else {
            return redirect('/todo')->with('error', 'Action not allowed - you can only delete items created by you');
        }
    }
}
