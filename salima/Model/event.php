<?php
class Event{
    private string $img, $statut, $lieu, $description;
    private int $id, $nb_places;
    private float $cout;
    private DateTime date;
    public function getid()
    {
        return $this->id;
    } 
    public function setid($id)
    {
        $this->id = $id;

        return $this;
    }
    
    public function getdescription()
    {
        return $this->description;
    }
    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }
    //
    public function getimg()
    {
        return $this->img;
    }
    public function setimg($img)
    {
        $this->img = $img;

        return $this;
    }
    //
    public function getcout()
    {
        return $this->cout;
    }
    public function setcout($cout)
    {
        $this->cout = $cout;

        return $this;
    }
    //
    public function getstatut()
    {
        return $this->statut;
    }
    public function setstatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }
    //
    public function getdate()
    {
        return $this->date;
    }
    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }

    //
    public function getlieu()
    {
        return $this->lieu;
    }
    public function setlieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }
    //
    public function getnb_places()
    {
        return $this->nb_places;
    }
    public function setnb_places($nb_places)
    {
        $this->nb_places = $nb_places;

        return $this;
    }
   
    public function __construct(int $id,  string $description, string $img, float $cout, string $statut, DateTime $date, string $lieu, int $nb_places)
    {
        $this->id=$id;
        $this->description=$description;
        $this->img=$img;
        $this->cout=$cout;
        $this->statut=$statut;
        $this->date=$date;
        $this->lieu=$lieu;
        $this->nb_places=$nb_places;
        
    }
}
?>