<?php

class PostTable
{
    protected $table = 'posts';
    protected $inscription = 'inscription';
    private $db;

    public function __construct()
    {
        global $db;
        $this->db = $db;
    }

    public function get(int $id): Post
    {
        $sth = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $sth->bindParam(':id', $id);
        
        $result = $sth->execute();

        $data = $sth->fetch();

        $post = new Post();
        $post->setTitle($data['title']);
        $post->setContent($data['content']);
        $post->setId($data['id']);

        return $post;
    }
    
    public function all(): array
    {
        $sth = $this->db->query("SELECT * FROM {$this->table}");
        return $sth->fetchAll();
    }

    public function create(Post $post): void
    {
        $sth = $this->db->prepare("INSERT INTO {$this->table} (title, content) VALUES (:title, :content)");
        $title = $post->getTitle() ;
        $content = $post->getContent() ; 
        $sth->bindParam(':title',$title);
        $sth->bindParam(':content',$content);
        $result = $sth->execute();

        if (!$result) {
            throw new Exception("Error during creation with the table {$this->table}");
        }
    }

    public function delete(int $id): void
    {
        $sth = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id "); 
        $sth->bindParam(':id',$id);
        $result = $sth->execute();
    }

    public function update(Post $post): void
    {
        $sth = $this->db->prepare("UPDATE {$this->table} SET title = :title , content = :content WHERE id = :id");
        $sth->bindParam(':title', $post->getTitle());
        $sth->bindParam(':content', $post->getContent());
        $sth->bindParam(':id', $post->getId());
        $result = $sth->execute();
    }

    public function inscription(Post $post) : void
    {
        $sth = $this->db->prepare("INSERT INTO {$this->inscription} ( email, password, nom) VALUES (:email, :password, :nom)");
        $sth->bindParam(':email', $post->getemail());
        $sth->bindParam(':password', $post->getpassword());
        $sth->bindParam(':nom', $post->getnom());
        $result = $sth->execute();
    }

    public function connexion(Post $post)
    {
        $sth = $this->db->prepare("SELECT * FROM {$this->inscription} WHERE email = :email AND password = :password");
        $sth->bindParam(':email', $post->getemail());
        $sth->bindParam(':password', $post->getpassword());
        $sth->execute();
        return $sth;
    }
    
}
