package db;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;

import Entity.PastFlatTransaction;

public class PTFTDAO {
	public static boolean truncate(Connection conn){
		PreparedStatement stmt  = null;
		boolean result = false;
		try{
			String sql = "TRUNCATE TABLE pastresaleflattransaction";
			stmt = conn.prepareStatement(sql);
			stmt.executeUpdate();
			result = true;
			System.out.println("TRUNCATED");
		}catch(SQLException se){
			//Handle errors for JDBC
			se.printStackTrace();
		}finally{
			try {
				stmt.close();
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		
		return result;
	}
	public static boolean create(PastFlatTransaction pft,Connection conn){
		PreparedStatement stmt  = null;
		boolean result = false;
		try{
			String sql = "INSERT INTO pastresaleflattransaction "
					+ "(month, town, flatType, block, streetName, storeyRange, floorAreaSqm, flatModel, leaseCommenceDate, resalePrice)"+
					"VALUES (?,?,?,?,?,?,?,?,?,?)";
			stmt = conn.prepareStatement(sql);
			stmt.setString(1, pft.getMonth());
			stmt.setString(2, pft.getTown());
			stmt.setString(3, pft.getFlat());
			stmt.setString(4, pft.getBlock());
			stmt.setString(5, pft.getStreetName());
			stmt.setString(6, pft.getStoreyRange());
			stmt.setDouble(7, pft.getFloorArea());
			stmt.setString(8, pft.getFlatModel());
			stmt.setInt(9, pft.getLeaseCommenceDate());
			stmt.setDouble(10, pft.getPrice());
			stmt.executeUpdate();

			result = true;
		}catch(SQLException se){
			//Handle errors for JDBC
			System.out.println(pft.getBlock());
			se.printStackTrace();
		}finally{
			try {
				stmt.close();
			} catch (SQLException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		}
		
		return result;
	}
}
