<?php  

Class Banco{

    private static $conn;

    public static function GetInstance(){
        if(self::$conn == NULL){
            self::$conn = new PDO("mysql:host=localhost;dbname=tasks","root","");
        }
        return self::$conn;
    }
}
Class Query{

    public static function GetAll(){
        $dados = Banco::GetInstance()->Query("SELECT * FROM tasks");
        return $dados->fetchAll();
    }

    public static function alter_status($id,$status){
        $update = Banco::GetInstance()->query("UPDATE tasks SET completed = '$status' WHERE id = '$id'");
    }

    public static function verif_status($id){
        $task = Banco::GetInstance()->query("SELECT * FROM tasks WHERE id = '$id'");
        $status = $task->fetch();
        if($status["completed"] == NULL){
            self::alter_status($id,"FEITO");
            header("location: index.php");
        }else{
            self::alter_status($id,NULL);
            header("location: index.php");
        }
    }
    
    public static function add_task($task){
        $add = Banco::GetInstance()->prepare("INSERT INTO tasks (description) VALUES (:d)"); 
        $add->BindValue(":d",$task);
        $add->execute();   
        header("location: index.php");
    }

    public static function destroy($id){
        $destroy = Banco::GetInstance()->query("DELETE FROM tasks WHERE id = '$id'");
        header("location: index.php");
    }
}
