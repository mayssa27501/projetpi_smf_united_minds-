/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.myapp.gui;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import com.mycompany.myapp.entities.Topic;
import com.mycompany.myapp.services.TopicService;
import java.util.Date;


/**
 *
 * @author oumaima debbich
 */
public class modifierTopic extends Form {
    
      public modifierTopic(Form previous) {
        setTitle("Modifier Topic");
        setLayout(BoxLayout.y());
        
     TextField ID = new TextField("","ID");
       TextField tfNom = new TextField("","Description");
       
           
        
        Button btnValider = new Button("Modifier ");
          
         
        btnValider.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                if ((tfNom.getText().length()==0))
                    //Dialog.show("Alert", "Please fill all the fields", new Command("OK"));
                    System.out.println();
                else
                {
                   try {
                       float id = Float.parseFloat(ID.getText().toString());
                        Topic o;
                        Date dateLimite=new Date();
                        o = new Topic((int) id,tfNom.getText().toString(),dateLimite);
                        if( TopicService.getInstance().modifierTopic(o))
                        {
                           //Dialog.show("Success","Modifier avec succée Bravo oumaima",new Command("OK"));
                            System.out.println();
                        }else
                            //Dialog.show("ERROR", "Server error", new Command("OK"));
                            System.out.println();
                    } catch (NumberFormatException e) {
                        //Dialog.show("ERROR", "Status must be a number", new Command("OK"));
                        System.out.println();
                    }
                    
                }
                
                
           }
        });
        
        addAll(ID,tfNom,btnValider);
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e-> previous.showBack());
             
    }
    
    
}