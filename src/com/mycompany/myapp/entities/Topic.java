/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.myapp.entities;

import java.util.Date;

/**
 *
 * @author trabe
 */
public class Topic {
    int id;
    String description;
    Date date;

    public Topic(int id, String description, Date date) {
        this.id = id;
        this.description = description;
        this.date = date;
    }

    public Topic(String description, Date date) {
        this.description = description;
        this.date = date;
    }

    public Topic() {
    }

    public int getId() {
        return id;
    }

    public String getDescription() {
        return description;
    }

    public Date getDate() {
        return date;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public void setDate(Date date) {
        this.date = date;
    }

    @Override
    public String toString() {
        return "Topic{" + "id=" + id + ", description=" + description + ", date=" + date + '}';
    }
    
    
}
