package com.nomad_mystic_ohmslaw.ohmslaw;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

/**
 * A simple {@link Fragment} subclass.
 */
public class OutputFragment extends Fragment {

    private float mVolts;
    private float mOhms;
    private static final String LOG_TAG = "Output Framgemtn";
    private static final String VOLTS_TAG = "mvolts";
    private static final String OHMS_TAG = "mOhms";

    public OutputFragment() {
        // Required empty public constructor
    }

    public void setValues(float volts, float ohms) {
        mVolts = volts;
        mOhms = ohms;
        Log.d(LOG_TAG, "set volts: " + volts + " ohms: " + ohms);
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        if(savedInstanceState != null) {
            mVolts = savedInstanceState.getFloat(VOLTS_TAG);
            mOhms = savedInstanceState.getFloat(OHMS_TAG);
        }
        return inflater.inflate(R.layout.fragment_output, container, false);
    }

    @Override
    public void onSaveInstanceState(Bundle savedInstanceState) {
        super.onSaveInstanceState(savedInstanceState);
        savedInstanceState.putFloat(VOLTS_TAG, mVolts);
        savedInstanceState.putFloat(OHMS_TAG, mOhms);

    }
    @Override
    public void onStart() {
        super.onStart();
        TextView ampsText = (TextView) getActivity().findViewById(R.id.amps_output);
        TextView wattsText = (TextView) getActivity().findViewById(R.id.watts_output);
        float amps = mVolts / mOhms;
        float watts = mVolts * amps;

        ampsText.setText("Amps " + amps);
        wattsText.setText("Watts: " + watts);
    }
}
