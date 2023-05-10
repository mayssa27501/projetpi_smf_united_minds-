package tn.gestion.evenement.forms;

import com.codename1.l10n.ParseException;
import com.codename1.l10n.SimpleDateFormat;
import com.codename1.ui.Button;
import com.codename1.ui.ComboBox;
import com.codename1.ui.PickerComponent;
import com.codename1.ui.TextField;
import com.codename1.ui.util.Resources;
import java.util.Date;
import java.util.List;
import tn.gestion.evenement.enitite.Categorie;
import tn.gestion.evenement.enitite.Evenement;
import tn.gestion.evenement.service.CategorieWebService;
import tn.gestion.evenement.service.EventWebService;

public class editFormEvent extends BaseForm {

        CategorieWebService serviceCat = new CategorieWebService();
        EventWebService service = new EventWebService();
    public editFormEvent(Evenement e) throws ParseException {
        this.init(Resources.getGlobalResources());
        TextField nomField = new TextField(e.getNom(), "Nom");
        TextField descriptifField = new TextField(e.getDescriptif(), "Descriptif");
        TextField imageField = new TextField(e.getImage(), "Image URL");
        TextField likesField = new TextField(e.getLikes() + "", "Likes");
        PickerComponent datePicker = PickerComponent.createDate(new Date());
        PickerComponent datePicker2 = PickerComponent.createDate(new Date());
        TextField nbParticipantsField = new TextField(e.getNbParticipants() + "", "Nombre de participants");
        SimpleDateFormat format = new SimpleDateFormat("yyyy-MM-dd");
        Date date = format.parse(e.getDate_debut());
        long timeInMillis = date.getTime();
        datePicker.getPicker().setDate(new Date(timeInMillis));
        Date date2 = format.parse(e.getDate_fin());
        long timeInMillis2 = date2.getTime();
        datePicker2.getPicker().setDate(new Date(timeInMillis2));
        ComboBox<Categorie> categorieField = new ComboBox<>();
        List<Categorie> categories = serviceCat.getAllCategorie();
        
        for (Categorie categorie : categories) {
            categorieField.addItem(categorie);
        }

        this.add(nomField);

        this.add(descriptifField);

        this.add(imageField);

        this.add(likesField);

        this.add(datePicker);

        this.add(datePicker2);

        this.add(nbParticipantsField);

        this.add(categorieField);

        Button submitButton = new Button("Submit");
        
        
        submitButton.addActionListener(s-> {
            String nom = nomField.getText();
            String descriptif = descriptifField.getText();
            String image = imageField.getText();
            int likes = Integer.parseInt(likesField.getText());
            String dateDebut = datePicker.getPicker().getDate().toString();
            String dateFin = datePicker2.getPicker().getDate().toString();
            int nbParticipants = Integer.parseInt(nbParticipantsField.getText());
            Categorie selectedCategorie = categorieField.getSelectedItem();

            Evenement newEvent = new Evenement();
            newEvent.setIdEvenement(e.getIdEvenement());
            newEvent.setNom(nom);
            newEvent.setDescriptif(descriptif);
            newEvent.setImage(image);
            newEvent.setLikes(likes);
            newEvent.setDate_debut(dateDebut);
            newEvent.setDate_fin(dateFin);
            newEvent.setNbParticipants(nbParticipants);
            newEvent.setIdCategorie(new Categorie(selectedCategorie.getIdCategorie()));
            service.editEvent(newEvent);
        }
        );
        Button goToFormButton = new Button("Go back");
        goToFormButton.addActionListener(ee -> {
            getEventsForm myForm = new getEventsForm();
            myForm.show();
        });
        Button deleteButton = new Button("Delete");
        deleteButton.addActionListener(cc -> {
            getEventsForm myForm = new getEventsForm();
            service.delEvent(e);
            myForm.show();
        });
        this.add(deleteButton);
        this.add(goToFormButton);
        this.add(submitButton);
    }

}
