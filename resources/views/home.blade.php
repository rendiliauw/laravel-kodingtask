@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    Notification
                </div>
                <div class="card-body">
                    <h5>You Have {{taskNotif()}} Tasks Today</h5>
                </div>
        </div>

        </div>
        <div class="col-7">
            <div class="card">
                <div class="card-header">
                    My Task Today
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">
                                        {{--  <input class="form-check-input" type="checkbox" value="" id="selectallmark">  --}}
                                    Status
                                </th>
                                </tr>
                            </thead>
                            <tbody>
                            @if($today->count() >0)    
                              @foreach($today as $data)  
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$data->title_task}}</td>
                                    <td>{{$data->description}}</td> 
                                    <td>
                                    @if($data->status == 'UNMARK')
                                    <form action="{{route('home')}}">
                                        <input type="hidden" value="{{$data->id}}" name="id">
                                        <button name="status" value="MARK" class="btn btn-primary btn-sm" href="#" role="button">Mark</button>
                                    </form    
                                    {{--  <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="">
                                    </div>  --}}
                                    @endif    
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

                {{$today->appends(Request::all())->links()}}    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
