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
        $arr["gender"]=trim($POST["gender"]);
        $arr["date"]=date("Y-m-d H:i:s");

        // validacion

        if(empty($arr["username"]) || !preg_match("/^[a-zA-z ]+$/",$arr["username"])){
            $errors[]="El usuario solo puede tener letras y espacios";
        }

        if(!filter_var($arr["email"],FILTER_VALIDATE_EMAIL)){
            $errors[]="Introduce un email valido";
        }
        if(empty($arr["password"]) || strlen($arr["password"])<4){
            $errors[]="La contraseña debe tener al menos 4 caracteres";
        }

        if($arr["gender"] == "--Select Gender--" || ($arr["gender"]!="Female" && $arr["gender"]!="Male")){
            $errors[]="Introduce un genero valido";
        }

        // guardar datos

        if(count($errors)==0){
            return DB::table("users")->insert($arr);
        }

        return $errors;

    }

    public function login($POST){

        $errors=array();

        $arr["email"]=trim($POST["email"]);
        $password=$POST["password"];

        // leer desde la base de datos
        $data= DB::table("users")->select()->where("email = :email",$arr);

        if(is_array($data)){
            $data=$data[0];
            if($data->password==$password){
                session_regenerate_id();
                $_SESSION["USER"]["username"]=$data->username;
                $_SESSION["USER"]["email"]=$data->email;
                $_SESSION["USER"]["LOGGED_IN"]=1;
                return true;
            }
        }

        $errors[]="Email o contraseña incorrecto";

        return $errors;

    }


    public function is_logged_in(){
        if(isset($_SESSION["USER"])){
            $email=$_SESSION["USER"]["email"];

            // leer desde la base de datos
            $data= $this->get_by_email($email);
            if(is_array($data)){
                return true;
                
            }
        }

        return false;
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