/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.myapp.gui;
import com.codename1.ui.Button;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.Label;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.plaf.UIManager;

/**
 *
 * @author trabe
 */
public class HomeForm extends Form {
    
      private static final char ADD_ICON_NAME = FontImage.MATERIAL_ADD_CIRCLE_OUTLINE;
    private static final char LIST_ICON_NAME = FontImage.MATERIAL_ADD_CIRCLE_OUTLINE;
    private static final String ADD_BUTTON_TEXT = "Ajouter Topic";
    private static final String LIST_BUTTON_TEXT = "Afficher Les Topics";

    public HomeForm() {

        setTitle("Home");
        setLayout(BoxLayout.y());

        add(new Label("Choose an option"));
        Button addButton = new Button("");
        addButton.setIcon(FontImage.createMaterial(ADD_ICON_NAME, UIManager.getInstance().getComponentStyle("Button")));
        addButton.setText(ADD_BUTTON_TEXT);
        addButton.addActionListener(e -> new AddTopic(this).show());
  
        //stat2Command.addActionListener(e -> new statForm(this).show());
        //sortCommand.addActionListener(e -> new sortByeType(this).show());
        Button listButton = new Button("");
        listButton.setIcon(FontImage.createMaterial(LIST_ICON_NAME, UIManager.getInstance().getComponentStyle("Button")));
        listButton.setText(LIST_BUTTON_TEXT);
        listButton.addActionListener(e -> new ListTopic(this).show());
        addAll(addButton, listButton);

    }
}
