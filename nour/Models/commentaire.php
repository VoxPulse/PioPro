<?php
class commentaire
{
    private int $id_comment	;
    private string $contenu	;
    private string $date_crea;
    private int $id_user;
    private int $id_publication;	
    public function __construct(string $contenu,int $id_user, int $id_publication)
    {
        $this->contenu=$contenu;
        $this->id_user=$id_user;
        $this->id_publication=$id_publication;
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

    /**
     * Get the value of id_publication
     */ 
    public function getId_publication()
    {
        return $this->id_publication;
    }

    /**
     * Set the value of id_publication
     *
     * @return  self
     */ 
    public function setId_publication($id_publication)
    {
        $this->id_publication = $id_publication;

        return $this;
    }
}
?>