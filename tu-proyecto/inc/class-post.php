<?php
Class Post{
    
    protected int $id;
    protected string $title;
    protected $excerpt;
    protected $content;
    protected $published_on;
    protected $user;
    protected $imgName;
    protected $imgExt;
    
    function __construct($title, $excerpt, $content, $published_on, $user, $imgName, $imgExt){
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->content = $content;
        $this->published_on = $published_on;
        $this->user = $user;
        $this->imgName = $imgName;
        $this->imgExt = $imgExt;
    }
    
    public function __toString(){
        echo "Mostrando post<br>";
        
        $post = "Id : " . $this->id . "<br>";
        $post .= "Título : " . $this->title . "<br>";
        $post .= "Excerpt: " . $this->excerpt . "<br>";
        $post .= "Contenido: ". $this->content . "<br>";
        $post .= "Published on: " . $this->published_on . "<br>";
        $post .= "Publicado por: " . $this->user . "<br>";
        $post .= "Nombre imagen: " . $this->imgName ."<br>";
        $post .= "Extensión de imagen: " . $this->imgExt ."<br>";
        
        return $post;
    }
    
    // Getters
    public function getId(){ return $this->id; }
    public function getTitle(){ return $this->title; }
    public function getExcerpt(){ return $this->excerpt;}
    public function getContent(){ return $this->content;}
    public function getPublished_on(){ return $this->published_on;}
    public function getUser_id(){ return $this->user;}
    public function getImgName(){ return $this->imgName;}
    public function getImgExt(){ return $this->imgExt;}
    
    // Setters
    public function setId($id){$this->id = $id;}
    public function setTitle($title){$this->title = $title;}
    public function setExcerpt($excerpt){$this->excerpt = $excerpt;}
    public function setContent($content){$this->content = $content;}
    public function setPublished_on($published_on){$this->published_on = $published_on;}
    public function setUser_id($user_id){$this->user = $user_id;}
    public function setImgName($imgName){$this->imgName = $imgName;}
    public function setImgExt($imgExt){$this->imgExt = $imgExt;}

    
    /**
     * Devuelve un único post si se le pasa un id valido
     * Si no, no de vuelve nada.
     */
    public static function _getPost($id){
        global $app_db;
        $query = "SELECT p.*, u.username FROM posts p, users u WHERE p.user = u.id and p.id = " . $id;
        $result = $app_db->query ($query);
        
        $post = $app_db->fetch_assoc($result);
        
        $temp = new Post("", "", "", "", "", "", "");
        
        $temp->setId($post['id']);
        $temp->setTitle($post['title']);
        $temp->setExcerpt($post['excerpt']);
        $temp->setContent($post['content']);
        $temp->setPublished_on($post['published_on']);
        $temp->setUser_id($post['user']);
        $temp->setImgName($post['img_name']);
        $temp->setImgExt($post['img_ext']);
        
        return $temp;        
    }
    
    /**
     * Devuelve todos los posts
     */
    public static function _getAllPosts(){
        global $app_db;
        
        $query = "SELECT p.*, u.username FROM posts p, users u WHERE p.user = u.id order by p.id DESC";
        $result = $app_db->query($query);
        
        $posts = $app_db->fetch_all($result);
        
        $postsArr = [];
        
        foreach ($posts as $p){
            array_push($postsArr, Post::_getPost($p['id']));
        }
        
        return $postsArr;
    }
    
    
    /**
     * Inserta un post en la base de datos *
     */
    public function insert(){
        global $app_db;
        $published_on = date("Y-m-d H:i:s");
        $title = $app_db->real_escape_string( $this->title );
        $excerpt = $app_db->real_escape_string($this->excerpt);
        $content = $app_db->real_escape_string($this->content);
        $imgName = $app_db->real_escape_string($this->imgName);
        $imgExt = $app_db->real_escape_string($this->imgExt);
        
        if(isset($_SESSION['user_name'])){
            $author = $_SESSION['user_id'];
        }
        $query = "INSERT into posts
                  (title, excerpt, content, published_on, user, img_name, img_ext)
                  VALUES ('$title','$excerpt','$content','$published_on', '$author', '$imgName','$imgExt' )";
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
    public function update(){
        global $app_db;
        
        $this->id = intval($this->id);
        $this->title = $app_db->real_escape_string( $this->title );
        $this->excerpt = $app_db->real_escape_string($this->excerpt);
        $this->content = $app_db->real_escape_string($this->content);
        //$this->imgName = $app_db->real_escape_string($this->imgName);
        //$this->imgExt = $app_db->real_escape_string($this->imgExt);
        
        /*$query = "UPDATE posts SET ";
        $query .= "title = '$this->title', ";
        $query .= "excerpt = '$this->excerpt', ";
        $query .= "content = '$this->content' ";
        $query .= "WHERE id='$this->id';";*/
        
        $query = "UPDATE posts SET";
        $query .= " title = '" . $this->title;
        $query .= "', excerpt = '" . $this->excerpt;
        $query .= "', content = '" . $this->content;
        $query .= "' WHERE id = ". $this->id .";";
        
        //$query = "UPDATE users SET username = 'Veronicaasdf', email = 'vero@localhost.com', password = '$2y$10soSwXJRXU15sXmUz7no3ee5h12MjOWwVs3zOs/nySPEeLlRVngk5G', role = 'creador' WHERE id = 15;";
        
      //die($query);
        
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
