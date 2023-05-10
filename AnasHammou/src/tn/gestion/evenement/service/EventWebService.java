package tn.gestion.evenement.service;

import com.codename1.io.ConnectionRequest;
import com.codename1.io.NetworkManager;
import java.util.ArrayList;
import java.util.List;
import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;
import tn.gestion.evenement.enitite.Categorie;
import tn.gestion.evenement.enitite.Evenement;

public class EventWebService {

    private static final String BASE_URL = "http://127.0.0.1:8000/api";
    private ConnectionRequest connection;

    public EventWebService() {
        connection = new ConnectionRequest();
        connection.setInsecure(true);
    }

    public List<Evenement> getAllEvents() {
        String url = BASE_URL + "/evenement";
        this.connection.setUrl(url);
        this.connection.setHttpMethod("GET");
        List<Evenement> events = new ArrayList<>();
        this.connection.addResponseListener(e -> {
            if (this.connection.getResponseCode() == 200) {
                String response = new String(this.connection.getResponseData());
                try {
                    JSONArray jsonEvents = new JSONArray(response);
                    for (int i = 0; i < jsonEvents.length(); i++) {
                        JSONObject jsonEvent = jsonEvents.getJSONObject(i);
                        Evenement event = new Evenement(
                                jsonEvent.getInt("id"),
                                jsonEvent.getString("nom"),
                                jsonEvent.getString("descriptif"),
                                jsonEvent.getString("image"),
                                jsonEvent.getInt("likes"),
                                jsonEvent.getString("date_debut"),
                                jsonEvent.getString("date_fin"),
                                jsonEvent.getInt("nb_participants"),
                                new Categorie(jsonEvent.getInt("id_categorie"))
                        );
                        events.add(event);
                    }
                } catch (JSONException ex) {
                    ex.printStackTrace();
                }
            } else {
                // handle error
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(this.connection);
        return events;
    }

    public void newEvent(Evenement e) {
        connection = new ConnectionRequest();
        connection.setInsecure(true);
        this.connection.setUrl(BASE_URL + "/evenement/add");
        this.connection.setHttpMethod("POST");
        
        connection.addArgument("nom", e.getNom());
        connection.addArgument("descriptif", e.getDescriptif());
        connection.addArgument("image", e.getImage());
        connection.addArgument("likes", e.getLikes()+"");
        connection.addArgument("date_debut", e.getDate_debut());
        connection.addArgument("date_fin", e.getDate_fin());
        connection.addArgument("nb_participants", e.getNbParticipants()+"");
        connection.addArgument("id_categorie",e.getIdCategorie().getIdCategorie()+"");

        NetworkManager.getInstance().addToQueue(connection);
    }
    
    public void editEvent(Evenement e) {
        connection = new ConnectionRequest();
        connection.setInsecure(true);
        this.connection.setUrl(BASE_URL + "/evenement/"+e.getIdEvenement());
        this.connection.setHttpMethod("PUT");
        
        connection.addArgument("nom", e.getNom());
        connection.addArgument("descriptif", e.getDescriptif());
        connection.addArgument("image", e.getImage());
        connection.addArgument("likes", e.getLikes()+"");
        connection.addArgument("date_debut", e.getDate_debut());
        connection.addArgument("date_fin", e.getDate_fin());
        connection.addArgument("nb_participants", e.getNbParticipants()+"");
        connection.addArgument("id_categorie", e.getIdCategorie().getIdCategorie()+"");
        
        System.out.println(BASE_URL + "/evenement/"+e.getIdEvenement());
        NetworkManager.getInstance().addToQueue(connection);
    }
    
    public void delEvent(Evenement e) {
        connection = new ConnectionRequest();
        connection.setInsecure(true);
        this.connection.setUrl(BASE_URL + "/evenement/"+e.getIdEvenement());
        this.connection.setHttpMethod("DELETE");
        NetworkManager.getInstance().addToQueue(connection);
    }

}
