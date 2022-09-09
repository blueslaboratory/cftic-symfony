package controlador;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import org.springframework.web.servlet.ModelAndView;
import org.springframework.web.servlet.mvc.Controller;

// es importante implementar la interface 
public class HolaMundoControlador implements Controller 
{
@Override 

    public ModelAndView handleRequest(HttpServletRequest hsr, HttpServletResponse hsr1) throws Exception {
        // Devolvemos la vista Hola Mundo, se pone el nombre de la pagina jsp a la que quiero que vaya 
        // sin la extension
        return new ModelAndView("HolaMundo");
    }
}
