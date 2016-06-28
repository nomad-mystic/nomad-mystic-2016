package com.nomad_mystic_fragmentedmeals.firedup;

import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;


public class MainActivity extends ActionBarActivity implements DatabaseFetcher.OnDatabaseEvent {

    DatabaseFetcher mFetcher;
//    public static String


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        mFetcher = new DatabaseFetcher();
    }

    @Override
    public void onStart() {
        super.onStart();
        Thread thread = new Thead(new Runnable() {
            @Override
        public void run() {
                mFetcher.connect("cisdbss.pcc.edu", "275student",  "275student", "firedUp");
            }
        });
    }
    @Override
    public void onStop() {
        super.onStop();

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
