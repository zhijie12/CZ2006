package others;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.sql.Connection;

import Entity.PastFlatTransaction;
import db.DataSource;
import db.PTFTDAO;

public class CSVFileManipulator {
	public static void readAndInsert(String fileName){
		BufferedReader br = null;
		try {
			String sCurrentLine;

			br = new BufferedReader(new FileReader(fileName));
			sCurrentLine = br.readLine();
			Connection conn = DataSource.createConnection();
			PTFTDAO.truncate(conn);
			while ((sCurrentLine = br.readLine()) != null) {
				String [] arr = sCurrentLine.split(",");
				String month = arr[0];
				String town = arr[1];
				String flat = arr[2];
				String block = arr[3];
				String streetName = arr[4];
				String storeyRange = arr[5];
				double floorArea = Double.parseDouble(arr[6]);
				String flatModel = arr[7];
				int leaseCommenceDate = Integer.parseInt(arr[8]);
				double Price = Double.parseDouble(arr[9]);
				PastFlatTransaction trans = new PastFlatTransaction(month,town,flat,block,streetName,storeyRange,floorArea,flatModel,leaseCommenceDate,Price);
				PTFTDAO.create(trans,conn);
				System.out.println("inserted");
			}
			DataSource.closeConnection(conn);
			System.out.println("finish inserting...");
		} catch (IOException e) {
			e.printStackTrace();
		} catch (ClassNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		} finally {
			try {
				if (br != null)br.close();
			} catch (IOException ex) {
				ex.printStackTrace();
			}
		}
	}
}
