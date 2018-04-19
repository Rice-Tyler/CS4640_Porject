package bean;

import java.util.ArrayList;
import java.util.List;

public class Ratings {
	public List<Double> ratingList = new ArrayList<Double>();
	public double avgRating = 0.0; 
	
	public Ratings() {
		this.addRating(4.9);
		
	}
	public List<Double> getRatingList() {
		return ratingList;
	}
	public void setRatingList(List<Double> ratingList) {
		this.ratingList = ratingList;
	}
	public double getAvgRating() {
		return avgRating;
	}
	public void setAvgRating(double avgRating) {
		this.avgRating = avgRating;
	}
	public void ratingsReset(){
	      this.ratingList  = new ArrayList<Double>();
	      this.avgRating = 0.0;     
	   }
	public void findRating() {
		double avg = 0;
		Integer count = 0;
		while(count < ratingList.size()){
			avg += ratingList.get(count);
		}
		avg = avg/count;
		this.avgRating = avg;
	}
	public void addRating(double rating) {
		this.ratingList.add(rating);
		this.findRating();
	}
}
