package tn.gestion.evenement.forms;

import com.codename1.l10n.ParseException;
import com.codename1.ui.Button;
import com.codename1.ui.TextField;
import com.codename1.ui.util.Resources;
import tn.gestion.evenement.enitite.Categorie;
import tn.gestion.evenement.service.CategorieWebService;

public class editFormCategorie extends BaseForm {

    CategorieWebService service = new CategorieWebService();
    public editFormCategorie(Categorie e) throws ParseException {
        this.init(Resources.getGlobalResources());
        TextField nomField = new TextField(e.getNom(), "Nom");
        TextField descriptifField = new TextField(e.getDescriptif(), "Descriptif");
        this.add(nomField);
        this.add(descriptifField);
        Button submitButton = new Button("Submit");
        submitButton.addActionListener(s-> {
            String nom = nomField.getText();
            String descriptif = descriptifField.getText();

            Categorie categorie = new Categorie();
            categorie.setIdCategorie(e.getIdCategorie());
            categorie.setNom(nom);
            categorie.setDescriptif(descriptif);
            System.out.println(categorie);
            service.editCategorie(categorie);
            getCategorieForm myForm = new getCategorieForm();
            myForm.show();
        }
        );
        Button goToFormButton = new Button("Go back");
        goToFormButton.addActionListener(ee -> {
            getCategorieForm myForm = new getCategorieForm();
            myForm.show();
        });
        Button deleteButton = new Button("Delete");
        deleteButton.addActionListener(cc -> {
            service.delCategorie(e);
            getCategorieForm myForm = new getCategorieForm();
            myForm.show();
        });
        this.add(deleteButton);
        this.add(goToFormButton);
        this.add(submitButton);
    }

}
