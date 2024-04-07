<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\git_api_helper;

class GitHubController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        $git_api = new git_api_helper();
        $issues = $git_api->getAllIssues();
        //return $issues;
        // $toDos = ToDo::all();
        //$toDos = ToDo::orderBy('id', 'asc')->paginate(10);
        #return view('pages.git_issues')->with('issues', $issues);
        return view('pages.git_issues', [
            'issues' => collect(json_decode($issues))->flatten(2)
        ]);
    }

    /**composer require "laravelcollective/html":"^5.4.0"
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create_git_issue');
    }

    /**
     * Store a newly created Github Issue in Github database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $git_api = new git_api_helper();
        $title = $request->input('title');
        $body = $request->input('description');
        $assignees = $request->input('assignees');
        $git_api->createIssue($title, $body, $assignees);
        return redirect('/github/git_issues')->with('success', 'Github issue created');
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
        //$todo = Todo::find($id);
        //return view('pages.edit')->with('todo', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $number
     * @return \Illuminate\Http\Response
     */
    public function openIssue(Request $request, $number)
    {
        /*$state = "open";
        $git_api = new git_api_helper();
        //Owner and Repo overriden to default values in helper class git_api_helper
        $git_api->updateIssue("", "", $number, $state);*/
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $number
     * @return \Illuminate\Http\Response
     */
    public function closeIssue(Request $request, $number)
    {
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $number
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($number)
    {
        $git_api = new git_api_helper();
        $state = "closed";
        //Owner and Repo overriden to default values in helper class git_api_helper
        #return $number;
        $git_api->updateIssue("", "", $number, $state);
        return redirect('/github/git_issues')->with('success', 'Github issue closed successfully');
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
        /*$this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);*/
        //create a To Do Item
        /*$todo = Todo::find($id);
        $todo->title = $request->input('title');
        $todo->description = $request->input('description');
        $todo->save();
        return redirect('/todo')->with('success', 'To do item updated');*/
    }
}
