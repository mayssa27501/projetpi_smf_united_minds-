package tn.gestion.evenement.enitite;


public class Evenement {
    
    private int idEvenement;
    private String nom;
    private String descriptif;
    private String image;
    private int likes;
    private String date_debut;
    private String date_fin;
    private int nbParticipants;
    private Categorie idCategorie;

    public Evenement() {
    }

    public Evenement(int idEvenement, String nom, String descriptif, String image, int likes, String date_debut, String date_fin, int nbParticipants, Categorie idCategorie) {
        this.idEvenement = idEvenement;
        this.nom = nom;
        this.descriptif = descriptif;
        this.image = image;
        this.likes = likes;
        this.date_debut = date_debut;
        this.date_fin = date_fin;
        this.nbParticipants = nbParticipants;
        this.idCategorie = idCategorie;
    }

    public Evenement(String nom, String descriptif, String image, int likes, String date_debut, String date_fin, int nbParticipants, Categorie idCategorie) {
        this.nom = nom;
        this.descriptif = descriptif;
        this.image = image;
        this.likes = likes;
        this.date_debut = date_debut;
        this.date_fin = date_fin;
        this.nbParticipants = nbParticipants;
        this.idCategorie = idCategorie;
    }

    public int getIdEvenement() {
        return idEvenement;
    }

    public void setIdEvenement(int idEvenement) {
        this.idEvenement = idEvenement;
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

    public String getImage() {
        return image;
    }

    public void setImage(String image) {
        this.image = image;
    }

    public int getLikes() {
        return likes;
    }

    public void setLikes(int likes) {
        this.likes = likes;
    }

    public String getDate_debut() {
        return date_debut;
    }

    public void setDate_debut(String date_debut) {
        this.date_debut = date_debut;
    }

    public String getDate_fin() {
        return date_fin;
    }

    public void setDate_fin(String date_fin) {
        this.date_fin = date_fin;
    }

    public int getNbParticipants() {
        return nbParticipants;
    }

    public void setNbParticipants(int nbParticipants) {
        this.nbParticipants = nbParticipants;
    }

    public Categorie getIdCategorie() {
        return idCategorie;
    }

    public void setIdCategorie(Categorie idCategorie) {
        this.idCategorie = idCategorie;
    }

    @Override
    public String toString() {
        return "Evenement{" + "idEvenement=" + idEvenement + ", nom=" + nom + ", descriptif=" + descriptif + ", image=" + image + ", likes=" + likes + ", date_debut=" + date_debut + ", date_fin=" + date_fin + ", nbParticipants=" + nbParticipants + ", idCategorie=" + idCategorie + '}';
    }
    
    
}
