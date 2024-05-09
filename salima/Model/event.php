<?php
class Event{
    private $id, $nb_places;
    private $img, $titre, $statut, $lieu, $description;
    private $cout;
    private $date;

    public function getId() {
        return $this->id;
    } 

    public function setId($id) {
        $this->id = $id;
        return $this;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function getImg() {
        return $this->img;
    }

    public function setImg($img) {
        $this->img = $img;
        return $this;
    }

    public function getCout() {
        return $this->cout;
    }

    public function setCout($cout) {
        $this->cout = $cout;
        return $this;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function setStatut($statut) {
        $this->statut = $statut;
        return $this;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
        return $this;
    }

    public function getLieu() {
        return $this->lieu;
    }

    public function setLieu($lieu) {
        $this->lieu = $lieu;
        return $this;
    }

    public function getNbPlaces() {
        return $this->nb_places;
    }

    public function setNbPlaces($nb_places) {
        $this->nb_places = $nb_places;
        return $this;
    }
   
    public function getTitre() {
        return $this->titre;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
        return $this;
    }

    public function __construct($id, $titre, $description, $img, $cout, $statut, $date, $lieu, $nb_places) {
        $this->setId($id);
        $this->setTitre($titre);
        $this->setDescription($description);
        $this->setImg($img);
        $this->setCout($cout);
        $this->setStatut($statut);
        $this->setDate($date);
        $this->setLieu($lieu);
        $this->setNbPlaces($nb_places);
    }
}
?>
