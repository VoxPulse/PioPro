<?php
class Entretiens
{
    private int $id;
    private string $date;
    private string $heure;
    private string $statut;
    private string $url;
    private int $id_user;
<<<<<<< HEAD
<<<<<<< HEAD
    private int $id_offre;
=======
<<<<<<< HEAD
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
    private int $offre_emploi;
    public static function getoffreemploifromentretiens()
    {
        try {
            $pdo = config::getConnexion();
            $sql = "SELECT offre_emploi.id_offre
                FROM offre_emploi
                JOIN entretiens ON offre_emploi.id_offre = entretiens.id_offre";

            $query = $pdo->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_CLASS, 'entretiens');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /*public function __construct($id, $date, $heure, $statut, $url, $id_user, $offre_emploi)
    {

        $this->id = $id;
        $this->date = $date;
        $this->heure = $heure;
        $this->statut = $statut;
        $this->url = $url;
        $this->id_user = $id_user;
        $this->offre_emploi = $offre_emploi;
    }*/
=======
    private int $id_off;
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
<<<<<<< HEAD
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4

    // Setter pour l'ID
    public function setId(int $id): void {
        $this->id = $id;
    }

    // Getter pour l'ID
    public function getId(): int {
        return $this->id;
    }

    // Setter pour le titre
    public function setdate(string $date): void {
        $this->date = $date;
    }

    // Getter pour le titre
    public function getdate(): string {
        return $this->date;
    }

    // Setter pour la heure
    public function setheure(string $heure): void {
        $this->heure = $heure;
    }

    // Getter pour la heure
    public function getheure(): string {
        return $this->heure;
    }

    // Setter pour la statut
    public function setstatut(string $statut): void {
        $this->statut = $statut;
    }

    // Getter pour la statut
    public function getstatut(): string {
        return $this->statut;
    }

    // Setter pour le url
    public function seturl(string $url): void {
        $this->url = $url;
    }

    // Getter pour le url
    public function geturl(): string {
        return $this->url;
    }

    // Setter pour la catégorie
<<<<<<< HEAD
<<<<<<< HEAD
    public function setid_user(string $id_user): void {
=======
    public function setid_user(int $id_user): void {
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
    public function setid_user(int $id_user): void {
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
        $this->id_user = $id_user;
    }

    // Getter pour la catégorie
    public function getid_user(): int {
        return $this->id_user;
    }
<<<<<<< HEAD
    // Setter pour la catégorie
<<<<<<< HEAD
    public function setid_offre(string $id_offre): void {
        $this->id_offre = $id_offre;
    }

    // Getter pour la catégorie
    public function getid_offre(): int {
        return $this->id_offre;
    }
=======
<<<<<<< HEAD
    // Setter pour la catégorie
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
    public function setoffre_emploi(int $offre_emploi): void {
        $this->offre_emploi = $offre_emploi;
    }

    // Getter pour la catégorie
    public function getoffre_emploi(): int {
        return $this->offre_emploi;
    }
    
=======
    public function setid_off(int $id_off): void {
        $this->id_off = $id_off;
    }

    // Getter pour la catégorie
    public function getid_off(): int {
        return $this->id_off;
    }
>>>>>>> 41603468a7b9e0a441fe033d2ce13621c1f62433
<<<<<<< HEAD
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
=======
>>>>>>> e72f15fd92f545167b15a4b29c6ff0b2ee793eb4
}
?>
