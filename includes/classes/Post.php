<?php

class Post
{
    private $id;
    private $title;
    private $content;
    private $nom;
    private $password;
    private $email;
    
    public function getID(): int
    {
        return $this->id;
    }

    public function setID(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }
    public function getnom(): string
    {
        return $this->nom;
    }

    public function setnom(string $nom): self
    {
        $this->nom = $nom;
        return $this;
    }
    
    public function getemail(): string
    {
        return $this->email;
    }

    public function setemail(string $email): self
    {
        $this->email = $email;
        return $this;
    }  
    public function getpassword(): string
    {
        return $this->password;
    }

    public function setpassword(string $password): self
    {
        $this->password = $password;
        return $this;
    }
}
