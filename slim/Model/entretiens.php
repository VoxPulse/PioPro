<?php
class Entretiens
{
    private int $id;
    private string $date;
    private string $heure;
    private string $statut;
    private string $url;
    private int $id_user;
    private int $id_offre;

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
    public function setid_user(string $id_user): void {
        $this->id_user = $id_user;
    }

    // Getter pour la catégorie
    public function getid_user(): int {
        return $this->id_user;
    }
    // Setter pour la catégorie
    public function setid_offre(string $id_offre): void {
        $this->id_offre = $id_offre;
    }

    // Getter pour la catégorie
    public function getid_offre(): int {
        return $this->id_offre;
    }
}
?>
