package com.example.marc.passwordmanager;

import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.EditText;


public class MainActivity extends ActionBarActivity
        implements AccountItemFragment.OnFragmentInteractionListener,
        AccountViewFragment.OnAccountView,
        DeleteConfirmFragment.OnDeleteConfirmListener {

    private MenuItem mAddItem;
    private MenuItem mDeleteItem;
    private AccountItemFragment mAccountList;
    private static final String LOG_TAG = "MainActivity";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        if(savedInstanceState == null) {
            FragmentManager fragmentManager = getSupportFragmentManager();
            FragmentTransaction transaction = fragmentManager.beginTransaction();
            transaction.add(R.id.list_fragment, new LoginButtonFragment());
            transaction.add(R.id.content_fragment, new WelcomeFragment());
            transaction.commit();
        }
    }

    public void hideMenuItem(MenuItem item) {
        item.setVisible(false);
    }

    public void showMenuItem(MenuItem item) {
        item.setVisible(true);
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        mAddItem = menu.findItem(R.id.action_add);
        mDeleteItem = menu.findItem(R.id.action_delete);
        hideMenuItem(mAddItem);
        hideMenuItem(mDeleteItem);
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
        } else if(id == R.id.action_add) {
            replaceFragment(R.id.content_fragment, new AddAccountFragment());
        } else if(id == R.id.action_delete) {
            FragmentManager fragmentManager = getSupportFragmentManager();
            DeleteConfirmFragment fragment = new DeleteConfirmFragment();
            fragment.show(fragmentManager, "delete_confirm");
        }

        return super.onOptionsItemSelected(item);
    }

    private void replaceFragment(int resId, Fragment fragment) {
        FragmentManager fragmentManager = getSupportFragmentManager();
        FragmentTransaction transaction = fragmentManager.beginTransaction();
        transaction.replace(resId, fragment);
        transaction.commit();
    }

    public void loginClick(View button) {
        replaceFragment(R.id.content_fragment, new LoginFragment());
    }

    public void loginCancel(View button) {
        replaceFragment(R.id.content_fragment, new WelcomeFragment());
    }

    public void addAccountCancel(View button) {
        replaceFragment(R.id.content_fragment, new WelcomeFragment());
    }

    public void addAccountSubmit(View button) {
        EditText nameEdit = (EditText) findViewById(R.id.add_account_name);
        EditText passwordEdit = (EditText) findViewById(R.id.add_account_password);

        String name = nameEdit.getText().toString();
        String password = passwordEdit.getText().toString();

        AccountItem item = new AccountItem(name, password);
        mAccountList.addAccount(item);
        onFragmentInteraction(item);
    }

    private boolean validPassword(String password) {
        return password.equals("Swordfish");
    }

    public void loginSubmit(View button) {
        EditText passwordText = (EditText) findViewById(R.id.password_edit_login);
        String password = passwordText.getText().toString();
        boolean isValid = validPassword(password);
        if(isValid) {
            mAccountList =  new AccountItemFragment();
            replaceFragment(R.id.content_fragment, new LoggedInFragment());
            replaceFragment(R.id.list_fragment, mAccountList);
            showMenuItem(mAddItem);
        } else {
            replaceFragment(R.id.content_fragment, new SorryFragment());
        }
    }

    @Override
    public void onFragmentInteraction(AccountItem item) {
        AccountViewFragment fragment = new AccountViewFragment();
        fragment.setAccount(item);
        replaceFragment(R.id.content_fragment, fragment);
    }

    @Override
    public void onShowDelete() {
        showMenuItem(mDeleteItem);
    }

    @Override
    public void onHideDelete() {
        hideMenuItem(mDeleteItem);
    }

    @Override
    public void onDeleteConfirm() {
        mAccountList.removeCurrentItem();
    }
}
