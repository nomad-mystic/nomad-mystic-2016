package com.nomad_mystic_ohmslaw.ohmslaw;

import android.content.Context;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;

/**
 * A simple {@link Fragment} subclass.
 */
public class InputFragment extends Fragment {

    public static final String VOLTS_TAG = "Volts String";
    public static final String OHMS_TAG = "Ohms String";

    public interface OnCalculate {
        public void onCalculate(float volts, float ohms);
    }

    public InputFragment() {
        // Required empty public constructor
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_input, container, false);
    }
    @Override
    public void onStart() {
        super.onStart();
        Button calculateButton = (Button) getActivity().findViewById(R.id.calculate);
        calculateButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                OnCalculate listener = (OnCalculate) getActivity();
                EditText voltsText = (EditText) getActivity().findViewById(R.id.volt_input);
                String voltsString = voltsText.getText().toString();
                float volts = Float.parseFloat(voltsString);

                EditText ohmsText = (EditText) getActivity().findViewById(R.id.ohms_input);
                String ohmsString = ohmsText.getText().toString();
                float ohms = Float.parseFloat(ohmsString);

                listener.onCalculate(volts, ohms);
            }
        });
    }

    @Override
    public void onDestroy() {
        super.onDestroy();
        SharedPreferences prefs = getActivity().getPreferences(Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = prefs.edit();
        EditText voltsText = (EditText) getActivity().findViewById(R.id.volts_input);
        String voltsText = voltsText.getText().toString();
        editor.putString(VOLTS_TAG, voltsString);
    }
}
