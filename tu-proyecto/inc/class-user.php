<?php
  class User
  {
    // Propiedades
    protected $id;
    protected $name;
    protected $email;
    protected $password;
    protected $role;

    // Cosntructor
    function __construct($name, $email, $password, $role)
    {
      $this->name = $name;
      $this->email = $email;
      $this->password = $password;
      $this->role = $role;
    }

    // toString
    public function __toString(){

      echo "Mostrando usuario";

      $usuario = "Nombre : " . $this->name . "<br>";
      $usuario .= "Email : " . $this->email . "<br>";
      $usuario .= "Role : " . $this->role . "<br>";

      return $usuario;
    }

    // Getters
    public function getId(){return $this->id;}
    public function getName(){return $this->name;}
    public function getEmail(){return $this->email;}
    public function getPassword(){return $this->password;}
    public function getRole(){  return $this->role;}

    // Setters
    public function setId($id){$this->id = $id;}
    public function setName($name){$this->name = $name;}
    public function setEmail($email){$this->email = $email;}
    public function setPassword($password){$this->password = $password;}
    public function setRole($role){$this->role = $role;}

    /**
    * retrun User;
    *
    */
    public static function _getUser($userid){
      global $app_db;
      
      $query = "SELECT * FROM users WHERE id = " . $userid;
      
      //die("adfasdfasdf = ".$userid);
      
      $result = $app_db->query($query);
      

      $usuario = $app_db->fetch_assoc($result);
      $temp = new User("","","","");
      
      $temp->id = $usuario['id'];
      $temp->name = $usuario['username'];
      $temp->email = $usuario['email'];
      $temp->password = $usuario['password'];
      $temp->role = $usuario['role'];

      return $temp;

    }
    
    

    public static function _getAllUsers(){
        global $app_db;

        $query = "SELECT * FROM users WHERE id != 0";
        $result = $app_db->query($query);

        $usuarios = $app_db->fetch_all($result);

        $usuariosArr = [];

        foreach ($usuarios as $u) {
            array_push($usuariosArr, User::_getUser($u['id']));
        }

        return $usuariosArr;
    }

    public function insertUser(){
      global $app_db;
      if($this->name == null ||
         $this->password == null ||
         $this->role == null ||
         $this->email == null){
           die ("no puedes dejar campos vac??os");
      }

      $query = "INSERT INTO users(username, password, email, role)
                values ('".$this->name."', '".$this->password."', '".$this->email."', '".$this->role."') ";

      $result = $app_db->query($query);

      return $result;
    }
    
    public function updateUser(){
        global $app_db;
        
        /*if( $this->id == null ||
            $this->name == null ||
            $this->password == null ||
            $this->role == null ||
            $this->email == null){
                die ("no puedes dejar campos vac??os");
        }
        if( $this->id == null ){die ("no puedes dejar el id vac??o");}
        if( $this->name == null ){die ("no puedes dejar el name vac??o");}
        if( $this->password == null ){die ("no puedes dejar el pass vac??o");}
        if( $this->role == null ){die ("no puedes dejar el role vac??o");}
        if( $this->email == null ){die ("no puedes dejar el email vac??o");}
        */
        $query = "UPDATE users SET";
        $query .= " username = '" . $this->name;
        $query .= "', email = '" . $this->email;
        $query .= "', password = '" . $this->password;
        $query .= "', role = '" . $this->role;
        $query .= "' WHERE id = ". $this->id .";";
        
        $query="UPDATE posts SET title = 'abcd', excerpt = '12345697adfdsf', content = '??DFKAJSDL??FJASDLFKJASL??DJF' WHERE id = 78;";
        //die($query);
        $app_db->query($query);
        
    }
    
    public function deleteUser(){
        global $app_db;
        
        $query = "DELETE FROM users WHERE id = " . $this->id;
        
       // die($query);
        
        $app_db->query($query);
    }

    protected function inicializar($arrValores){
      $temp = new User();

      $temp->id = $arrValores['id'];
      $temp->name = $arrValores['username'];
      $temp->email = $arrValores['email'];
      $temp->password = $arrValores['password'];
      $temp->role = $arrValores['role'];

      return $temp;
    }



  }





 ?>
