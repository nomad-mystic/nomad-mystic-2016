package com.example.marcgoodman.cuteanimals;

import android.support.v4.app.FragmentTransaction;
import android.support.v4.app.FragmentManager;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.FrameLayout;
import android.widget.ImageView;
import android.widget.TextView;


public class MainActivity extends ActionBarActivity implements AnimalImageFragment.OnSetCaption,
        AnimalItemFragment.OnFragmentInteractionListener {

    private static final String LOG_TAG = "MainActivity";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        AnimalItemFragment list = new AnimalItemFragment();
        AnimalImageFragment fragment = new AnimalImageFragment();
        FrameLayout frame = (FrameLayout) findViewById(R.id.content_frame);
        FragmentManager manager = getSupportFragmentManager();
        FragmentTransaction transaction = manager.beginTransaction();

        if(savedInstanceState == null) {
            transaction.add(R.id.content_frame, fragment);
            transaction.add(R.id.list_frame, list);
        } else {
            transaction.replace(R.id.content_frame, fragment);
            transaction.replace(R.id.list_frame, list);
        }
        transaction.commit();

    }

    @Override
    public void onStart() {
        super.onStart();
    }

    public void clickedButton(View button) {
        Log.d(LOG_TAG, "Clicked Button");
    }

    private void setVideoResources(int captionId, int videoId) {
        AnimalVideoFragment frag = new AnimalVideoFragment();
        frag.setVideo(getString(videoId));
        frag.setCaption(getString(R.string.hello) + getString(captionId));

        FragmentManager manager = getSupportFragmentManager();
        FragmentTransaction transaction = manager.beginTransaction();
        transaction.replace(R.id.content_frame, frag);
        transaction.commit();
    }

    public void showKittie(View button) {
        setVideoResources(R.string.kittie, R.string.tom_and_jerry);
    }

    private void setImageResources(int captionId, int imageId) {
        AnimalImageFragment frag = new AnimalImageFragment();
        frag.setImage(imageId);
        frag.setCaption(getString(R.string.hello) + getString(captionId));

        FragmentManager manager = getSupportFragmentManager();
        FragmentTransaction transaction = manager.beginTransaction();
        transaction.replace(R.id.content_frame, frag);
        transaction.commit();
    }

    public void showDoggie(View button) {
        setImageResources(R.string.doggie, R.drawable.doggie);
    }

    public void showChick(View button) {
        setImageResources(R.string.chick, R.drawable.chick);
    }

    public void showGoat(View button) {
        setVideoResources(R.string.goat, R.string.goat_video);
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
    public void onSetCaption(String caption) {
        Log.d(LOG_TAG, "Caption: " + caption);
    }

    @Override
    public void onSetImage(int image) {
        Log.d(LOG_TAG, "Image: " + image);
    }

    @Override
    public void onFragmentInteraction(AnimalItem item) {
        Log.d(LOG_TAG, "Got Clicked " + item.getName());
    }
}
