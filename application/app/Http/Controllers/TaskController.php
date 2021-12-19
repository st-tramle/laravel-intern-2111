<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use App\Models\TaskCollection;
use Illuminate\Http\Request;

class TaskController extends Controller
{ 
    private $tasks;
    public function __construct()
    {
        $this->tasks = new TaskCollection();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.task.index')->with('tasks', $this->tasks->all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.task.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    { 
        $newTask = new Task(
            $request->title,
            $request->description,
            $request->type,
            $request->status,
            $request->startDate,
            $request->dueDate,
            $request->assignee,
            $request->estimate,
            $request->actual) ;
        $this->tasks->addItem($newTask);
        return view('admin.task.index')->with('tasks', $this->tasks->all());
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
        $task = $this->tasks->getItem($id);
        return view('admin.task.edit',compact('task','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $task = new Task(
            $request->title,
            $request->description,
            $request->type,
            $request->status,
            $request->startDate,
            $request->dueDate,
            $request->assignee,
            $request->estimate,
            $request->actual) ;
        $this->tasks->updateItem($task,$id);
        return view('admin.task.index')->with('tasks', $this->tasks->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->tasks->deleteItem($id);
        return view('admin.task.index')->with('tasks', $this->tasks->all());
    }
}
