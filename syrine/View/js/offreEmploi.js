function controleSaisie_offreEmploi() 
{
    var id = document.getElementById("id").value;
    var titre_p = document.getElementById("titre_p").value;
    var description = document.getElementById("description").value;
    var date_fin = document.getElementById("date_fin").value;
    var salaire = document.getElementById("salaire").value;
    var categorie = document.getElementById("categorie").value;
    if(id == "")
    {
        return false ;
    }
    else
    {
        console.log("La valeur de l'input est : " + valeur);
        return false ;
    }
}