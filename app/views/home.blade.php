@extends('layout')
@section('content')
	<section class="header section-padding">
		<div class="background">&nbsp;</div>
		<div class="container">
			<div class="header-text">
				<h1>Learning Laravel: The Easiest Way</h1>
				<p>
				This is our To-do list!	<br />
				Built using Laravel 4 framework!
				</p>
			</div>
		</div>
	</section>

	<div class="container">
		<section class="section-padding">
			<div class="jumbotron text-center">
				
				<div class="panel panel-default">
			 <div class="panel-heading">
			  <h1>
			   	 <span class="grey">Our</span> To-do List	
			  </h1>	
			 </div>

			  @if($tasks->isEmpty())
			  	<p>Currently, there is no task!</p>
			  	@else
			  	 <table class="table">
			  		<thead>
			  			<tr>
				  			<th class="alignmn">#</th>
							<th class="alignmn">Title</th>
							<th class="alignmn">Body</th>
							<th class="alignmn">Finish</th>
						</tr>
					</thead>
				  <tbody>
					@foreach($tasks as $task)
					<tr>
						<td>{{ $task->id }} </td>
						<td>
							<a href="{{ action('TasksController@show', $task->id) }}"> 
							{{ $task->title }}</a>
						</td>
						<td>{{ $task->body}}</td>
						<td>{{ $task->done ? 'Yes' : 'No'}}</td>
						<td>
		 
<a href="{{ action('TasksController@edit', $task->id) }}"
class="btn btn-info">Edit</a>
 <a class="btn btn-danger" href="{{action('TasksController@destroy',$task->id)}}">Delete</a>
					</td>	
					</tr>
					@endforeach
				  </tbody>
				 </table>
				@endif
			 	
				</div>
			</div>
		</section>
	</div>
@stop