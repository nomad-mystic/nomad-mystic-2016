package com.nomad_mystic_fragmentedmeals.firedup;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 * Created by Nomad_Mystic on 5/20/2015.
 */
public class DatabaseFetcher {

    private Connection mConnection;
     public void connect(String server, String user, String password, String db) {
         try {
             String connectionString = "jdbc:jtds:sqlserver://" + server + "/" + db;
             Class.forName("net.sourceforge.jtds.jdbc.Driver");
             Connection mConnection = DriverManager.getConnection(connectionString, user, password);
         } catch (ClassNotFoundException e) {
             e.printStackTrace();
         } catch(SQLException e) {
             e.printStackTrace();
         }
     }
    public void close() {
        try {
            if (mConnection != null) {
                mConnection.close();
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    interface OnDatabaseEvent {
        public void onConnect();
    }
}
