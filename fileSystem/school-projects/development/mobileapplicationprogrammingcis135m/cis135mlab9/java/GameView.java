package com.nomad_mystic_crypto.catchtheclown;

import android.content.Context;
import android.os.Bundle;
import android.util.AttributeSet;
import android.view.SurfaceHolder;
import android.view.SurfaceView;

/**
 * Created by Nomad_Mystic on 6/11/2015.
 */
public class GameView extends SurfaceView implements SurfaceHolder.Callback {
    private Context mContext;
    private SurfaceHolder mHolder;
    private Thread mGameThread;
    private CatchTheClown mGame;

    public GameView(Context context, AttributeSet attrs) {
        super(context, attrs);
        mContext = context;
        mHolder = getHolder();
        mHolder.addCallback(this);
        mGame = new CatchTheClown(getContext(),this, mHolder);
    }


    public void onSaveInstanceState(Bundle savedInstanceState) {
        mGame.onSavedInstanceState(savedInstanceState);
    }

    public void onRestoreInstanceState(Bundle savedInstanceState) {
        mGame.onRestoreInstanceState(savedInstanceState);
    }

    @Override
    public void surfaceCreated(SurfaceHolder holder) {

        mGameThread = new Thread(mGame);
        mGame.setBounds(getWidth(), getHeight());
        mGameThread.start();

    }

    @Override
    public void surfaceChanged(SurfaceHolder holder, int format, int width, int height) {
        mGame.setBounds(width, height);
    }

    @Override
    public void surfaceDestroyed(SurfaceHolder holder) {
        mGame.stop();
    }
}
