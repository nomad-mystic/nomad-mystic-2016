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
    private boolean mTwoPanel;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        mTwoPanel =  getResources().getBoolean(R.bool.two_panel);
        Log.d(LOG_TAG, "Two Panel" + mTwoPanel);

        if(mTwoPanel) {
            AnimalItemFragment list = new AnimalItemFragment();
            FragmentManager manager = getSupportFragmentManager();
            FragmentTransaction transaction = manager.beginTransaction();

            if(savedInstanceState == null) {
                transaction.add(R.id.main_frame, list);
            } else {

                transaction.replace(R.id.main_frame, list);
            }

            transaction.commit();
        }
    }

    @Override
    public void onStart() {
        super.onStart();
    }

    public void clickedButton(View button) {
        Log.d(LOG_TAG, "Clicked button.");
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

    private void setImageResources(String caption, int imageId) {
        AnimalImageFragment frag = new AnimalImageFragment();
        frag.setImage(imageId);
        frag.setCaption(getString(R.string.hello) + caption);

        FragmentManager manager = getSupportFragmentManager();
        FragmentTransaction transaction = manager.beginTransaction();
        if(mTwoPanel) {
            transaction.replace(R.id.content_frame, frag);
        } else {
            transaction.replace(R.id.main_frame, frag);
            transaction.addToBackStack(null);
        }
        transaction.commit();
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
        setImageResources(item.getName(), item.getId());
        Log.d(LOG_TAG, "Got click " + item.getName());
    }
}
