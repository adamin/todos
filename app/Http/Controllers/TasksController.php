<?php

namespace App\Http\Controllers;

use Auth;
use App\Task;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

/**
 * Provides actions for managing the tasks.
 */
class TasksController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Entry action for the controller. 
     * Displays a list of all tasks in the system.
     */
    public function index() {
        $user = Auth::user();
        $tasks = Task::with('notes', 'owner')->get();
        return view('tasks.index', compact('tasks', 'user'));
    }
    
    /**
     * Provides hardoded piece of data to demonstrate use of highcharts.
     * Accessed via AJAX request.
     */
    public function getTasksPerMonthJson() {
        $result = array(1 => 0,2 => 0,3 => 0,4 => 0,5 => 0,6 => 0,7 => 0,8 => 0,9 => 0,10 => 0,11 => 0,12 => 0,);
        $tasks = Task::all();
        foreach ($tasks as $task)
        {
            $month = date('n', strtotime($task->created_at));
            $result[$month]++;
        }
        return Response::json(array_values($result));
    }

    /**
     * Shows information about the task provided
     * 
     * @param Task $task
     */
    public function show(Task $task) {
        $user = Auth::user();
        return view('tasks.show', compact('task', 'user'));
    }

    /**
     * Shows edit screen for the task provided
     * 
     * @param Task $task
     */
    public function edit(Task $task) {
        $user = Auth::user();
        return view('tasks.edit', compact('task', 'user'));
    }

    /**
     * Shows create screen for a new task
     * 
     * @param Task $task
     */
    public function create(Task $task) {
        $user = Auth::user();
        return view('tasks.create', compact('task', 'user'));
    }
    
    /**
     * Action for deleting tasks from the system
     * 
     * @param Task $task
     */
    public function destroy(Task $task) {
        $task->delete();

        return Redirect::route('tasks.index')->with('success', 'Task has been successfully deleted');
    }

    /**
     * Action for storing a new task
     */
    public function store() {

        $input = Input::all();
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'slug' => 'required|unique:tasks'
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::route('tasks.create')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            Task::create($input);
        }

        return Redirect::route('tasks.index')->with('success', 'Task has been created successfully');
    }

    /**
     * Action for updating thge task provided
     * 
     * @param Task $task
     */
    public function update(Task $task) {
        $input = array_except(Input::all(), '_method');

        $rules = array(
            'name' => 'required',
            'description' => 'required',
        );

        $validator = Validator::make($input, $rules);

        if ($validator->fails()) {
            return Redirect::route('tasks.edit', $task->slug)
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $task->update($input);
        }

        return Redirect::route('tasks.show', $task->slug)->with('success', 'Task has been successfully updated');
    }

}
