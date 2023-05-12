/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.myapp;

import com.codename1.ui.Button;
import com.codename1.ui.Command;
import com.codename1.ui.Dialog;
import com.codename1.ui.FontImage;
import com.codename1.ui.Form;
import com.codename1.ui.TextField;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BoxLayout;
import com.codename1.ui.util.Resources;

import models.User;
import services.UserService;

/**
 *
 * @author user
 */

  public class ResetPasswordForm extends Form {
     public ResetPasswordForm(Resources res){
        setTitle("Reset password");
        setLayout(BoxLayout.y());
        TextField tfId = new TextField("", "enter your e-mail");
        
       
        Button suppCbtn = new Button("Send");
        
   suppCbtn.addActionListener((ActionListener) (ActionEvent evt) -> {
           if ((tfId.getText().length()==0 ))
               Dialog.show("Alert", "enter you email", new Command("OK"));
           else
           {
                     UserService sc = new UserService();
                     User t =new User();
                     t.setEmail(tfId.getText());
                            sc.SendReset(t);   
            }
               
               
              
                  });
                    addAll(tfId,suppCbtn);
                    getToolbar().addMaterialCommandToLeftBar("",FontImage.MATERIAL_ARROW_BACK, e -> new SignInForm(res).show());
}
    
    
}  

