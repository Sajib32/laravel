<?php

class TasksController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function home()
	{
		$tasks = Task::all();
		return View::make('home')->with('tasks', $tasks);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function edit(Task $task)
	{
		return View::make('edit', compact('task'));
	}

	public function doEdit()
	{
		$task = Task::findOrFail(Input::get('id'));
		$task->title = Input::get('title');
		$task->body = Input::get('body');
		$task->done = Input::get('done');
		$task->save();

		return Redirect::action('TasksController@home');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */



	public function saveCreate()
	{
		$input = Input::all();

		$task = new Task;
		$task->title = $input['title'];
		$task->body = $input['body'];
		$task->save();

		return Redirect::action('TasksController@home');
	}

	public function destroy(Task $task){
		return View::make('destroy',compact('task'));
		}

	public function doDelete(){
		$task = Task::findOrFail(Input::get('id'));
		$task->delete();
		return Redirect::action('TasksController@home');
	}

	public function show($id)
	{
		$task = Task::find($id);

		return View::make('task', compact('task'));
	}

}
