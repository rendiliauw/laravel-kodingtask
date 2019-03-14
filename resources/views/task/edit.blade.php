@extends('layouts.app')

@section('content')


    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My tasks</div>
                <div class="card-body">


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="post" action="{{route('task.update',['id' => $task->id])}}">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title Task</label>
                            <input type="text" name="title_task" value="{{old('title_task') ? 'old("title_task")' : $task->title_task }}" class="form-control"> 
                            @if($errors->has('title_task')) <small>{{$errors->first('title_task')}}</small> @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description Task</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{old('description') ? 'old("description")' : $task->description}}</textarea>
                            @if($errors->has('description')) <small>{{$errors->first('description')}}</small> @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Due Date</label>
                            <input type="text" name="due_date" id="datepicker" value="{{old('due_date') ? 'old("due_date")' : $task->due_date}}" class="form-control"> 
                            @if($errors->has('due_date')) <small>{{$errors->first('due_date')}}</small> @endif
                        </div>  

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>                   

                </div>
            </div>
        </div>
    </div>
</div>
       
@endsection

@section('footer-scripts')
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'yyyy-mm-dd'
            
        });
    </script>
@endsection

