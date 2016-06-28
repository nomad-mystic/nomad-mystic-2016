package com.nomad_mystic_fragmentedmeals.fragmentedmeals;

import android.support.v4.app.FragmentTransaction;
import android.support.v4.app.FragmentManager;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;


public class MainActivity extends ActionBarActivity
        implements MealListFragment.OnFragmentInteractionListener,
        MealFragment.OnAttachMealFragment {

    public static final String LOG_TAG = "Main Activity";
    private MealFragment mMealFragment;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        if (savedInstanceState == null) {
            if (getResources().getBoolean(R.bool.two_panel)) {
                FragmentManager manager = getSupportFragmentManager();
                FragmentTransaction transaction = manager.beginTransaction();
                transaction.add(R.id.list_fragment, new MealListFragment());
                transaction.add(R.id.meal_fragment, new MealFragment());
                transaction.commit();
            } else {
                FragmentManager manager = getSupportFragmentManager();
                FragmentTransaction transaction = manager.beginTransaction();
                transaction.add(R.id.fragment_container, new MealFragment());
                transaction.commit();
            }
        }
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
    public void onFragmentInteraction(MealItem id) {
        Log.d(LOG_TAG, "Name: " + id.getName() + "Picure id = " + id.getPicture());
        if (getResources().getBoolean(R.bool.two_panel)) {
            mMealFragment.setMeal(id);
        } else {
            MealFragment mealFragment = new MealFragment();

            FragmentManager manager = getSupportFragmentManager();
            FragmentTransaction transaction = manager.beginTransaction();
            transaction.replace(R.id.fragment_container, mealFragment);
            transaction.addToBackStack(null);
            transaction.commit();
            mealFragment.setMeal(id);
        }
    }

    @Override
    public void onAttachMealFragment(MealFragment fragment) {
        mMealFragment = fragment;
    }
}
