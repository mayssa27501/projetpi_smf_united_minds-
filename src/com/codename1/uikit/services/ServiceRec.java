/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.codename1.uikit.services;

import com.codename1.io.CharArrayReader;
import com.codename1.io.ConnectionRequest;
import com.codename1.io.JSONParser;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;
import com.codename1.ui.Dialog;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.util.Resources;

import com.codename1.uikit.entities.CategorieArticle;
import com.codename1.uikit.utils.Statics;
import com.codename1.util.BigInteger;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Map;

/**
 *
 * @author asus
 */
public class ServiceRec {

    public static ServiceRec instance = null;
    public static boolean resultOk = true;
    public boolean resultOKk;
    boolean ok = false;
    String json;

    //initilisation connection request 
    private ConnectionRequest req;
    public ArrayList<CategorieArticle> CategorieArticle;

    public static ServiceRec getInstance() {
        if (instance == null) {
            instance = new ServiceRec();
        }
        return instance;

    }

    public ServiceRec() {
        req = new ConnectionRequest();
    }

    public void AjouterCategorieArticle(CategorieArticle CategorieArticle) {
        String url = Statics.BASE_URL + "jsonCategorieArticle/CategorieArticle/ajout?nom_cat_artic=" + CategorieArticle.getNom_cat_artic() + "&date_ajout_artic=" + CategorieArticle.getDate_ajout_artic() + "&descriptif_artic=" + CategorieArticle.getDescriptif_artic();
        req.setUrl(url);
        req.addResponseListener(a -> {
            String str = new String(req.getResponseData());
            System.err.println("data==" + str);
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
    }

    public ArrayList<CategorieArticle> affichageCategorieArticles() {
        ArrayList<CategorieArticle> result = new ArrayList<>();

        String url = Statics.BASE_URL + "jsonCategorieArticle/CategorieArticle/liste";
        req.setUrl(url);

        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                JSONParser jsonp = new JSONParser();

                try {
                    Map<String, Object> mapCommentaires = jsonp.parseJSON(new CharArrayReader(new String(req.getResponseData()).toCharArray()));

                    List<Map<String, Object>> listOfMaps = (List<Map<String, Object>>) mapCommentaires.get("root");

                    for (Map<String, Object> obj : listOfMaps) {
                        CategorieArticle re = new CategorieArticle();

                        float id = Float.parseFloat(obj.get("id").toString());
                        String nom_cat_artic = obj.get("nom_cat_artic").toString();
                        Date DateR = new SimpleDateFormat("yyyy-MM-dd").parse(obj.get("date_ajout_artic").toString());
                        String descriptif_artic = obj.get("descriptif_artic").toString();
                        // Parsing idRecepteur

                        re.setId((int) id);
                        re.setNom_cat_artic(nom_cat_artic);
                        re.setDate_ajout_artic(DateR);
                        re.setDescriptif_artic(descriptif_artic);

                        // Insert data into ArrayList result
                        result.add(re);
                    }
                } catch (Exception ex) {
                    ex.printStackTrace();
                }
            }
        });

        NetworkManager.getInstance().addToQueueAndWait(req);
        return result;
    }

    public boolean Delete(CategorieArticle t) {
        String url = Statics.BASE_URL + "jsonCategorieArticle/CategorieArticle/supprimer/" + t.getId();
        req.setUrl(url);
        req.addResponseListener(new ActionListener<NetworkEvent>() {
        
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOKk = req.getResponseCode() == 200; //Code HTTP 200 OK
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOKk;
    }

    //Delete 
    public boolean deleteCategorieArticle(int id) {
        String url = Statics.BASE_URL + "jsonCategorieArticle/CategorieArticle/supprimer/" + id;

        req.setUrl(url);

        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {

                req.removeResponseCodeListener(this);
            }
        });

        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOk;
    }

    //Update 
    public boolean modifierCategorieArticle(CategorieArticle CategorieArticle) {
        String url = Statics.BASE_URL + "jsonCategorieArticle/CategorieArticle/modif/" + CategorieArticle.getId() + "?nom_cat_artic=" + CategorieArticle.getNom_cat_artic() + "&date_ajout_artic=" + CategorieArticle.getDate_ajout_artic() + "&descriptif_artic=" + CategorieArticle.getDescriptif_artic();
        req.setUrl(url);

        req.addResponseListener(new ActionListener<NetworkEvent>() {
          
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOk = req.getResponseCode() == 200;  // Code response Http 200 ok
                req.removeResponseListener(this);
                String str = new String(req.getResponseData());
                System.err.println("data2==" + url); 
              System.err.println("data2==" + str); 
            }
            
        });

        NetworkManager.getInstance().addToQueueAndWait(req);//execution ta3 request sinon yet3ada chy dima nal9awha
        return resultOk;

    }

    public ArrayList<CategorieArticle> affichageCategorieArticlespargenre(String id) {
        ArrayList<CategorieArticle> result = new ArrayList<>();

        String url = Statics.BASE_URL + "jsonCategorieArticle/CategorieArticle/liste/" + id;
        req.setUrl(url);

        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                JSONParser jsonp;
                jsonp = new JSONParser();

                try {
                    Map<String, Object> mapCommentaires = jsonp.parseJSON(new CharArrayReader(new String(req.getResponseData()).toCharArray()));

                    List<Map<String, Object>> listOfMaps = (List<Map<String, Object>>) mapCommentaires.get("root");

                    for (Map<String, Object> obj : listOfMaps) {
                        CategorieArticle re = new CategorieArticle();

                        float id = Float.parseFloat(obj.get("id").toString());
                        String nom_cat_artic = obj.get("nomCatArtic").toString();
                        Date DateR = new SimpleDateFormat("yyyy-MM-dd").parse(obj.get("dateAjoutArtic").toString());
                        String descriptif_artic = obj.get("descriptifArtic").toString();
                        // Parsing idRecepteur

                        re.setId((int) id);
                        re.setNom_cat_artic(nom_cat_artic);
                        re.setDate_ajout_artic(DateR);
                        re.setDescriptif_artic(descriptif_artic);
                        result.add(re);
                    }

                } catch (Exception ex) {

                    ex.printStackTrace();
                }

            }
        });

        NetworkManager.getInstance().addToQueueAndWait(req);//execution ta3 request sinon yet3ada chy dima nal9awha

        return result;

    }

}
