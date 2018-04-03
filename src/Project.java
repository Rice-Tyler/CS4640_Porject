

import java.io.IOException;
import java.io.PrintWriter;
import java.io.File;
import java.util.Scanner;
import java.util.ArrayList;
import java.text.SimpleDateFormat;  
import java.util.Date;  

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/Project")
public class Project extends HttpServlet 
{	
   // Location of servlet. 
   // static String url = "http://labunix03.cs.virginia.edu:8080/up3f/examples.servletFormhandler2";   // labunix	
   static String url = "http://localhost:8080/WebPL/Project";
   // note: domain="localhost:8080", path="/cs4640s18/", servlet="examples.servletFormhandler2"
   
   // note: this servletFormHandler2 servlet is in examples.servlet package
   // to deploy, the servlet .class file must be put in examples/servlet/ directories 
   // (labunix03) 
   //    put servletFormhandler2.class in /opt/tomcat/webapps/your-username/WEB-INF/classes/examples/servlet/ 
   // (local) 
   //    put servletFormhandler2.class in /tomcat/webapps/your-username/WEB-INF/classes/examples/servlet/
   // if you create a servlet and have different file structure, remember to update the paths
	   
   // to access the servlet
   // (local) 
   //    http://localhost:8080/cs4640s18/examples.servletFormhandler2
   // (labunix03) 
   //    http://labunix03:8080/up3f/examples.servletFormhandler2  
	
   // Important note: labunix does not support servlet annotation and thus using @WebServlet does not work
   // You need to manually do servlet mapping using web.xml file
   
   String msg = "";
   
   public void doGet(HttpServletRequest request, HttpServletResponse response) 
               throws ServletException, IOException 
   {
      response.setContentType("text/html");
      PrintWriter out = response.getWriter();
      
      File file =
    	      new File("C:\\Users\\Student\\eclipse-workspace\\WebPL\\WebContent\\Template.html");
    	    Scanner sc = new Scanner(file);
    	 
    	    while (sc.hasNextLine())
    	      out.println(sc.nextLine());
      
      out.println("<html>");
      out.println("<head>"); 
      out.println("<title></title>");
      out.println("<link rel=stylesheet href='css/style.css' type='text/css'>");
      out.println("</head>");  
      out.println("<body style='color:gold'>");
      out.println("<div class=\"card card-outline-primary mb-3 text-center\">\r\n" + 
      		"				  <div class=\"card-block\" id=\"review\">");
      out.println("    <h1 >Submit Review</h1>");

      // 3. url rewriting (maintain state, share data)
      // uncomment these two statements and comment out step 1 to see how it works
//      out.println("    <a href=\"" + url + 
//        "?username=someone&emailaddr=someone@uva.edu&comment=let's see how url rewriting works\"" + ">send request</a>");
//      doPost(request, response);

//  don't do this, you are redirecting to yourself -- causing infinite loop      
//      response.sendRedirect("\"" + url + 
//          "?username=someone&emailaddr=someone@uva.edu&comment=let's see how url rewriting works\"");
                		    	
      
      // 1. form submission
      if (msg.length() > 0)
          out.println("<br/>" + "<span class='msg'>" + msg + "</span> <br/><br/>");           
	    	             
      out.println("<form action='" + url + "' method='post' >");
      out.println("      <label>Name: </label>");
      out.println("      <input type='text' id='user' name='username'/> <br/>");        
      out.println("      <label>Title: </label>");
      out.println("      <input type='text' id='email' name='emailaddr'  /> <br/>");
      out.println("      <span id='email-msg' class='msg'></span>");
      out.println("      <label>Review: </label>");
      out.println("      <textarea rows='5' cols='40' id='comment' name='comment'></textarea> <br/>");
      out.println("      <span id='comment-msg' class='msg'></span>");
      out.println("      <input type='submit' value='Submit comment' />");
      out.println("    </form>");
      out.println("  </div>");
      out.println("  </div>");
      out.println("</body>");
      out.println("</html>");
      
      String username = request.getParameter("username");
      String email = request.getParameter("emailaddr");
      String comment = request.getParameter("comment"); 
      
      
      if (username.length() > 0 && email.length() > 0 && comment.length() > 0)
      {    	 	 
         printReview(username, comment, email, out);
      }
      
      
      out.close();
      msg = "";
      
   }

   public void doPost(HttpServletRequest request, HttpServletResponse response) 
               throws ServletException, IOException 
   {
      response.setContentType("text/html");
      PrintWriter out = response.getWriter();
      
      // doPost() handles post request
      
      // access form data (using the input's name attribute)
      String username = request.getParameter("username");
      String email = request.getParameter("emailaddr");
      String comment = request.getParameter("comment"); 

      // 4. not call doGet here (we're now trying url rewriting which result in get request)
      //    in the doGet(), we call doPost()
      //    here (in doPost()), if we call doGet() -- we are circling
      // unncomment these and comment out step 2 to see how it works     
//      if (username != null && email != null && comment != null)   // notice we check for null here
//         printConfirmation(username, comment, email, out);
     
      
      // 2. handle form submission from step 1
      if (username.length() > 0 && email.length() > 0 && comment.length() > 0)
      {    	 	 
         doGet(request, response);       // submit more comment?
         printReview(username, comment, email, out);
      }
      else
      {
         msg = "Please enter your information";
         doGet(request, response);
      }
      
      out.close();
   }


//  Instead of mixing html in java (refer to out.println() in doGet()), 
//  some developers prefer to separate them as much as possible. 
//  You may comment the out.println() in doGet() and have doGet() call other java functions
//  to do create the html document (for example, call printHTML() below)
//    
//   private void printHTML(PrintWriter out)
//   {
//      String str_head = 
//         "<html>" +
//         "<head>" + 
//         "  <title>Servlet example</title>" +
//         "  <link rel=stylesheet href='styles/example-style.css' type='text/css'>" +
//         "</head>"; 
//      
//      String str_body = 
//         "<body>" +
//         "  <div>" +
//         "    <h1>Servlet example</h1>";
//	    	      
//         if (msg.length() > 0)
//            str_body = str_body + "<br/>" + "<span class='msg'>" + msg + "</span> <br/><br/>";           
//	    	      
//         str_body += 
//            "    <form action='" + url + "' method='post' onsubmit='return (validateInput())' >" +
//            "      <label>Name: </label>" +
//            "      <input type='text' id='user' name='username' autofocus /> <br/>" +         
//            "      <label>Email: </label>" +
//            "      <input type='text' id='email' name='emailaddr'  /> <br/>" +
//            "      <label>Comment: </label>" +
//            "      <textarea rows='5' cols='40' id='comment' name='comment'></textarea> <br/>" +
//            "      <input type='submit' value='Submit comment' />" +
//            "    </form>" +
//            "  </div>" +
//            "</body>" + 
//            "</html>";     
//         
//      String str_html = str_head + "<br/>" + str_body;
//      out.println(str_html);      
//   }
//   
   
   private void printReview(String username, String review, String title, PrintWriter out)
   {
	   
      out.println("<div class=\"card card-outline-primary mb-3 text-center\">");
      out.println("<div class=\"card-block\" id=\"review\">");
      out.println("<div class=\"row\">");
      out.println("<div class=\"col-lg-2\">");
      out.println("<img class=\"img-responsive float-center\" src=\"images/Poster.jpg\" id=\"review-img\">");
      out.println("<p>" + username + "</p>");
      out.println("</div>");
      out.println("<div class=\"col-lg-10 text-left\">");
      out.println("<h3>" + title + "</h3>");
      out.println("<blockquote>"+ review + "</blockquote>");
      out.println("</div>");
      out.println("</div>");
      out.println("</div>");
      out.println("</div>");
   }

}



