package com.example.student.cryptotest;

import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;

import java.io.UnsupportedEncodingException;
import java.security.GeneralSecurityException;


public class MainActivity extends ActionBarActivity {

    public static final String LOG_TAG = "MainActivity";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        try {
            String salt = Crypto.saltString(Crypto.generateSalt());
            String password = "Swordfish";
            String plainText = "Many are called but few are chosen.";
            Crypto.SecretKeys keys = Crypto.generateKeyFromPassword(password, salt);
            Crypto.CipherTextIvMac cipherText = Crypto.encrypt(plainText, keys);
            String cipherString = cipherText.toString();

            Log.d(LOG_TAG, "Salt: " + salt);
            Log.d(LOG_TAG, "Keys: " + keys.toString());
            Log.d(LOG_TAG, "CipherText: " + cipherString);

            //-----------------------------------------------------
            // Get to use salt, password, cipherString nut nothing else
            Crypto.SecretKeys decryptKeys = Crypto.generateKeyFromPassword(password, salt);
            Crypto.CipherTextIvMac decryptCipherText = new Crypto.CipherTextIvMac(cipherString);
            String decryptPlainText = Crypto.decryptString(decryptCipherText, decryptKeys);
            Log.d(LOG_TAG, decryptPlainText);

        } catch (GeneralSecurityException e) {
            e.printStackTrace();
        } catch (UnsupportedEncodingException e) {
            e.printStackTrace();
        }
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
}
