<?php
class Offre_emploi
{
    private int $id;
    private string $titre_p;
    private string $description;
    private string $date_fin;
    private float $salaire;
    private string $categorie;

    // Setter pour l'ID
    public function setId(int $id): void {
        $this->id = $id;
    }

    // Getter pour l'ID
    public function getId(): int {
        return $this->id;
    }

    // Setter pour le titre
    public function setTitre_p(string $titre_p): void {
        $this->titre_p = $titre_p;
    }

    // Getter pour le titre
    public function getTitreP(): string {
        return $this->titre_p;
    }

    // Setter pour la description
    public function setDescription(string $description): void {
        $this->description = $description;
    }

    // Getter pour la description
    public function getDescription(): string {
        return $this->description;
    }

    // Setter pour la date_fin
    public function setdate_fin(string $date_fin): void {
        $this->date_fin = $date_fin;
    }

    // Getter pour la date_fin
    public function getdate_fin(): string {
        return $this->date_fin;
    }

    // Setter pour le salaire
    public function setSalaire(float $salaire): void {
        $this->salaire = $salaire;
    }

    // Getter pour le salaire
    public function getSalaire(): float {
        return $this->salaire;
    }

    // Setter pour la catégorie
    public function setCategorie(string $categorie): void {
        $this->categorie = $categorie;
    }

    // Getter pour la catégorie
    public function getCategorie(): string {
        return $this->categorie;
    }
}
?>
