@extends('layouts.app')

@section('content')


    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My tasks</div>
                <div class="card-body">
               

                 <div class="row">
                    <div class="col-md-4">
                         <a name="" id="" class="btn btn-primary mb-2" href="{{route('task.index')}}" role="button"><i class="far fa-hand-point-left"></i> Back</a>
                         {{--  <a name="" id="" class="btn btn-danger mb-2 ml-2" href="#" role="button"><i class="fas fa-trash-restore"></i> Trash</a>  --}}
                         
                    </div>
                    
                    {{--  <div class="col-md-2">
                        
                    </div>
    
                    <div class="col-md-6">
                    <form class="form-inline my-2 my-lg-0" action="{{route('task.index')}}">
                         <input class="form-control" name="date"  id="datepicker" width="200"  placeholder="Search by date" />
                         <input class="form-control ml-sm-2 mr-sm-2" type="search" name="description" value="{{Request::get('description')}}" placeholder="Search by description" aria-label="Search">
                         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                     </form>                
                    </div>  --}}
                </div> 


                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($trash->count() >0)    
                              @foreach($trash as $data)  
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$data->title_task}}</td>
                                    <td>{{$data->description}}</td>
                                    <td>{{$data->due_date}}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{route('task.restore',['id' => $data->id])}}" role="button"><i class="fas fa-undo"></i></a>
                                        <a class="btn btn-primary btn-sm" href="{{route('task.deletepermanent',['id' => $data->id])}}" role="button" onclick="return confirm('Are you sure for delete permanent ?');"><i class="fas fa-ban"></i></a>
                                    </td>                                                             
                                </tr>
                              @endforeach     
                            @else
                                <tr>
                                    <td colspan="5" class="text-center"><h4>EMPTY</h4></td> 
                                </tr>    
                            @endif
                            </tbody>
                    </table>

                    {{$trash->appends(Request::all())->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
       
@endsection

@section('footer-scripts')
    
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
    </script>
@endsection