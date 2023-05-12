/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.myapp.gui;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Component;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import com.mycompany.myapp.entities.Topic;
import com.mycompany.myapp.services.TopicService;

import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.plaf.Border;
import com.codename1.ui.plaf.Style;
import com.codename1.ui.plaf.UIManager;
import com.codename1.ui.util.Resources;

import static com.codename1.ui.Component.CENTER;
import com.codename1.ui.Container;
import com.codename1.ui.Display;
import com.codename1.ui.layouts.BorderLayout;

import com.twilio.Twilio;
import com.twilio.rest.api.v2010.account.Message;
import com.twilio.type.PhoneNumber;


import java.util.Date;
import javafx.scene.control.DatePicker;

/**
 *
 * @author trabe
 */
public class AddTopic extends Form {
       public static final String ACCOUNT_SID = "ACf32acbf00ec209b2293d98a1a2ebb762";
    public static final String AUTH_TOKEN = "9132c25300181e8c69961302565f3c54";
   



    AddTopic(Form previous)  {
            setTitle("Ajouter Topic");
        setLayout(BoxLayout.y());
        
       TextField tfName = new TextField("", "Description");
       
      

     
       Button btnValider = new Button("Add");

        btnValider.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                if ((tfName.getText().length()==0))
                    Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                    
                else
                {
                    try {
//LocalDate selectedDate = tDateLimite.getValue();

// Convertir la valeur en un objet Date
//Date dateLimite = Date.from(selectedDate.atStartOfDay(ZoneId.systemDefault()).toInstant());
Date datedebut=new Date();
Date datefin=new Date();

                        Topic e = new Topic(tfName.getText(),datedebut);
                        if( TopicService.getInstance().addTopic(e))
                        {
                           Dialog.show("Success","Ajouter avec succée Bravo mayssa ",new Command("OK"));
      System.out.println();


                        }else
                                                                                                          Twilio.init(ACCOUNT_SID, AUTH_TOKEN);
       Message message = Message.creator(
                new com.twilio.type.PhoneNumber("+21651847058"),
                new com.twilio.type.PhoneNumber("+12543223659"),
                "Topic :  "+tfName.getText()+"  est ajoute avec succe")
            .create();
                            System.out.println();
                         System.out.println("message envoyé avec succés");
                    } catch (NumberFormatException e) {
                         System.out.println();
                        Dialog.show("ERROR", "Status must be a number", new Command("OK"));
                    }
                    
                }
            
                
            }

           
        });

        
        addAll(tfName,btnValider);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e-> previous.showBack());


        
    }
    
}
