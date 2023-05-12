/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.myapp.gui;

import com.codename1.components.ImageViewer;
import com.codename1.components.InfiniteProgress;
import com.codename1.components.MultiButton;
import com.codename1.components.SpanLabel;
import com.codename1.io.FileSystemStorage;
import com.codename1.io.Log;
import com.codename1.io.URL;
import com.codename1.l10n.SimpleDateFormat;
import com.codename1.ui.Button;
import com.codename1.ui.Component;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.Display;

import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Image;
import com.codename1.ui.Label;
import com.codename1.ui.TextArea;
import com.codename1.ui.TextField;
import com.codename1.ui.layouts.BorderLayout;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.layouts.GridLayout;
import com.codename1.ui.plaf.Border;
import com.codename1.ui.plaf.Style;
import com.codename1.ui.plaf.UIManager;
import com.mycompany.myapp.entities.Topic;
import com.mycompany.myapp.services.TopicService;
import java.util.ArrayList;
import java.util.List;

import com.codename1.ui.Image;
import static com.codename1.ui.TextArea.URL;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.util.Resources;



import java.io.IOException;

import java.util.Map;
import javafx.embed.swing.SwingFXUtils;

import com.sun.javafx.font.FontFactory;
import java.util.Date;






/**
 *
 * @author trabe
 */
public class TrierParDate extends Form {
    
    public TrierParDate(Form previous) {
        TopicService sp = new TopicService();
        ArrayList<Topic> topics = sp.TrierParDate();
        System.out.println(topics);// Récupération de la liste des offres
        
        setLayout(new BoxLayout(BoxLayout.Y_AXIS));
        
        

for (Topic topic : topics) {
    Container c = new Container(new BorderLayout());
    c.setUIID("Card");
    
    Label description = new Label("Description : " + topic.getDescription());
    System.out.println(description);
     Label Date = new Label("Date : " + topic.getDate());


    Container cnt = new Container(new BoxLayout(BoxLayout.Y_AXIS));
    cnt.add(description).add(Date);
    Button btnModifier = new Button();
FontImage.setMaterialIcon(btnModifier, FontImage.MATERIAL_EDIT);

btnModifier.addActionListener(e -> {
    new modifierTopic(this).show();
});

    Button deleteBtn = new Button(FontImage.createMaterial(FontImage.MATERIAL_DELETE, "DeleteButton", 6));
    deleteBtn.addActionListener(e -> {
        Dialog dig = new Dialog("Suppression");
        if (dig.show("Suppression", "Êtes-vous sûr de vouloir supprimer cet élément ?", "Annuler", "Oui")) {
            dig.dispose();
        } else {
            // Appel de la fonction supprimer() de la classe OffreService
            if(sp.deletecategorie(topic.getId()))
            { 
            // Mise à jour de l'interface utilisateur
            cnt.remove();
            cnt.revalidate();
            cnt.repaint();
            c.remove();
            
        }
            else {
                System.out.println("Erreur");
                //ListEvent listevent =new ListEvent(rs,previous);
            }
        }
        
    });

 
                     

          

          /*  pdf.addActionListener(new ActionListener() {
                @Override
                public void actionPerformed(ActionEvent m) {
                    try {
                        Document document = new Document();
                        String outputPath = "file:///C:/xampp/pdfff/offre" + offre.getId() + ".pdf";
                        PdfWriter.getInstance(document, FileSystemStorage.getInstance().openOutputStream(outputPath));
                        
                        
                        
                        
                        document.open();
                        
                        // Ajouter un cadre de design
                        Rectangle rectangle = new Rectangle(10, 10, document.getPageSize().getWidth() - 20, document.getPageSize().getHeight() - 20);
                        rectangle.setBorder(Rectangle.BOX);
                        rectangle.setBorderWidth(2);
                        rectangle.setBorderColor(BaseColor.GRAY);
                        document.add(rectangle);
                        
                        // Ajouter la date locale
                        Date currentDate = new Date();
                        SimpleDateFormat sdf = new SimpleDateFormat("dd/MM/yyyy HH:mm:ss");
                        String formattedDate = sdf.format(currentDate);
                        document.add(new Paragraph("Date : " + formattedDate));
                        
                        
                        
                        
                        
                        
//        document.add(new Paragraph("Fiche de evenement"));

// 
//        // Modifier le style du paragraphe
//        Font titleFont = FontFactory.getFont(FontFactory.HELVETICA, 40, BaseColor.BLACK); // Augmenter la taille de la police
//        
//        // ...
//
//        // Modifier le style du titre
//        Paragraph titleParagraph = new Paragraph("Fiche de evenement", titleFont); // Modifier le texte ici
//        document.add(titleParagraph);
document.add(new Paragraph("Fiche des offres"));
document.add(new Paragraph("Titre :" + offre.getTitre()));
document.add(new Paragraph("Description :" + offre.getDescription()));
document.add(new Paragraph("Experience :" + offre.getExperience()));

document.close();
Dialog.show("Enregistré", "", "", "OK");

Log.p("PDF file successfully created!");
                    } catch (Exception e) {
                        Log.e(e);
                    }           }
            });
                   // add(pdf);
*/

    c.add(BorderLayout.CENTER, cnt);
    c.add(BorderLayout.EAST, deleteBtn);
     c.add(BorderLayout.WEST, btnModifier);
    
    
    Style style = c.getStyle();
    style.setMargin(50, 30, 30, 50);
    c.setScrollableX(false);
    c.setScrollableY(true);
    c.getAllStyles().setBorder(Border.createLineBorder(2, 0x000000));

    add(c);


}





        
        getToolbar().addMaterialCommandToLeftBar("", FontImage.MATERIAL_ARROW_BACK, e -> previous.showBack());
    }
    
}

                        