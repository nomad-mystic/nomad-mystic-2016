package com.example.student.firedup;

import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.Adapter;
import android.widget.ArrayAdapter;
import android.widget.GridView;

import java.util.ArrayList;


public class MainActivity extends ActionBarActivity implements DatabaseFetcher.OnDatabaseEventListener {
    DatabaseFetcher mFetcher;
    public static final String LOG_TAG = "MainActivity";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        mFetcher = new DatabaseFetcher();
        mFectcher
    }

    @Override
    public void onStart() {
        super.onStart();
        Thread thread = new Thread(new Runnable() {
            @Override
            public void run() {
                mFetcher.connect("cisdbss.pcc.edu", "275student", "275student", "FiredUp");
            }
        });
        thread.start();
    }

    @Override
    public void onStop() {
        super.onStop();
        mFetcher.close();
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

    @Override
    public void onConnect() {
        Log.d(LOG_TAG, "Database is connected!");
        mFetcher.fetchTableList();
    }

    @Override
    public void onTable() {

    }

    @Override
    public void onTableList(final ArrayList<String> tableNames) {
       /* int i;

        for(i = 0; i < tableNames.size(); i++) {
            Log.d(LOG_TAG, "Names: " + tableNames.get(i));
        }*/
        runOnUiThread(new Runnable() {
            @Override
            public void run() {
                ArrayAdapter<String> adapter = new ArrayAdapter<String>(MainActivity.this,
                        android.R.layout.simple_list_item_1,
                        android.R.id.text1,
                        tableNames
                );
                GridView grid = (GridView) findViewById(R.id.table_grid);
                grid.setAdapter(adapter);
                grid.OnItemClick(AdapterView<?> parent, View view, int position,long id) {
                    mFetcher.fetchTableData(adapter.getItem(position));
                }
            }
        });

    }
}
