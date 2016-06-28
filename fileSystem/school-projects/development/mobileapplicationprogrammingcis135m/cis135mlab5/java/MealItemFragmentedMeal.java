package com.nomad_mystic_fragmentedmeals.fragmentedmeals;

/**
 * Created by Nomad_Mystic on 5/11/2015.
 */
public class MealItem {
    private String mName;
    private int mPicture;

    MealItem(String name, int picture) {
        mName = name;
        mPicture = picture;
    }

    public String getName() {
        return mName;
    }
    public int getPicture() {
        return mPicture;
    }
    public String toString() {
        return mName;
    }
}
