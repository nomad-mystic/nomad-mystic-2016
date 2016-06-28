package com.example.marc.passwordmanager;

import android.app.Activity;
import android.os.Bundle;
import android.support.v4.app.ListFragment;
import android.view.View;
import android.widget.AbsListView;
import android.widget.ArrayAdapter;
import android.widget.ListView;

/**
 * A fragment representing a list of Items.
 * <p/>
 * <p/>
 * Activities containing this fragment MUST implement the {@link OnFragmentInteractionListener}
 * interface.
 */
public class AccountItemFragment extends ListFragment {

    private ArrayAdapter<AccountItem> mAdapter;
    private OnFragmentInteractionListener mListener;
    private AccountItem mCurrentItem;

    /**
     * Mandatory empty constructor for the fragment manager to instantiate the
     * fragment (e.g. upon screen orientation changes).
     */
    public AccountItemFragment() {
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        mAdapter = new ArrayAdapter<AccountItem>(
                getActivity(),
                android.R.layout.simple_list_item_activated_1,
                android.R.id.text1);
        mAdapter.add(new AccountItem("Comcast", "Swordfish"));
        mAdapter.add(new AccountItem("NetZero", "Swordfish"));
        mAdapter.add(new AccountItem("eBay", "Swordfish"));
        mAdapter.add(new AccountItem("PayPal", "Swordfish"));
        mAdapter.add(new AccountItem("PCC", "Swordfish"));
        mAdapter.add(new AccountItem("Amazon", "Swordfish"));
        mAdapter.add(new AccountItem("Google", "Swordfish"));
        mAdapter.add(new AccountItem("NetFlix", "Swordfish"));
        mAdapter.add(new AccountItem("DirectTV", "Swordfish"));
        setListAdapter(mAdapter);
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
    public void onStart() {
        super.onStart();
        getListView().setChoiceMode(ListView.CHOICE_MODE_SINGLE);
    }

    @Override
    public void onDetach() {
        super.onDetach();
        mListener = null;
    }


    @Override
    public void onListItemClick(ListView l, View v, int position, long id) {
        super.onListItemClick(l, v, position, id);

        if (null != mListener) {
            // Notify the active callbacks interface (the activity, if the
            // fragment is attached to one) that an item has been selected.
            mCurrentItem = mAdapter.getItem(position);
            mListener.onFragmentInteraction(mCurrentItem);
            getListView().setItemChecked(position, true);
        }
    }

    public void addAccount(AccountItem item) {
        mAdapter.add(item);
    }

    public void removeCurrentItem() {
        mAdapter.remove(mCurrentItem);
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
        public void onFragmentInteraction(AccountItem item);
    }

}
