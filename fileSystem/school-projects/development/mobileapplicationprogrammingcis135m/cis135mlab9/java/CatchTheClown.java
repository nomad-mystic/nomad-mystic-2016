package com.nomad_mystic_crypto.catchtheclown;

import android.content.Context;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.graphics.Canvas;
import android.graphics.Color;
import android.graphics.Paint;
import android.graphics.Rect;
import android.graphics.Shader;
import android.graphics.drawable.BitmapDrawable;
import android.media.MediaPlayer;
import android.os.Bundle;
import android.view.MotionEvent;
import android.view.SurfaceHolder;
import android.view.View;

import java.util.Random;

/**
 * Created by Nomad_Mystic on 6/11/2015.
 */
public class CatchTheClown implements Runnable, View.OnTouchListener {
    private static final String DX_TAG = "mClownDX";
    private static final String DY_TAG = "mClownDY";
    private static final String SCORE_TAG = "mScore";
    private SurfaceHolder mHolder;
    private Context mContext;
    private int mWidth, mHeight;
    private int mClownX, mClownY;
    private int mClownDX, mClownDY;
    private boolean mStopped;
    private int mClownWidth, mClownHeight;
    private int mScore;
    private MediaPlayer mBackgroundMusic;

    private Random mRandom;
    public CatchTheClown(Context context, View view, SurfaceHolder holder) {
        mHolder = holder;
        mContext = context;
        mRandom = new Random();
        view.setOnTouchListener(this);
        playBackgroundMusic(R.raw.music);

        mScore = 0;
        mClownDX = -5;
        mClownDY = -5;
    }

    public void onSavedInstanceState(Bundle savedInstanceState) {
        savedInstanceState.putInt(DX_TAG, mClownDX);
        savedInstanceState.putInt(DY_TAG, mClownDY);
        savedInstanceState.putInt(SCORE_TAG, mScore);

    }

    public void onRestoreInstanceState(Bundle savedInstanceState) {
        if(savedInstanceState != null) {
            mScore = savedInstanceState.getInt(SCORE_TAG);
            mClownDX = savedInstanceState.getInt(DX_TAG);
            mClownDY = savedInstanceState.getInt(DY_TAG);
        } else {
            mScore = 0;
            mClownDX = -5;
            mClownDY = -5;
        }

    }

    public void setBounds(int width, int height) {
        mWidth = width;
        mHeight = height;
    }
    public void playSound(int id) {
        final MediaPlayer player = MediaPlayer.create(mContext, id);
        player.start();
        player.setOnCompletionListener(new MediaPlayer.OnCompletionListener() {
            @Override
            public void onCompletion(MediaPlayer mp) {
                player.release();
            }
        });
    }
    public void playBackgroundMusic(int id) {
        mBackgroundMusic = MediaPlayer.create(mContext, id);
        mBackgroundMusic.start();
        mBackgroundMusic.setLooping(true);
    }
    @Override
    public void run() {
        Bitmap clown = BitmapFactory.decodeResource(mContext.getResources(), R.drawable.clown);
        Bitmap background = BitmapFactory.decodeResource(mContext.getResources(), R.drawable.background);
        BitmapDrawable titledBackground = new BitmapDrawable(mContext.getResources(), background);
        titledBackground.setBounds(0, 0, mWidth, mHeight);
        titledBackground.setTileModeXY(Shader.TileMode.REPEAT, Shader.TileMode.REPEAT);
        Paint paint = new Paint();
        Paint textPaint = new Paint();

        int dimen = Math.min(mWidth,mHeight);
        int textSize = (int)(0.1f * dimen);
        int clownSize = (int)(0.1f * dimen);
        Rect clownBounds = new Rect();
        Rect screenBounds = new Rect();

        textPaint.setColor(Color.GRAY);
        textPaint.setTextSize(textSize);

        clownBounds.set(0,0, clown.getWidth(), clown.getHeight());
        mClownWidth = clownSize;
        mClownHeight = clownSize;

        mClownWidth = clown.getWidth();
        mClownHeight = clown.getHeight();
        mClownX = mRandom.nextInt(mWidth - mClownWidth);
        mClownY = mRandom.nextInt(mHeight - mClownHeight);



        mStopped = false;
        while(!mStopped) {
            mClownX += mClownDX;
            mClownY += mClownDY;

            if(mClownX < 0) {
                mClownX = -mClownX;
                mClownDX = -mClownDX;
                playSound(R.raw.bounce);
            }
            if(mClownY < 0) {
                mClownY = -mClownY;
                mClownDY = -mClownDY;
                playSound(R.raw.bounce);
            }
            if(mClownX + mClownWidth > mWidth) {
                mClownX = 2 * (mWidth - mClownWidth) - mClownX;
                mClownDX = -mClownDX;
                playSound(R.raw.bounce);
            }
            if(mClownY + mClownHeight > mHeight) {
                mClownY = 2 * (mHeight - mClownHeight) - mClownY;
                mClownDY = -mClownDY;
                playSound(R.raw.bounce);
            }

            Canvas canvas = mHolder.lockCanvas();
            if(canvas != null) {
                titledBackground.draw(canvas);
                canvas.drawText("" + mScore, textSize, 2*textSize, textPaint);
                screenBounds.set(mClownX, mClownY, mClownX + mClownWidth, mClownY + mClownHeight);
                canvas.drawBitmap(clown, clownBounds, screenBounds, paint);
                mHolder.unlockCanvasAndPost(canvas);
                try {
                    Thread.sleep(10);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            } else {
                try {
                    Thread.sleep(100);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
            }

        }
    }

    public void stop() {
        mStopped = true;
        mBackgroundMusic.stop();
        mBackgroundMusic.release();
    }

    @Override
    public boolean onTouch(View v, MotionEvent event) {
        int x = (int)event.getX();
        int y = (int)event.getY();
        int action = event.getAction();

        if(action == MotionEvent.ACTION_DOWN) {
            if(x >= mClownX && x <= mClownX + mClownWidth) {
                if(y > mClownY && y <= mClownY + mClownHeight) {
                    playSound(R.raw.click);
                    mScore += 10;
                    mClownDX += 1.2;
                    mClownDY += 1.2;
                    mClownX = mRandom.nextInt(mWidth - mClownWidth);
                    mClownY = mRandom.nextInt(mHeight - mClownHeight);
                }
            }
        }
        return true;
    }
}
