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
       // $this->middleware('auth');
    }
/*
 * Get all Tasks

    public function index(){
         $tasks = Task::where("isdeleted", false)->orderBy("id", "DESC")->get();

        return view("welcome", compact("tasks"));
    }*/
    public function index(Request $request){
        $tasks = Task::where("isdeleted", false)->orderBy("id", "DESC")->get();
        if ((!empty($request->api)) && ($request->api==1)){
            return response()->json( $tasks  );
        }else{
            return view("welcome", compact("tasks"));
        }

    }
    /*
    * Edit task where id
    */
    public function edit($id){
        $task = Task::where("id", $id)->first();
        return response()->json( $task  );
    }
    /*
     * Post task to database
     */
    public function post(Request $request)
    {
        $task=$request->task ;
        $desc=$task['task_desc'] ;

            $task = new Task();
            $task->task = $desc;
            $task->save();
            $message="Task has been added!";
        return response()->json(  $message);
    }
    /*
 * Post task to database
 */
    public function update($id,Request $request)
    {
        $task=$request->task ;
        $desc=$task['task_desc'] ;

             $task = Task::find($id);
             $task->task =$desc;
             $task->save();
             $message="Task updated successfully!";

        return response()->json(  $message);
    }
    /*
   * Mark task as completed
   */
    public function complete(Request $request)
    {
        $task = Task::find($request->task_id);
        $task->iscompleted =1 ;
        $task->save();
        return response()->json( "Task updated o completed list"  );
    }
 /*
* Mark task as deleted
*/
    public function destroy(Request $request)
    {
        $task = Task::find($request->task_id);
        $task->isdeleted =1 ;
        $task->save();
        return response()->json( "Task deleted"  );
    }
}//end controller
