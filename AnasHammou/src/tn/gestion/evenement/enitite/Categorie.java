package tn.gestion.evenement.enitite;

public class Categorie {
    private int idCategorie;
    private String nom;
    private String descriptif;

    public Categorie() {
    }

    public Categorie(int idCategorie, String nom, String descriptif) {
        this.idCategorie = idCategorie;
        this.nom = nom;
        this.descriptif = descriptif;
    }

    public Categorie(String nom, String descriptif) {
        this.nom = nom;
        this.descriptif = descriptif;
    }

    public Categorie(int idCategorie) {
        this.idCategorie = idCategorie;
    }

    public int getIdCategorie() {
        return idCategorie;
    }

    public void setIdCategorie(int idCategorie) {
        this.idCategorie = idCategorie;
    }

    public String getNom() {
        return nom;
    }

    public void setNom(String nom) {
        this.nom = nom;
    }

    public String getDescriptif() {
        return descriptif;
    }

    public void setDescriptif(String descriptif) {
        this.descriptif = descriptif;
    }

    @Override
    public String toString() {
        return "Categorie{" + "idCategorie=" + idCategorie + ", nom=" + nom + ", descriptif=" + descriptif + '}';
    }
    
    
}
