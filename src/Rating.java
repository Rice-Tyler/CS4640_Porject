

import java.io.IOException;
import java.io.PrintWriter;
import java.util.regex.Pattern;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


import bean.*;
/**
 * Servlet implementation class Rating
 */
@WebServlet("/Rating")
public class Rating extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public Rating() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.setContentType("text/html");
	    PrintWriter out = response.getWriter();
	    out.println("<html><body>");
		String rat = request.getParameter("rating");
		if(Pattern.matches("\\d+[.]\\d+",rat)) {
			double rating = Double.parseDouble(rat);
			if(rating < 5) {
				Ratings ratings = (Ratings) request.getSession().getAttribute("ratings");
				out.println(ratings.getRatingList());
				//ratings.addRating(rating);
				//ratings.findRating();
			}
		}
		else {
			out.println("Must be in form X.X and less than 5");
		}
		out.println("</body></html>");
		
		
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		doGet(request, response);
	}

}
