package com.example.marcgoodman.cuteanimals;

import android.app.Activity;
import android.os.Build;
import android.os.Bundle;
import android.support.v4.app.ListFragment;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.ListView;

/**
 * A fragment representing a list of Items.
 * <p/>
 * <p/>
 * Activities containing this fragment MUST implement the {@link OnFragmentInteractionListener}
 * interface.
 */
public class AnimalItemFragment extends ListFragment {

    private OnFragmentInteractionListener mListener;
    private ArrayAdapter<AnimalItem> mAdapter;

    /**
     * Mandatory empty constructor for the fragment manager to instantiate the
     * fragment (e.g. upon screen orientation changes).
     */
    public AnimalItemFragment() {
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        int activeLayout = android.R.layout.simple_list_item_1;

        if(android.os.Build.VERSION.SDK_INT >= 11) {
            activeLayout = android.R.layout.simple_list_item_activated_1;
        }
        // TODO: Change Adapter to display your content
        mAdapter = new ArrayAdapter<AnimalItem>(getActivity(),
                activeLayout, android.R.id.text1);
        mAdapter.add(new AnimalItem("Kittie", R.drawable.kittie));
        mAdapter.add(new AnimalItem("Doggie", R.drawable.doggie));
        mAdapter.add(new AnimalItem("Chick", R.drawable.chick));
        mAdapter.add(new AnimalItem("Goat", R.drawable.goat));

        setListAdapter(mAdapter);

    }

    @Override
    public void onStart() {
        super.onStart();
        getListView().setChoiceMode(ListView.CHOICE_MODE_SINGLE);
    }

    @Override
    public void onAttach(Activity activity) {
        super.onAttach(activity);
        try {
            mListener = (OnFragmentInteractionListener) activity;
        } catch (ClassCastException e) {
            throw new ClassCastException(activity.toString()
                    + " must implement OnFragmentInteractionListener");
        }
    }

    @Override
    public void onDetach() {
        super.onDetach();
        mListener = null;
    }


    @Override
    public void onListItemClick(ListView l, View v, int position, long id) {
        super.onListItemClick(l, v, position, id);
        l.setItemChecked(position, true);

        if (null != mListener) {
            // Notify the active callbacks interface (the activity, if the
            // fragment is attached to one) that an item has been selected.
            mListener.onFragmentInteraction(mAdapter.getItem(position));
        }
    }

    /**
     * This interface must be implemented by activities that contain this
     * fragment to allow an interaction in this fragment to be communicated
     * to the activity and potentially other fragments contained in that
     * activity.
     * <p/>
     * See the Android Training lesson <a href=
     * "http://developer.android.com/training/basics/fragments/communicating.html"
     * >Communicating with Other Fragments</a> for more information.
     */
    public interface OnFragmentInteractionListener {
        // TODO: Update argument type and name
        public void onFragmentInteraction(AnimalItem item);
    }

}
