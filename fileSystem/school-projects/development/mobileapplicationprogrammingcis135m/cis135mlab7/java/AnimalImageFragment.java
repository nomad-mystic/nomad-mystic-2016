package com.example.marcgoodman.cuteanimals;


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
public class AnimalImageFragment extends Fragment {
    private int mImage = R.drawable.cute;
    private String mCaption = null;
    private OnSetCaption mListener;

    public AnimalImageFragment() {
        // Required empty public constructor
    }

    @Override
    public void onAttach(Activity activity) {
        super.onAttach(activity);
        mListener = (OnSetCaption) activity;

        if(mCaption == null) {
            mCaption = getActivity().getResources().getString(R.string.cute_animals);
        }
    }

    public void setImage(int resId) {
        mImage = resId;
    }

    public void setCaption(String caption) {
        mCaption = caption;
    }

    public void clickedButton(View button) {
        mListener.onSetCaption(mCaption);
        mListener.onSetImage(mImage);
    }

    @Override
    public void onStart() {
        super.onStart();
        ImageView imageView = (ImageView) getActivity().findViewById(R.id.image_view);
        imageView.setImageResource(mImage);
        TextView textView = (TextView) getActivity().findViewById(R.id.caption);
        textView.setText(mCaption);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_animal_image, container, false);
    }

    public interface OnSetCaption {
        public void onSetCaption(String caption);
        public void onSetImage(int image);
    }
}
