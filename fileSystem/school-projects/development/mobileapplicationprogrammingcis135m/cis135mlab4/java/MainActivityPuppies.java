package com.nomad_mystic_puppies.puppies;

import android.media.MediaPlayer;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.ImageView;
import android.widget.TextView;


public class MainActivity extends ActionBarActivity {

    private int mAudio = R.raw.chimpanzee;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }

    public void showKittie(View button) {


        TextView textView = (TextView) findViewById(R.id.text_caption);
        ImageView imageView = (ImageView) findViewById(R.id.image_view);

        textView.setText(getString(R.string.hello) + getString(R.string.kittie));
        imageView.setImageResource(R.drawable.kittie);
    }
    public void showDoggie(View button) {

        mAudio = R.raw.dogEdit;
        TextView textView = (TextView) findViewById(R.id.text_caption);
        ImageView imageView = (ImageView) findViewById(R.id.image_view);

        textView.setText(getString(R.string.hello) + getString(R.string.doggie));
        imageView.setImageResource(R.drawable.doggie);
    }
    public void showChick(View button) {

        mAudio = R.raw.chick;
        TextView textView = (TextView) findViewById(R.id.text_caption);
        ImageView imageView = (ImageView) findViewById(R.id.image_view);

        textView.setText(getString(R.string.hello) + getString(R.string.chick));
        imageView.setImageResource(R.drawable.chick);
    }
    public void playAudio(View image) {

        MediaPlayer mediaPlayer = MediaPlayer.create(this, R.raw.chick);
        mediaPlayer.start();
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
