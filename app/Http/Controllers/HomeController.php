<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use Carbon\carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        if($request->get('status')){

            $id = $request->get('id');

            $task = Task::findOrFail($id);
            $task->status = $request->get('status');
            $task->update();

            return redirect()->route('home');

        }

        $today = Task::where('due_date',Carbon::today())->where('status','UNMARK')->paginate(5);
        return view('home',['today'=>$today]);
    }
}
