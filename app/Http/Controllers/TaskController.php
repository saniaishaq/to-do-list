<?php
/*
 * Add /edit mark as completed task controller
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Task;
class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
/*
 * Get all Tasks
 */
    public function index(){
         $tasks = Task::where("isdeleted", false)->orderBy("id", "DESC")->get();

        return view("welcome", compact("tasks"));
    }
    /*
    * Edit task where id
    */
    public function edit($id){
        $task = Task::where("id", $id)->first();
        return view("welcome", compact("task"));
    }
    /*
     * Post task to database
     */
    public function post(Request $request)
    {
        if($request->t_id){
            $task = Task::find($request->t_id);
            $task->task =$request->task ;
            $task->save();
            $message="Task updated successfully!";
        }else{
            $input = $request->all();
            $task = new Task();
            $task->task = request("task");
            $task->save();
            $message="Task has been added!";
        }
        return Redirect('list')->with("message", $message);
    }
    /*
   * Mark task as completed
   */
    public function complete($id)
    {
        $task = Task::find($id);
        $task->iscompleted =1 ;
        $task->save();
        return Redirect('list')->with("message", "Task updated o completed list");
    }
 /*
* Mark task as deleted
*/
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->isdeleted =1 ;
        $task->save();
        return Redirect('list')->with('message', "Task deleted");
    }
}//end controller
