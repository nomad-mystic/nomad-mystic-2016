package com.nomad_mystic_lab3.lab3;

import android.content.Intent;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.TextView;

import java.text.DecimalFormat;
import java.text.NumberFormat;


public class OutputActivity extends ActionBarActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_output);

        Intent intent = getIntent();

        float volts = intent.getFloatExtra(InputActivity.EXTRA_VOLTS, 1.0f);
        float ohms = intent.getFloatExtra(InputActivity.EXTRA_RESISTANCE, 1.0f);

        float amps = volts / ohms;
        float watts = volts * amps;

        TextView outputAmps = (TextView) findViewById(R.id.output_amps);
        TextView outputWatts = (TextView) findViewById(R.id.output_watts);

        DecimalFormat format = new DecimalFormat("#.##");

        outputAmps.setText("Amperage: " + format.format(amps) + "A");
        outputWatts.setText("Watts: " + format.format(watts) + "W");
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_output, menu);
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
