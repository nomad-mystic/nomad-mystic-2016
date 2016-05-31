package com.nomad_mystic_actionbar.actionbar;

import android.app.ActionBar;
import android.content.Intent;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;


public class MainActivity extends ActionBarActivity {

    private android.support.v7.app.ActionBar m_actionBar;
    private ImageView m_imageView;
    private boolean m_planetShowing;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        m_actionBar = getSupportActionBar();
        m_imageView = (ImageView) findViewById(R.id.imageView);
        m_imageView.setImageResource(R.drawable.planet);
        m_planetShowing = true;
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
        } else if (id == R.id.action_light) {
            Intent intent = new Intent(this, Light.class);
            startActivity(intent);
        } else if (id == R.id.action_light_darkbar) {
            Intent intent = new Intent(this, LightDarkBar.class);
            startActivity(intent);
        } else if (id == R.id.action_dark) {
            Intent intent = new Intent(this, Dark.class);
            startActivity(intent);
        } else if (id == R.id.action_custom) {
            Intent intent = new Intent(this, Custom.class);
            startActivity(intent);
        } else if (id == R.id.action_showPlanet) {
            togglePlanet();
        }

        return super.onOptionsItemSelected(item);
    }
    public void toggleActionBar(View view) {
        if (m_actionBar.isShowing()) {
            m_actionBar.hide();
        } else {
            m_actionBar.show();
        }
    }
    private void togglePlanet(){
        if (m_planetShowing) {
            m_planetShowing = false;
            m_imageView.setImageResource(0);
        } else {
            m_planetShowing = true;
            m_imageView.setImageResource(R.drawable.planet);
        }
    }
}
