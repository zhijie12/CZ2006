package db;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DataSource {
	static String JDBC_DRIVER = "com.mysql.jdbc.Driver";  
	public static String DB_URL = "jdbc:mysql://localhost:3306/harmoniouslivingdb?useSSL=false";

	//  Database credentials
	public static String USER = "root";
	public static String PASS = "password";
	public static Connection createConnection() throws ClassNotFoundException{
		Connection conn = null;
		try{
			//STEP 2: Register JDBC driver
			Class.forName("com.mysql.jdbc.Driver");
			//STEP 3: Open a connection
			System.out.println("Connecting to database...");
			conn = DriverManager.getConnection(DB_URL,USER,PASS);
		}catch(SQLException se){
			//Handle errors for JDBC
			se.printStackTrace();
		}
		return conn;
	}
	public static void closeConnection(Connection conn){
		try {
			conn.close();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
}
