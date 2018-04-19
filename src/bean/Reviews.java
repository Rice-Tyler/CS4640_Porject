package bean;

import java.util.ArrayList;
import java.util.List;

public class Reviews {
	public List<Double> ratings = new ArrayList<Double>();
	public List<String> titles = new ArrayList<String>();
	public List<String> usernames = new ArrayList<String>();
	public List<String> texts = new ArrayList<String>();
	
	public Reviews() {}
	public List<Double> getRatings() {
		return ratings;}
	public void setRatings(List<Double> ratings) {
		this.ratings = ratings;}
	public List<String> getTitles() {
		return titles;}
	public void setTitles(List<String> titles) {
		this.titles = titles;}
	public List<String> getUsernames() {
		return usernames;}
	public void setUsernames(List<String> usernames) {
		this.usernames = usernames;}
	public List<String> getTexts() {
		return texts;}
	public void setTexts(List<String> texts) {
		this.texts = texts;}
	
	public void createReview(String title,String username, String text, double rating){
		this.ratings.add(rating);
		this.titles.add(title);
		this.usernames.add(username);
		this.texts.add(text);
	}
	
	public void resetReviews() {
		this.ratings = new ArrayList<Double>();
		this.titles = new ArrayList<String>();
		this.usernames = new ArrayList<String>();
		this.texts = new ArrayList<String>();
	}
}
