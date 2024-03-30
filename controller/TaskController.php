<?php 

    require_once "model/TaskModel.php";

    

class HomeController{

    public static function index(){
        $tasks = Query::GetAll();
        require_once "view/task_view.php";
    }

    public static function status($id){
        Query::verif_status($id);
    }

    public static function add_task($task){
        Query::add_task($task);
    }

    public static function destroy($id){
        Query::destroy($id);
    }

}