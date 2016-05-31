package com.nomad_mystic_fragmentedmeals.fragmentedmeals;


import android.app.Activity;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;


/**
 * A simple {@link Fragment} subclass.
 */
public class MealFragment extends Fragment {

    public static final String MEAL_NAME_KEY = "Meal Name";
    public static final String MEAL_PICTURE_KEY = "Meal Picture";
    private MealItem mCurrentMeal;

    interface OnAttachMealFragment {
        public void onAttachMealFragment(MealFragment fragment);
    }

    public MealFragment() {
        // Required empty public constructor
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        if(savedInstanceState != null) {
            int mealPicture = savedInstanceState.getInt(MEAL_PICTURE_KEY, 0);
            if(mealPicture != 0) {
                String mealName = savedInstanceState.getString(MEAL_NAME_KEY);
                mCurrentMeal = new MealItem(mealName, mealPicture);
            }
        }
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_meal, container, false);
    }

    @Override
    public void onAttach(Activity activity) {
        super.onAttach(activity);
        if(activity instanceof OnAttachMealFragment) {
            ((OnAttachMealFragment) activity).onAttachMealFragment(this);
        }
    }

    public void onStart() {
        super.onStart();
        if(mCurrentMeal != null) {
            setMeal(mCurrentMeal);
        }
    }

    public void setMeal(MealItem item) {
        mCurrentMeal = item;
        if(getView() != null ) {
            TextView nameText = (TextView) getView().findViewById(R.id.meal_name);
            ImageView mealPicture = (ImageView) getView().findViewById(R.id.meal_picture);
            nameText.setText(item.getName());
            mealPicture.setImageResource(item.getPicture());
        }
    }

    @Override
    public void onSaveInstanceState(Bundle savedInstanceState) {
        super.onSaveInstanceState(savedInstanceState);
        if (mCurrentMeal != null) {
            savedInstanceState.putString(MEAL_NAME_KEY, mCurrentMeal.getName());
            savedInstanceState.putInt(MEAL_PICTURE_KEY, mCurrentMeal.getPicture());
        }
    }
}