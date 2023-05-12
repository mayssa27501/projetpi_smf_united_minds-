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
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.Display;
import com.codename1.ui.EncodedImage;
import com.codename1.ui.FontImage;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.TextField;
import com.codename1.ui.URLImage;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BorderLayout;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.list.DefaultListCellRenderer;
import com.codename1.ui.list.ListCellRenderer;
import com.codename1.ui.spinner.Picker;
import com.codename1.ui.util.Resources;
import com.codename1.uikit.entities.CategorieArticle;
import com.codename1.uikit.services.ServiceRec;
import java.io.ByteArrayInputStream;

import java.io.IOException;
import java.io.InputStreamReader;
import java.util.HashMap;
import java.util.Map;
import java.util.Properties;
import javax.mail.Authenticator;
import javax.mail.Message;
import javax.mail.MessagingException;
import javax.mail.PasswordAuthentication;
import javax.mail.Session;
import javax.mail.Transport;
import javax.mail.internet.InternetAddress;
import javax.mail.internet.MimeMessage;

/**
 * The newsfeed form
 *
 * @author Shai Almog
 */
public class Ajoutrec extends BaseForm {

    EncodedImage enim;
    Image img;
    ImageViewer imv;
    String msg;
    CategorieArticle t;
    Resources r;
    String pp = "";
    CategorieArticle CategorieArticle;
    int selectedidUser;
  
    private Map<String, Integer> userArray;

    public Ajoutrec(Resources res) {

        super("Ajouter CategorieArticle", BoxLayout.y());
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

            //img=URLImage.createToStorage(enim,"http://127.0.0.1:8000/uploads/Annonces/"+evt.getPathimg(), "http://127.0.0.1:8000/uploads/Annonces/"+evt.getPathimg(),URLImage.RESIZE_SCALE).scaled(500, 350);
            TextField nom_cat_artic = new TextField("", "nom_cat_artic", 9, TextField.ANY);
            TextField descriptif_artic = new TextField("", "descriptif_artic", 9, TextField.ANY);
            Picker DateR = new Picker();
            
            //-----------------------------------------------------------------------

           

            //------------------------------------------------------------------------
            DateR.setType(Display.PICKER_TYPE_DATE);
            add(nom_cat_artic);
            add(DateR) ;
            add(descriptif_artic);
        
          

            Button valide = new Button("Valide");
            valide.addActionListener(new ActionListener() {
                @Override
                public void actionPerformed(ActionEvent et) {
                       String text = nom_cat_artic.getText();
        if (text.length() > 10) {
            Dialog.show("Input Error", "Maximum 10 characters allowed for nom partenaire.", "OK", null);
        } else {
                    String to = "emna.rahmouni@esprit.tn"; // recipient email address
                    String from = "app@noreply.com"; // sender email address
                    String host = "smtp.gmail.com"; // Gmail SMTP host

                    Properties properties = new Properties();
                    properties.setProperty("mail.smtp.host", host);
                    properties.setProperty("mail.smtp.port", "587");
                    properties.setProperty("mail.smtp.starttls.enable", "true");
                    properties.setProperty("mail.smtp.auth", "true");

                    Session session = Session.getDefaultInstance(properties, new Authenticator() {
                        protected PasswordAuthentication getPasswordAuthentication() {
                            return new PasswordAuthentication("bacha.youssra@esprit.tn", "201JFT4130"); // replace with sender's email and password
                        }
                    });

                    try {
                        MimeMessage message = new MimeMessage(session);
                        message.setFrom(new InternetAddress(from));
                        message.addRecipient(Message.RecipientType.TO, new InternetAddress(to));
                        message.setSubject("CategorieArticle detaails"); // set email subject
                        message.setText("Ur CategorieArticle is submitted with success"); // set email body

                        Transport.send(message);
                        System.out.println("Email Sent Successfully!");
                          } catch (MessagingException mex) {
                        mex.printStackTrace();
                    }
                        CategorieArticle = new CategorieArticle(nom_cat_artic.getText(), DateR.getDate(), descriptif_artic.getText());
                        ServiceRec.getInstance().AjouterCategorieArticle(CategorieArticle);

                        new NewsfeedForm(r).showBack();
                    }
                }
                }

                );
                add(valide);

            } catch (IOException ex) {

        }

            Button back = new Button("Back");

            back.requestFocus();
            back.addActionListener(e -> new NewsfeedForm(res).show());

        }
    }
