package com.nomad_mystic_actionbar.lifecycle;

import android.content.Intent;
import android.net.Uri;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.TextView;
import android.widget.VideoView;

public class MainActivity extends ActionBarActivity {

    private static final String LOG_TAG = "MainActivity";
    private boolean mStopped1 = false;
    private boolean mStopped2 = false;
    private int mCounter1 = 0;
    private int mCounter2 = 0;
    private Thread mTimer1;
    private Thread mTimer2;
    private VideoView mVideoView;
    private int mSeekPos = 0;
    public static final String SEEK_TAG = "mSeekPos";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Log.d(LOG_TAG, "onCreate called!");
        if(savedInstanceState == null) {
            Log.d(LOG_TAG, "savedInstanceState is null.");
        } else {
            Log.d(LOG_TAG, "savedInstanceState: " + savedInstanceState.toString());
        }

        if (savedInstanceState != null) {
            mSeekPos = savedInstanceState.getInt(SEEK_TAG, 0);
        }

    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public void onSaveInstanceState(Bundle saveInstanceState) {
        super.onSaveInstanceState(saveInstanceState);

        saveInstanceState.putInt(SEEK_TAG, mSeekPos);
    }

    @Override
    public void onDestroy() {
        super.onDestroy();
        Log.d(LOG_TAG, "onDestroy called!");
    }

    @Override
    public void onStart() {
        super.onStart();

        mVideoView = (VideoView) findViewById(R.id.videoView);
        Uri uri =  Uri.parse("http://spot.pcc.edu/~mgoodman/Videos/135M/tomandjerry.3gp");
        mVideoView.setVideoURI(uri);
        mVideoView.start();
    }

    @Override
    public void onResume() {
        super.onResume();
        mVideoView.seekTo(mSeekPos);
        mVideoView.
    }

    @Override
    public void onPause() {
        super.onPause();
        Log.d(LOG_TAG, "onPause called!");
        mStopped2 = true;
        mSeekPos = mVideoView.getCurrentPosition();
        mVideoView.pause();
    }

    @Override
    public void onStop() {
        super.onStop();
        Log.d(LOG_TAG, "onStop called!");
        mStopped1 = true;
    }

    @Override
    public void onRestart() {
        super.onRestart();
        Log.d(LOG_TAG, "onRestart called!");
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
        } else if (id == R.id.pause) {
            Intent intent = new Intent(this, PauseActivity.class);
            startActivity(intent);
        }

        return super.onOptionsItemSelected(item);
    }
}
