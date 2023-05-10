package tn.gestion.evenement.forms;

import com.codename1.l10n.ParseException;
import com.codename1.ui.Button;
import com.codename1.ui.Container;
import com.codename1.ui.Dialog;
import com.codename1.ui.TextField;
import com.codename1.ui.list.MultiList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import tn.gestion.evenement.enitite.Evenement;
import tn.gestion.evenement.service.EventWebService;
import com.codename1.ui.events.ActionEvent;
import com.codename1.ui.events.ActionListener;
import com.codename1.ui.layouts.BorderLayout;
import com.codename1.ui.list.DefaultListModel;
import com.codename1.ui.util.Resources;
import java.util.Collections;
import java.util.Comparator;

public class getEventsForm extends BaseForm {

    private MultiList eventList;
    private List<Evenement> events;
    private TextField searchField;
    
    public getEventsForm() {
        this.init(Resources.getGlobalResources());

        Button sortButton = new Button("Sort by Type");
        sortButton.addActionListener(e -> {
            Collections.sort(events, new Comparator<Evenement>() {
                @Override
                public int compare(Evenement p1, Evenement p2) {
                    return p1.getNom().compareToIgnoreCase(p2.getNom());
                }
            });
            updateList();
        });
        addComponent(BorderLayout.south(sortButton));
        
        eventList = new MultiList(new DefaultListModel<>());
        add(eventList);
        getAllEvents();
        
    }

    private void getAllEvents() {
        EventWebService service = new EventWebService();
        events = service.getAllEvents();
        DefaultListModel<Map<String, Object>> model = (DefaultListModel<Map<String, Object>>) eventList.getModel();
        model.removeAll();
        for (Evenement event : events) {
            Map<String, Object> item = new HashMap<>();
            item.put("Line1", "Nom Evenement:" + event.getNom());
            item.put("Line2", "ID Cat:" + event.getIdCategorie().getIdCategorie());
            item.put("Line3", event.getIdEvenement());
            model.addItem(item);
        }
        eventList.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent evt) {
                try {
                    Map<String, Object> selectedItem = (Map<String, Object>) eventList.getSelectedItem();
                    int eventId = (int) selectedItem.get("Line3");
                    Evenement selectedEvent = null;
                    for (Evenement event : events) {
                        if (event.getIdEvenement() == eventId) {
                            selectedEvent = event;
                            break;
                        }
                    }
                    editFormEvent myForm2 = new editFormEvent(selectedEvent);
                    myForm2.show();
                } catch (ParseException ex) {
                    System.out.println(ex);
                }
            }
        });

        searchField = new TextField("", "Enter Promotion Type");
        Button searchButton = new Button("Search");
        searchButton.addActionListener(e -> {
            try {
                String searchId = searchField.getText();
                Evenement selectedPromo = null;
                for (Evenement p : events) {
                    if (p.getNom() == null ? searchId == null : p.getNom().equals(searchId)) {
                        selectedPromo = p;
                        break;
                    }
                }
                if (selectedPromo != null) {
                    editFormEvent myForm2 = new editFormEvent(selectedPromo);
                    myForm2.show();
                } else {
                    Dialog.show("Error", "Promotion not found", "OK", null);
                }
            } catch (NumberFormatException ex) {
                Dialog.show("Error", "Invalid ID", "OK", null);
            } catch (ParseException ex) {
                System.out.println(ex);
            }
        });
        Container searchContainer = BorderLayout.west(searchField).add(BorderLayout.EAST, searchButton);
        addComponent(searchContainer);
    }

    private void updateList() {
        DefaultListModel<Map<String, Object>> model = (DefaultListModel<Map<String, Object>>) eventList.getModel();
        model.removeAll();
        for (Evenement p : events) {
            Map<String, Object> item = new HashMap<>();
            item.put("Line1", "Nom Evenement:" + p.getNom());
            item.put("Line2", "ID Cat:" + p.getIdCategorie().getIdCategorie());
            item.put("Line3", p.getIdEvenement());
            model.addItem(item);
        }
    }
}
