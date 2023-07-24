<?php
/**
 * para acceder a la clase table
 */

 class User{

    protected static $instance;


    public function __construct()
    {
        
    }

    public static function action(){
        if (!self::$instance) {
            self::$instance=new self();
        }

        return self::$instance;
    }

    public function create($POST){

        $errors=array();

        $arr["username"]=ucwords(trim($POST["username"]));
        $arr["email"]=trim($POST["email"]);
        $arr["password"]=$POST["password"];
        $arr["gende"]=trim($POST["gende"]);
        $arr["date"]=date("Y-m-d H:i:s");

        // validacion

        if(empty($arr["username"]) || preg_match("/^[a-zA-z ]$/",$arr["username"])){
            $errors[]="El usuario solo puede tener letras y espacios";
        }

        if(!filter_var($arr["email"],FILTER_VALIDATE_EMAIL)){
            $errors[]="Introduce un email valido";
        }

        if($arr["gender"]== "--Select Gender--" || ($arr["gender"]!= "Female" && $arr["gender"]!="Male")){
            $errors[]="Introduce un genero valido";
        }

        // guardar datos

        if(count($errors)==0){
            return DB::table("users")->insert($arr)->run();
        }

        return $errors;

    }


    public function update_by_id($values,$id){
        return DB::table("users")->update($values)->where("id = :id",["id"=>$id]);
    }

    public function get_all(){
        return DB::table("users")->select()->all();
    }

    // public function get_by_id($id){

    //     return DB::table("users")->select()->where("id = :id",["id"=>$id]);

    // }

    // public function get_by_email($email){
    //     return DB::table("users")->select()->where("email = :email",["email"=>$email]);
    // }

    // obteniendo informacion usando el nombre de la columna
    public function __call($name, $arguments)
    {
        $value=$arguments[0];
        $column=str_replace("get_by_","",$name);
        $column=addslashes($column);

        $check=DB::table("users")->query("show columns from users");
        
        $all_columns=array_column($check,"Field");
        // echo "<pre>";
        // print_r($all_columns);
        if(in_array($column,$all_columns)){

            return DB::table("users")->select()->where($column . " = :" . $column , [$column=>$value]);
        }

        return false;
    }
       
    
 }