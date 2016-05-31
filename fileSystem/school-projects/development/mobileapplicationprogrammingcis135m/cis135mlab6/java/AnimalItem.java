package com.example.marcgoodman.cuteanimals;

/**
 * Created by Nomad_Mystic on 5/13/2015.
 */
public class AnimalItem {

    private String mName;
    private int nId;

    AnimalItem(String name, int id) {
        mName = name;
        nId = id;
    }

    public String getName() {
        return mName;
    }

    public int getId() {
        return nId;
    }

    public String toString() {
        return mName;
    }
}
