<?php
class User{
    private int $id,$type_pack;
    private string $nom,$prenom,$cin,$tel,$mail,$role,$img,$mdp,$statut,$etab;
    private DateTime $date_n,$date_crea,$dernier_login;
    public function __construct(int $id, int $type_pack,string $nom, string $prenom, string $cin,string $tel,string $mail,string $role,string $img,string $mdp,string $statut,string $etab,DateTime  $date_n, DateTime $date_crea,DateTime $dernier_login )
    {
        //int 
        $this->id=$id;
        $this->type_pack=$type_pack;
        //Varchar
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->cin=$cin;
        $this->tel=$tel;
        $this->mail=$mail;
        $this->role=$role;
        $this->img=$img;
        $this->mdp=$mdp;
        $this->statut=$statut;
        $this->etab=$etab;
        // DateTime
        $this->date_n=$date_n;
        $this->date_crea=$date_crea;
        $this->dernier_login=$dernier_login;
    }
}
?>