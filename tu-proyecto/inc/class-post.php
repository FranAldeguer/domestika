<?php
Class Post{
    
    protected int $id;
    protected string $title;
    protected $excerpt;
    protected $content;
    protected $published_on;
    protected $user;
    
    function __construct($id, $title, $excerpt, $content, $published_on, $user){
        $this->id = $id;
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->content = $content;
        $this->published_on = $published_on;
        $this->user = $user;
    }
    
    
    // Getters
    public function getId(){ return $this->id; }
    public function getTitle(){ return $this->title; }
    public function getExcerpt(){ return $this->excerpt;}
    public function getContent(){ return $this->content;}
    public function getPublished_on(){ return $this->published_on;}
    public function getUser_id(){ return $this->user;}
    
    // Setters
    public function setId($id){$this->id = $id;}
    public function setTitle($title){$this->title = $title;}
    public function setExcerpt($excerpt){$this->excerpt = $excerpt;}
    public function setContent($content){$this->content = $content;}
    public function setPublished_on($published_on){$this->published_on = $published_on;}
    public function setUser_id($user_id){$this->user = $user_id;}

    
    /**
     * Devuelve todos los posts
     */
    public static function _getAllPosts(){
        global $app_db;
        $query = "SELECT p.*, u.username FROM posts p, users u WHERE p.user = u.id order by p.id DESC";
        $result = $app_db->query($query);
        return $app_db->fetch_all($result);        
    }
    
    /*
     * Devuelve un único post si se le pasa un id valido
     * Si no, no de vuelve nada.
     */
    public static function _getPost($id){
        global $app_db;
        $query = "SELECT p.*, u.username FROM posts p, users u WHERE p.user = u.id and p.id = " . $id;
        $result = $app_db->query ($query);
       
        $temp = $app_db->fetch_assoc($result);
        
        return new Post($temp['id'], $temp['title'], $temp['excerpt'], $temp['content'], $temp['published_on'], $temp['username']);
    }
    
    
    
    
    /**
     * Inserta un post en la base de datos
     */
    //public function insert(){ 
    public function insert($title, $excerpt, $content){
        global $app_db;
        $published_on = date("Y-m-d H:i:s");
        $title = $app_db->real_escape_string( $title);
        $excerpt = $app_db->real_escape_string($excerpt);
        $content = $app_db->real_escape_string($content);
        $author = null;
        if(isset($_SESSION['user_name'])){
            $author = $_SESSION['user_id'];
        }
        $query = "INSERT into posts
                  (title, excerpt, content, published_on, user)
                  VALUES ('$title','$excerpt','$content','$published_on', '$author')";
        $app_db->query( $query );
    }
    
    /**
     * Borrar un post
     */
    public function delete(){
        global $app_db;
        $query = "DELETE FROM posts WHERE id = '$this->id'";
        $app_db->query($query);
    }
    
    /*
     * Modificar un post en la base de datos
     */
    public function update($id, $title, $excerpt, $content){
        global $app_db;
        
        $id = intval($id);
        $title = $app_db->real_escape_string($title);
        $excerpt = $app_db->real_escape_string($excerpt);
        $content = $app_db->real_escape_string($content);
        
        $query = "UPDATE posts SET
                  title = '$title',
                  excerpt = '$excerpt',
                  content = '$content'
                  WHERE id='$id'";
        
        $title = $app_db->real_escape_string($title);
        $excerpt = $app_db->real_escape_string($excerpt);
        $content = $app_db->real_escape_string($content);
        
        $app_db->query($query);
    }
    
    public function ini(){
        $this->id = "";
        $this->title = "";
        $this->excerpt = "";
        $this->content = "";
        $this->published_on = "";
        $this->user = "";
    }
    
    
    
}




?>
