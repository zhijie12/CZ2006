package Entity;

import java.sql.Date;

public class PastFlatTransaction {
	String month;
	String town;
	String flat;
	String block;
	String streetName;
	String storeyRange;
	double floorArea;
	String flatModel;
	int leaseCommenceDate;
	double Price;
	
	
	public PastFlatTransaction(String month, String town, String flat, String block, String streetName,
			String storeyRange, double floorArea, String flatModel, int leaseCommenceDate, double price) {
		super();
		this.month = month;
		this.town = town;
		this.flat = flat;
		this.block = block;
		this.streetName = streetName;
		this.storeyRange = storeyRange;
		this.floorArea = floorArea;
		this.flatModel = flatModel;
		this.leaseCommenceDate = leaseCommenceDate;
		Price = price;
	}
	public String getMonth() {
		return month;
	}
	public void setMonth(String month) {
		this.month = month;
	}
	public String getTown() {
		return town;
	}
	public void setTown(String town) {
		this.town = town;
	}
	public String getFlat() {
		return flat;
	}
	public void setFlat(String flat) {
		this.flat = flat;
	}
	public String getBlock() {
		return block;
	}
	public void setBlock(String block) {
		this.block = block;
	}
	public String getStreetName() {
		return streetName;
	}
	public void setStreetName(String streetName) {
		this.streetName = streetName;
	}
	public String getStoreyRange() {
		return storeyRange;
	}
	public void setStoreyRange(String storeyRange) {
		this.storeyRange = storeyRange;
	}
	public double getFloorArea() {
		return floorArea;
	}
	public void setFloorArea(double floorArea) {
		this.floorArea = floorArea;
	}
	public String getFlatModel() {
		return flatModel;
	}
	public void setFlatModel(String flatModel) {
		this.flatModel = flatModel;
	}
	public int getLeaseCommenceDate() {
		return leaseCommenceDate;
	}
	public void setLeaseCommenceDate(int leaseCommenceDate) {
		this.leaseCommenceDate = leaseCommenceDate;
	}
	public double getPrice() {
		return Price;
	}
	public void setPrice(double price) {
		Price = price;
	}
	
}
