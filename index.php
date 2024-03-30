<?php 

require_once "controller/TaskController.php"; 


if(isset($_GET["action"])){

    $action = $_GET["action"];

    switch ($action) {
        case "status":
            $id = $_POST["status"];
            HomeController::status($id); 
            break;

        case "add":
            $task = $_POST["tarefa"]; 
            HomeController::add_task($task);
            echo "fsf";
            break;

        case "destroy":
            $id = $_POST["excluir"];
            HomeController::destroy($id); 
            break;
    }

}else{
    HomeController::index();
}
