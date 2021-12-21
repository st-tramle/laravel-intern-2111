<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $tasks = DB::table('tasks')->get();
        return view('admin.task.index', compact('tasks'));
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
        $task = DB::table('tasks')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'status' => $request->status,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'assignee' => $request->assignee,
            'estimate' => $request->estimate,
            'actual' => $request->actual
        ]);
        if ($task) {
            return redirect()->route('admin.tasks.index')->with('msg', 'Created successfully!');
        }
        return redirect()->route('admin.tasks.index')->with('msg', 'Failed to create!');
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
        $task = DB::table('tasks')->find($id);
        return view('admin.task.edit', compact('task'));
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
        if (DB::table('tasks')->find($id)) {
            $task = DB::table('tasks')->where('id', $id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'type' => $request->type,
                'status' => $request->status,
                'start_date' => $request->start_date,
                'due_date' => $request->due_date,
                'assignee' => $request->assignee,
                'estimate' => $request->estimate,
                'actual' => $request->actual
            ]);
            if ($task) {
                return redirect()->route('admin.tasks.index')->with('msg', 'Updated successfully!');
            }
            return redirect()->route('admin.tasks.index')->with('msg', 'Failed to update!');
        }
        return redirect()->back()->with('msg', 'Invalid Id!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = DB::table('tasks')->where('id', $id)->delete();
        if ($task) {
            return redirect()->route('admin.tasks.index')->with('msg', 'Deleted successfully!');
        }
        return redirect()->route('admin.tasks.index')->with('msg', 'Failed to delete!');
    }

    /**
     * Practice with query Buider
     *
     * @param  int  $id
     * @return void
     */
    public function practice($id)
    {
        //Lấy tất cả dữ liệu trong table.
        DB::table('users')->get();
        //Đếm số lượng record trả về
        $users = DB::table('users')->count();
        //Lấy ra một dữ liệu trong table.
        DB::table('tasks')->find($id);
        //Chunk giá trị trả về.
        DB::table('users')->orderBy('id')->chunk(10, function ($users) {
            foreach ($users as $user) {
                echo $user->name;
            }
        });
        //Đếm số lượng record trả về.
        DB::table('users')->count();
        //Kiểm tra sự tồn tại của dữ liệu
        if (DB::table('users')->where('email', 'abc@gmail.com')->exists()) {
            // exists
        }
        //Select dữ liệu trong database.
        DB::table('users')
            ->select('name', 'email as user_email')
            ->get();
        // Joins
        DB::table('users')
            ->join('tasks', 'users.id', '=', 'tasks.assignee')
            ->select('users.*', 'tasks.title', 'tasks.start_date', 'tasks.due_date')
            ->get();
        // Left join
        DB::table('users')
            ->leftJoin('tasks', 'users.id', '=', 'tasks.assignee')
            ->get();
        // Cross join
        DB::table('users')
            ->crossJoin('tasks')
            ->get();
        //  Advanced Join 
        // "select * from `users` inner join `tasks` on `users`.`id` = `tasks`.`assignee` and `tasks`.`assignee` = 5"
        DB::table('users')
            ->join('tasks', function ($join) {
                $join->on('users.id', '=', 'tasks.assignee')
                     ->where('tasks.assignee', '=', 5);
            })
            ->get();
        //Union
        $first = DB::table('users')
                    ->whereNull('name');

        $users = DB::table('users')
                    ->whereNull('email')
                    ->union($first)
                    ->get();
        //Where query.
        //select * from `tasks` where `type` = 1 or (`status` = 1 and estimate > actual)
        DB::table('tasks')
            ->where('type', 1)
            ->orWhere(function($query) {
                $query->where('status', 1)
                    ->whereRaw('estimate > actual');
            })
            ->get();
    }
}
