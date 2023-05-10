package tn.gestion.evenement.forms;

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

public class newEventsForm extends BaseForm {
        CategorieWebService serviceCat = new CategorieWebService();

    public newEventsForm() {
        this.init(Resources.getGlobalResources());

        TextField nomField = new TextField("", "Nom");
        TextField descriptifField = new TextField("", "Descriptif");
        TextField imageField = new TextField("", "Image URL");
        TextField likesField = new TextField("", "Likes");
        TextField nbParticipantsField = new TextField("", "Nombre de participants");

        PickerComponent datePicker = PickerComponent.createDate(new Date());
        PickerComponent datePicker2 = PickerComponent.createDate(new Date());

        ComboBox<Categorie> categorieField = new ComboBox<>();
        List<Categorie> categories = serviceCat.getAllCategorie();
        for (Categorie categorie : categories) {
            categorieField.addItem(categorie);
        }

        this.add(nomField)
                .add(descriptifField)
                .add(imageField)
                .add(likesField)
                .add(datePicker)
                .add(datePicker2)
                .add(nbParticipantsField)
                .add(categorieField);
        Button submitButton = new Button("Submit");

        submitButton.addActionListener(s
                -> {
            String nom = nomField.getText();
            String descriptif = descriptifField.getText();
            String image = imageField.getText();
            int likes = Integer.parseInt(likesField.getText());
            String dateDebut = datePicker.getPicker().getDate().toString();
            String dateFin = datePicker2.getPicker().getDate().toString();
            int nbParticipants = Integer.parseInt(nbParticipantsField.getText());
            Categorie selectedCategorie = categorieField.getSelectedItem();

            Evenement newEvent = new Evenement();
            newEvent.setNom(nom);
            newEvent.setDescriptif(descriptif);
            newEvent.setImage(image);
            newEvent.setLikes(likes);
            newEvent.setDate_debut(dateDebut);
            newEvent.setDate_fin(dateFin);
            newEvent.setNbParticipants(nbParticipants);
            newEvent.setIdCategorie(new Categorie(selectedCategorie.getIdCategorie()));
            EventWebService service = new EventWebService();
            service.newEvent(newEvent);
        }
        );
        this.add(submitButton);
        Button goToFormButton = new Button("Go Back");
        goToFormButton.addActionListener(e -> {
            getEventsForm myForm = new getEventsForm();
            myForm.show();
        });
        this.add(goToFormButton);
    }

}
