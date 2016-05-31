package com.example.student.firedup;

import android.util.Log;

import java.sql.Connection;
import java.sql.DatabaseMetaData;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;

/**
 * Created by Student on 5/20/2015.
 */
public class DatabaseFetcher {
    public final static String LOG_TAG = "DatabaseFetcher";
    private OnDatabaseEventListener mListener;
    private Connection mConnection;

    public void connect(String server, String user, String password, String db) {
        try {
            String connectionString = "jdbc:jtds:sqlserver://" + server + "/" + db;
            Class.forName("net.sourceforge.jtds.jdbc.Driver");
            mConnection = DriverManager.getConnection(connectionString, user, password);
            Log.d(LOG_TAG, "Successfully connected to database!");

        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
    public void fetchTableList() {
        ArrayList<String> name = new ArrayList<String>();

        try {
            DatabaseMetaData metaData = mConnection.getMetaData();
            ResultSet results = metaData.getTables(null, null, "%", null);
            while(results.next()) {
                if(results.getString(2).equals("dbo")) {
                    Log.d(LOG_TAG, results.getString(3));
                }
            }
            mListener.onTableList(names);
        } catch (SQLException e) {
            e.printStackTrace();
        }

    }
    public void close() {
        try {
            if(mConnection != null) {
                mConnection.close();
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    interface OnDatabaseEventListener {
        public void onConnect();
        public void onTable();
    }

    public void fetchTableData(String tableName) {
        try {
            Statement statement = mConnection.createStatement();
            String query = "SELECT * FROM " + tableName + ";";
            ResultSet results = statement.executeQuery(query);
            ResultSetMetaData rsud = results.getMetaData();
            for(int i = 0; i < rsud.getColumnCount(); i++) {
                Log.d(LOG_TAG, rsud.getCatalogName((i + 1)));
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}
