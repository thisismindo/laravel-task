<?php

namespace App\Http\Controllers;

use Auth;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Initialize TaskController
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Task index
     *
     * return view
     */
    public function index()
    {
        return view('task.home');
    }

    public function get()
    {
        return Task::with('user')->get();
    }

    /**
     * Create new task
     *
     * @return array
     */
    public function create()
    {
        $this->validate(request(), [
            'task_title' => 'required|max:64',
            'task_description' => 'required'
        ]);

        $user = Auth::user();
        $message = Task::create([
            'user_id' => $user->id,
            'task_title' => request('task_title'),
            'task_description' => request('task_description')
        ]);

        return ['status' => true];
    }

    /**
     * Delete existing task
     *
     * @param int $task_id
     *
     * @return array
     */
    public function delete($task_id)
    {
        $task = Task::find($task_id);
        $task->delete();

        return ['status' => true, 'id' => $task_id];
    }

    /**
     * Update task
     *
     * @param int $task_id
     *
     * @return array
     */
    public function update($task_id)
    {
        $this->validate(request(), [
            'task_title' => 'required|max:64',
            'task_description' => 'required'
        ]);

        $task = Task::find($task_id);
        $task->task_title = request('task_title');
        $task->task_description = request('task_description');
        $task->save();

        return ['status' => true, 'id' => $task_id];
    }
}
