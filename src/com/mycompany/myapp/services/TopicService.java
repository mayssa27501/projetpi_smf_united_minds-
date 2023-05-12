/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.myapp.services;

import com.codename1.io.CharArrayReader;
import com.codename1.io.ConnectionRequest;
import com.codename1.io.JSONParser;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;
import com.codename1.l10n.DateFormat;
import com.codename1.l10n.SimpleDateFormat;
import com.codename1.ui.events.ActionListener;
import com.mycompany.myapp.entities.Topic;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.Map;

/**
 *
 * @author trabe
 */
public class TopicService {
    public static TopicService instance = null;
    public boolean resultOK;
    private ConnectionRequest req;
    
    
     public TopicService() {
        req = new ConnectionRequest();
    }
     public static TopicService getInstance() {
        if (instance == null) {
            instance = new TopicService();
        }
        return instance;
    }
       public boolean addTopic(Topic o) {

        String nom = o.getDescription();
        Date date =o.getDate();
       
        
        SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
        String formattedDate = dateFormat.format(date);
        
        
         
       
      
        
       
        
String url = "http://127.0.0.1:8000/topic/json/AjoutJson/?descriptionTopic=" + nom 
           + "&dateTopic=" + formattedDate
          ;

        req.setUrl(url);
        req.setPost(false);
        
        req.addResponseListener(new ActionListener<NetworkEvent>() {
            @Override
            public void actionPerformed(NetworkEvent evt) {
                resultOK = req.getResponseCode() == 200; //Code HTTP 200 OK type ya true ya false
                req.removeResponseListener(this);
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        return resultOK;
    }
       public ArrayList<Topic> affichageCategory() {
    ArrayList<Topic> result = new ArrayList<>();
    String url = "http://127.0.0.1:8000/topic/AllTopics";
    req.setUrl(url);
    req.addResponseListener(new ActionListener<NetworkEvent>() {
        @Override
        public void actionPerformed(NetworkEvent evt) {
            JSONParser jsonp = new JSONParser();
            try {
                Map<String, Object> mapM = jsonp.parseJSON(new CharArrayReader(new String(req.getResponseData()).toCharArray()));
                List<Map<String, Object>> listOfMaps = (List<Map<String, Object>>) mapM.get("root");
                for (Map<String, Object> obj : listOfMaps) {
                    if (obj != null) {

String s = "";
if (obj != null && obj.containsKey("id")) {
    try {
        int test = (int) Float.parseFloat(obj.get("idTopic").toString());
        s = String.valueOf(test);
    } catch (NumberFormatException e) {
        
    }
} else {
}
System.out.println("JSON object contents: " + obj.toString());

                 String description = obj.get("descriptifTopic").toString();
                        String date = obj.get("dateTopic").toString();
                        
                        
                        
                        DateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
                        Date dateajout = dateFormat.parse(date);
                         
                       


                
                
    // Use the id variable here

                        Topic o = new Topic();
o.setId((int) Float.parseFloat(obj.get("idTopic").toString()));
         
                        o.setDescription(description);
                         o.setDate(dateajout);
                        
                         result.add(o);
                         
                    }
                }
            } catch (Exception ex) {
                ex.printStackTrace();
            }
        }
    });
    NetworkManager.getInstance().addToQueueAndWait(req);
    return result;
   
}
         public boolean deletecategorie(int id ) {
                System.out.println(id);
     String url = "http://127.0.0.1:8000/topic/supprimer?idTopic="+id;
ConnectionRequest request = new ConnectionRequest();
request.setUrl(url);
request.setHttpMethod("GET");
request.addResponseListener(e -> {
    String response = new String(request.getResponseData());
    // Handle the response from Symfony
});
NetworkManager.getInstance().addToQueue(request);

        return  resultOK;
    }
        public boolean modifierTopic(Topic o) {
                  Date date =o.getDate();
       
        
        SimpleDateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
        String formattedDate = dateFormat.format(date);
           
        
  String url = "http://127.0.0.1:8000/topic/modifierM?idTopic=" 
            + o.getId() 
            + "&descriptionTopic=" + o.getDescription()
            + "&dateTopic=" + formattedDate
           ;
            
     ConnectionRequest request = new ConnectionRequest();
request.setUrl(url);
request.setHttpMethod("POST");
request.addResponseListener(e -> {
    String response = new String(request.getResponseData());
    // Handle the response from Symfony
});
NetworkManager.getInstance().addToQueue(request);

        return  resultOK;
           }
    
       public ArrayList<Topic> TrierParDescrition() {
    ArrayList<Topic> result = new ArrayList<>();
    String url = "http://127.0.0.1:8000/topic/Trier";
    req.setUrl(url);
    req.addResponseListener(new ActionListener<NetworkEvent>() {
        @Override
        public void actionPerformed(NetworkEvent evt) {
            JSONParser jsonp = new JSONParser();
            try {
                Map<String, Object> mapM = jsonp.parseJSON(new CharArrayReader(new String(req.getResponseData()).toCharArray()));
                List<Map<String, Object>> listOfMaps = (List<Map<String, Object>>) mapM.get("root");
                for (Map<String, Object> obj : listOfMaps) {
                    if (obj != null) {

String s = "";
if (obj != null && obj.containsKey("id")) {
    try {
        int test = (int) Float.parseFloat(obj.get("idTopic").toString());
        s = String.valueOf(test);
    } catch (NumberFormatException e) {
        
    }
} else {
}
System.out.println("JSON object contents: " + obj.toString());

                 String description = obj.get("descriptifTopic").toString();
                        String date = obj.get("dateTopic").toString();
                        
                        
                        
                        DateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
                        Date dateajout = dateFormat.parse(date);
                         
                       


                
                
    // Use the id variable here

                        Topic o = new Topic();
o.setId((int) Float.parseFloat(obj.get("idTopic").toString()));
         
                        o.setDescription(description);
                         o.setDate(dateajout);
                        
                         result.add(o);
                         
                    }
                }
            } catch (Exception ex) {
                ex.printStackTrace();
            }
        }
    });
    NetworkManager.getInstance().addToQueueAndWait(req);
    return result;
   
}
       public ArrayList<Topic> TrierParDate() {
    ArrayList<Topic> result = new ArrayList<>();
    String url = "http://127.0.0.1:8000/topic/TrierDate";
    req.setUrl(url);
    req.addResponseListener(new ActionListener<NetworkEvent>() {
        @Override
        public void actionPerformed(NetworkEvent evt) {
            JSONParser jsonp = new JSONParser();
            try {
                Map<String, Object> mapM = jsonp.parseJSON(new CharArrayReader(new String(req.getResponseData()).toCharArray()));
                List<Map<String, Object>> listOfMaps = (List<Map<String, Object>>) mapM.get("root");
                for (Map<String, Object> obj : listOfMaps) {
                    if (obj != null) {

String s = "";
if (obj != null && obj.containsKey("id")) {
    try {
        int test = (int) Float.parseFloat(obj.get("idTopic").toString());
        s = String.valueOf(test);
    } catch (NumberFormatException e) {
        
    }
} else {
}
System.out.println("JSON object contents: " + obj.toString());

                 String description = obj.get("descriptifTopic").toString();
                        String date = obj.get("dateTopic").toString();
                        
                        
                        
                        DateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
                        Date dateajout = dateFormat.parse(date);
                         
                       


                
                
    // Use the id variable here

                        Topic o = new Topic();
o.setId((int) Float.parseFloat(obj.get("idTopic").toString()));
         
                        o.setDescription(description);
                         o.setDate(dateajout);
                        
                         result.add(o);
                         
                    }
                }
            } catch (Exception ex) {
                ex.printStackTrace();
            }
        }
    });
    NetworkManager.getInstance().addToQueueAndWait(req);
    return result;
   
}
}
 

