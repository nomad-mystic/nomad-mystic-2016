package com.nomad_mystic_lab3.lab3;

import android.content.Intent;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;


public class InputActivity extends ActionBarActivity {

    public final static String EXTRA_VOLTS = "com.nomad_mystic_lab3.lab3.VOLTS";
    public final static String EXTRA_RESISTANCE = "com.nomad_mystic_lab3.lab3.RESISTANCE";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_input);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_input, menu);
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

    public void calculate(View button) {
        TextView voltText = (TextView) findViewById(R.id.volt_text);
        TextView resistanceText = (TextView) findViewById(R.id.resistance_text);

        String voltString = voltText.getText().toString();
        String resistanceString = resistanceText.getText().toString();

        try {
            float f = Float.parseFloat(voltString);
        } catch (NumberFormatException e) {
            Toast.makeText(this, "Please enter a Voltage!", Toast.LENGTH_SHORT).show();
            return;
        }
        try {
            float f = Float.parseFloat(voltString);
        } catch (NumberFormatException e) {
            Toast.makeText(this, "Please enter a Voltage!", Toast.LENGTH_SHORT).show();
            return;
        }
        if(resistanceString.length() == 0) {
            Toast.makeText(this, "Please enter a Resistance!", Toast.LENGTH_SHORT).show();
            return;
        }

        if(Float.parseFloat(resistanceString) <= 0.0f) {
            Toast.makeText(this, "Resistance Must be Larger than 0!", Toast.LENGTH_SHORT).show();
            return;
        }

        Intent intent = new Intent(this, OutputActivity.class);

        intent.putExtra(EXTRA_VOLTS, Float.parseFloat(voltString));
        intent.putExtra(EXTRA_RESISTANCE, Float.parseFloat(resistanceString));

        startActivity(intent);
    }
}
