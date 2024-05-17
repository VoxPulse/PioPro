<?php
class Publication
{
    private int $id;
    private string $titre;
    private string $contenu;
    private int $nb_like;
    private int $nb_comment;
    private string $date_crea;
    private int $id_user;
    
    public function __construct(string $titre,string $contenu,int $id_user)
    {
        $this->titre=$titre;
        $this->contenu=$contenu;
        $this->nb_like=0;
        $this->nb_comment=0;
        $this->id_user=$id_user;
    }
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of contenu
     */ 
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set the value of contenu
     *
     * @return  self
     */ 
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get the value of nb_like
     */ 
    public function getNb_like()
    {
        return $this->nb_like;
    }

    /**
     * Set the value of nb_like
     *
     * @return  self
     */ 
    public function setNb_like($nb_like)
    {
        $this->nb_like = $nb_like;

        return $this;
    }

    /**
     * Get the value of nb_comment
     */ 
    public function getNb_comment()
    {
        return $this->nb_comment;
    }

    /**
     * Set the value of nb_comment
     *
     * @return  self
     */ 
    public function setNb_comment($nb_comment)
    {
        $this->nb_comment = $nb_comment;

        return $this;
    }

    /**
     * Get the value of date_crea
     */ 
    public function getDate_crea()
    {
        return $this->date_crea;
    }

    /**
     * Set the value of date_crea
     *
     * @return  self
     */ 
    public function setDate_crea($date_crea)
    {
        $this->date_crea = $date_crea;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
        return $this;
    }
}
?>