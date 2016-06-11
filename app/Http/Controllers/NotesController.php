<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Task;
use App\Note;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

/**
 * Provides actions for task notes.
 */
class NotesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Shows notes for the task provided.
     * 
     * @param Task $task        Task to show the notes for
     * @param Note $note        Note to show
     */
    public function show(Task $task, Note $note) {
        return view('notes.show', compact('task', 'note'));
    }

    /**
     * Stores a note against the task provided.
     * 
     * @param Task $task        Task to store the note against
     */
    public function store(Task $task) {
        $input = Input::all();
        $rules = array(
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required|unique:notes'
        );

        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::route('tasks.show', $task->slug)
                            ->withErrors($validator)
                            ->withInput();
        } else {
            Note::create($input);
        }

        return Redirect::route('tasks.show', $task->slug)->with('success', 'Note has been successfully added');
    }
}
