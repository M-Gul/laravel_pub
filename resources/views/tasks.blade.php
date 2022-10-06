
 
@extends('layouts.app')
 
@section('content')
 
    <!-- Bootstrap Boilerplate... -->
 
    <div class="container mt-5 ">
        <!-- Display Validation Errors -->
    
 
        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            @csrf
 
            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 form-label">Task</label>
 
                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>
 
            <!-- Add Task Button -->
            <div class="form-group">
                <div class="mt-1">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
 @if (count($tasks) > 0)
        <div class="">
            <div class="text-center mt-5">
              <h2>  Current Tasks</h2>
            </div>
 
            <div class="">
                <table class="table">
 
                
                    <thead>
                        <th>Task</th>
                        <th>Created At</th>
                        <th>&nbsp;</th>
                    </thead>
 
               
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                            
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $task->created_at }}</div>
                                </td>
 
                                <td>
                                    <form action="/del/{{ $task->id }}" method="POST">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                  
                            
                                        <button>Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
 
    <!-- TODO: Current Tasks -->
@endsection