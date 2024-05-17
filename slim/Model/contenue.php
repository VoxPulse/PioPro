<?php
require_once 'C:\wamp64\www\VoxPulse\Model\config.php';
class Contenue
{
    private string $id;
    private string $url;
    private string $type;
    private float $id_F;

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
     * Get the value of url
     */ 
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */ 
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of id_F
     */ 
    public function getId_F()
    {
        return $this->id_F;
    }

    /**
     * Set the value of id_F
     *
     * @return  self
     */ 
    public function setId_F($id_F)
    {
        $this->id_F = $id_F;

        return $this;
    }
}
?>