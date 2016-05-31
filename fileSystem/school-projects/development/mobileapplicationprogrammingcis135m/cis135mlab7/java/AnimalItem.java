package com.example.marcgoodman.cuteanimals;

/**
 * Created by Student on 5/13/2015.
 */
public class AnimalItem {
    private String mName;
    private int mId;

    AnimalItem(String name, int id) {
        mName = name;
        mId = id;
    }

    public String getName() {
        return mName;
    }

    public int getId() {
        return mId;
    }

    public String toString() {
        return mName;
    }
}
