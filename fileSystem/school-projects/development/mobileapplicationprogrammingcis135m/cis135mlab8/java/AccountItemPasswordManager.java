package com.example.marc.passwordmanager;

/**
 * Created by Marc on 2/20/2015.
 */
public class AccountItem {
    private String mName;
    private String mPassword;

    public AccountItem(String name, String password) {
        mName = name;
        mPassword = password;
    }

    public String getName() {
        return mName;
    }

    public String getPassword() {
        return mPassword;
    }

    public String toString() {
        return mName;
    }
}
