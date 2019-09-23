@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Done !!!  </strong>{{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="col-md-12">
            <h1>Todo List</h1>
            <form method="POST" action={{url('/task')}}>
                {{csrf_field()}}
                @if (!empty($task ))
                    <input type="hidden" name="t_id" id="t_id" value="{{$task->id}}"/>
                    @endif
                <div class="form-group">
                      <textarea class="form-control" id="task" rows="3" name="task"> @if (!empty($task )){{$task->task}} @endif </textarea>

                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        @if (!empty($task ))
                        Update
                        @else
                            Add
                    @endif
                    </button>
                </div>
            </form>
            <hr>
            @if (!empty($tasks ))
                <div class="row">
                @foreach($tasks as $_task)
                    <div class="col-sm-3">
                        <div class="card">
                            <div class="card-body px-0">
                                <p class="card-text px-2">{{ $_task->task }}</p>

                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item">
                                 @if ($_task->iscompleted !=1)<a href ={{url('/'.$_task->id.'/complete')}} class="badge badge-pill badge-dark" >Mark completed</a>
                                    @else
                                            <span class="badge badge-pill badge-success">Completed</span>
                                    @endif
                                    </li>  </ul>
                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item">     @if ($_task->iscompleted !=1)
                                         <a href ={{url('/'.$_task->id.'/edit')}} class="btn btn-warning btn-sm" >Edit</a> @endif
                                      <a href ={{url('/'.$_task->id.'/delete')}} class="btn btn-danger btn-sm" >Delete</a> </li>
                                </ul>
                                </div>
                        </div>
                    </div>

                @endforeach
                </div>
                @endif
        </div>
    </div>
@endsection