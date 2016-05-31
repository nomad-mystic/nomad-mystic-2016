package com.example.marc.passwordmanager;


import android.app.Activity;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;


/**
 * A simple {@link Fragment} subclass.
 */
public class AccountViewFragment extends Fragment {

    private AccountItem mCurrentAccount;
    private OnAccountView mListener;

    public AccountViewFragment() {
    }


    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        return inflater.inflate(R.layout.fragment_account_view, container, false);
    }

    @Override
    public void onAttach(Activity activity) {
        super.onAttach(activity);
        mListener = (OnAccountView) activity;
    }

    @Override
    public void onStart() {
        super.onStart();
        TextView name = (TextView) getView().findViewById(R.id.account_name);
        TextView password = (TextView) getView().findViewById(R.id.account_password);

        name.setText(mCurrentAccount.getName());
        password.setText(mCurrentAccount.getPassword());
        mListener.onShowDelete();
    }

    @Override
    public void onStop() {
        super.onStop();
        mListener.onHideDelete();
    }

    public void setAccount(AccountItem item) {
        mCurrentAccount = item;

        if(getView() != null) {
            TextView name = (TextView) getView().findViewById(R.id.account_name);
            TextView password = (TextView) getView().findViewById(R.id.account_password);

            name.setText(mCurrentAccount.getName());
            password.setText(mCurrentAccount.getPassword());
        }
    }

    public interface OnAccountView {
        void onShowDelete();
        void onHideDelete();
    }
}
