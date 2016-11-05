import java.io.IOException;

import db.DataSource;
import others.CSVFileManipulator;
import others.DownloadFile;

public class PullData {

	public static void main(String[] args) {
		//String fileURL = "https://data.gov.sg/dataset/7a339d20-3c57-4b11-a695-9348adfd7614/resource/83b2fc37-ce8c-4df4-968b-370fd818138b/download/resale-flat-prices-based-on-registration-date-from-march-2012-onwards.csv";
    	//String saveDir = "output/";
    	//String filename = "PFT.csv";
		String fileURL =args[0];
		String saveDir = args[1];
		String filename = args[2];
		DataSource.DB_URL = args[3];
		DataSource.USER = args[4];
		DataSource.PASS = args[5];
        try {
        	DownloadFile.downloadFile(fileURL, saveDir,filename);
        	CSVFileManipulator.readAndInsert(saveDir+filename);
        } catch (IOException ex) {
            ex.printStackTrace();
        }
	}

}
