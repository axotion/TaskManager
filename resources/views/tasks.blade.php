@extends('layout.master')

<script src="/js/axios.js"></script>
@section('body')

    @foreach($archives as $date => $tasks)
        <div class="alert alert-dismissible">
        <b> <h5> style="font-family: 'Lucida Grande', 'Lucida Sans Unicode', Verdana, Arial, Helvetica, sans-serif">
        {{ $date }}</h5>
        </b>
        </div>
        @foreach($tasks as $task)
            @if($task->complete)

        <div class="alert alert-danger text-justify" id="{{ $task->id  }}">
		<p>
                {{ $task->task }}
				<p/>
            <div class="pull-right" style="margin-top: -0.7%; ">
                <button id = "{{$task->id}}" class="btn btn-danger btn-primary btn-default"  onclick="deleteTask(this.id)">Delete</button>
            </div>
            <br>
        </div>
        @else
            <div class="alert alert-success text-justify" id="{{ $task->id}}_area">

<p>
  {{ $task->task }}
<p/>
                <div class="pull-right" style="margin-top: -0.7%" >
                    <button id = "{{$task->id}}_mark" class="btn btn-info btn-primary btn-default"  onclick="markTask(this.id)">Mark as completed</button>
                    <button id = "{{$task->id}}_delete" style="display:none" class="btn btn-info btn-primary btn-default" onclick="deleteTask(this.id)">Delete</button>
                </div>
<br>
            </div>
            @endif

        @endforeach
    @endforeach
@endsection
