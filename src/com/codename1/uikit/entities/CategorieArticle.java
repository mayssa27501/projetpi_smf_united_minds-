/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.codename1.uikit.entities;

import java.util.Date;
import java.util.Objects;

/**
 *
 * @author bhk
 */
public class CategorieArticle {
    private int id  ; 
    
    private String nom_cat_artic ;
    private Date date_ajout_artic ; 
    private String descriptif_artic ; 

    public CategorieArticle() {
    }

    public CategorieArticle(int id, String nom_cat_artic, Date date_ajout_artic, String descriptif_artic) {
        this.id = id;
        this.nom_cat_artic = nom_cat_artic;
        this.date_ajout_artic = date_ajout_artic;
        this.descriptif_artic = descriptif_artic;
    }

    public CategorieArticle(String nom_cat_artic, Date date_ajout_artic, String descriptif_artic) {
        this.nom_cat_artic = nom_cat_artic;
        this.date_ajout_artic = date_ajout_artic;
        this.descriptif_artic = descriptif_artic;
    }

    public int getId() {
        return id;
    }

    public void setId(int id) {
        this.id = id;
    }

    public String getNom_cat_artic() {
        return nom_cat_artic;
    }

    public void setNom_cat_artic(String nom_cat_artic) {
        this.nom_cat_artic = nom_cat_artic;
    }

    public Date getDate_ajout_artic() {
        return date_ajout_artic;
    }

    public void setDate_ajout_artic(Date date_ajout_artic) {
        this.date_ajout_artic = date_ajout_artic;
    }

    public String getDescriptif_artic() {
        return descriptif_artic;
    }

    public void setDescriptif_artic(String descriptif_artic) {
        this.descriptif_artic = descriptif_artic;
    }

    @Override
    public int hashCode() {
        int hash = 7;
        hash = 79 * hash + this.id;
        hash = 79 * hash + Objects.hashCode(this.nom_cat_artic);
        hash = 79 * hash + Objects.hashCode(this.date_ajout_artic);
        hash = 79 * hash + Objects.hashCode(this.descriptif_artic);
        return hash;
    }

    @Override
    public boolean equals(Object obj) {
        if (this == obj) {
            return true;
        }
        if (obj == null) {
            return false;
        }
        if (getClass() != obj.getClass()) {
            return false;
        }
        final CategorieArticle other = (CategorieArticle) obj;
        if (this.id != other.id) {
            return false;
        }
        if (!Objects.equals(this.nom_cat_artic, other.nom_cat_artic)) {
            return false;
        }
        if (!Objects.equals(this.descriptif_artic, other.descriptif_artic)) {
            return false;
        }
        if (!Objects.equals(this.date_ajout_artic, other.date_ajout_artic)) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "CategorieArticle{" + "id=" + id + ", nom_cat_artic=" + nom_cat_artic + ", date_ajout_artic=" + date_ajout_artic + ", descriptif_artic=" + descriptif_artic + '}';
    }
    
    

   

   
    
}
