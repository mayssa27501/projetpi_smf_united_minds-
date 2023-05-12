/*
 * Copyright (c) 2016, Codename One
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated 
 * documentation files (the "Software"), to deal in the Software without restriction, including without limitation 
 * the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, 
 * and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions 
 * of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 
 * PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT 
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF 
 * CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE 
 * OR THE USE OR OTHER DEALINGS IN THE SOFTWARE. 
 */
package com.codename1.uikit.pheonixui;

import com.codename1.capture.Capture;
import com.codename1.components.ImageViewer;
import com.codename1.io.ConnectionRequest;
import com.codename1.io.File;
import com.codename1.io.JSONParser;
import com.codename1.io.Log;
import com.codename1.io.NetworkManager;
import com.codename1.ui.Button;
import com.codename1.ui.ComboBox;
import com.codename1.ui.Display;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.spinner.Picker;
import com.codename1.ui.util.Resources;
import com.codename1.uikit.entities.CategorieArticle;
import com.codename1.uikit.services.ServiceRec;
import java.io.ByteArrayInputStream;

import java.io.IOException;
import java.io.InputStreamReader;
import java.util.HashMap;
import java.util.Map;

/**
 * The newsfeed form
 *
 * @author Shai Almog
 */
public class updatec extends BaseForm {

    EncodedImage enim;
    Image img;
    ImageViewer imv;

    String pp = "";
    Resources r;
   int selectedidUser;
   
    public updatec(Resources res, CategorieArticle t) {

        super("CategorieArticle", BoxLayout.y());
        installSidemenu(res);
        getToolbar().addMaterialCommandToRightBar("", FontImage.MATERIAL_ARROW_LEFT, new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evvt) {
                new NewsfeedForm(res).showBack();
            }
        });

        r = res;
        try {
            enim = EncodedImage.create("/giphy.gif");
            TextField nom_cat_artic = new TextField("", "nom_cat_artic", 9, TextField.ANY);
            TextField descriptif_artic = new TextField("", "descriptif_artic", 9, TextField.ANY);
            Picker DateR = new Picker();
            //-----------------------------------------------------------------------

           

            //------------------------------------------------------------------------
            DateR.setType(Display.PICKER_TYPE_DATE);

            //------------------------------------------------------------------------
            
            add(nom_cat_artic);
            add(DateR);    
            add(descriptif_artic);


            nom_cat_artic.setText(t.getNom_cat_artic());
            descriptif_artic.setText(t.getDescriptif_artic());
            DateR.setDate(t.getDate_ajout_artic());
            Button valide = new Button("Valide");
            valide.addActionListener(new ActionListener() {
                @Override
                public void actionPerformed(ActionEvent et) {

                    t.setNom_cat_artic(nom_cat_artic.getText());
                    t.setDescriptif_artic(descriptif_artic.getText() );
                    t.setDate_ajout_artic(DateR.getDate());
                    
                    ServiceRec.getInstance().modifierCategorieArticle(t);
                    System.out.println(t);
                    new NewsfeedForm(r).showBack();

                }
            });
            add(valide);

        } catch (IOException ex) {

        }

        Button back = new Button("Back");

        back.requestFocus();
        back.addActionListener(e -> new NewsfeedForm(res).show());

    }
}
