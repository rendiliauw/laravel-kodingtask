<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Http\Requests\TaskValidation;
use Carbon\carbon;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $description = $request->get('description') ? $request->get('description') : '' ;
        $tanggal = $request->get('tanggal') ? $request->get('tanggal') : '';

        $task = Task::orderBy('created_at','desc')->paginate(10);
       
       
        
        if($description){
            
            $task = Task::where('description','LIKE',"%$description%")->paginate(10);
   

        }elseif($tanggal){

            $task = Task::where('due_date',$tanggal)->paginate(10);

        }
        
      
        return view('task.index',['task'=>$task]);

       

        
      
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskValidation $request)
    {
        $validated = $request->validated();

        $task = new Task;
        $task->user_id = \Auth::user()->id;
        $task->title_task = $request->get('title_task');
        $task->description = $request->get('description');
        $task->due_date =  Carbon::parse($request->get('due_date'))->format('Y-m-d') ;
        $task->save();

        return redirect()->route('task.create')->with('status','Task ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('task.edit',['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskValidation $request, $id)
    {
        $validated = $request->validated();

        $task = Task::findOrFail($id);
        $task->title_task = $request->get('title_task');
        $task->description = $request->get('description');
        $task->due_date = Carbon::parse($request->get('due_date'))->format('Y-m-d') ;
        $task->update();

        return redirect()->route('task.edit',['id'=>$task])->with('status','Data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('task.index')->with('status','Data berhasil dihapus');
    }

    public function trash(){

        $trash = Task::onlyTrashed()->paginate(10);
        
        return view('task.trash',['trash'=>$trash]);

    }

    public function restore($id){

        $trash = Task::withTrashed()->findOrFail($id);
        $trash->restore();

        return redirect()->route('task.trash')->with('status','Data berhasil restore');

    }

    public function deletepermanent($id){
        $trash = Task::withTrashed()->findOrFail($id);
        $trash->forceDelete();

        return redirect()->route('task.trash')->with('status','Data berhasil dihapus permanent');
    }

}
