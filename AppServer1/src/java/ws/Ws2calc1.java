/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package ws;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.PathParam;
import javax.ws.rs.Consumes;
import javax.ws.rs.PUT;
import javax.ws.rs.Path;
import javax.ws.rs.GET;
import javax.ws.rs.Produces;
import javax.enterprise.context.RequestScoped;
import javax.ws.rs.QueryParam;
import logica.Calculadora1;
//libreria json
import org.json.simple.JSONObject;

/**
 * REST Web Service
 *
 * @author dact
 */
@Path("ws2calc1")
@RequestScoped
public class Ws2calc1 {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of Ws2calc1
     */
    public Ws2calc1() {
    }

    /**
     * Retrieves representation of an instance of ws.Ws2calc1
     * @return an instance of java.lang.String
     */
    /*
     * para retornar un json vamos a importar un libreria java
     */
    
    
    @GET
    @Produces("application/json")
    public JSONObject getResultado(@QueryParam("op")String op,@QueryParam("p1")int a,@QueryParam("p2")int b) {
        
        if(op.equals("+") ||op.equals(" ")){
        op="+";
        }
        int resultado=0;
        
        if(op.equals("+")){
            resultado = new Calculadora1().sumar(a, b);
        }
        if(op.equals("*")){
            resultado = new Calculadora1().multiplicar(a, b);
        }
        
        JSONObject obj = new JSONObject();

        obj.put("res", resultado);
        
        return obj;
        
    }

    /**
     * PUT method for updating or creating an instance of Ws2calc1
     * @param content representation for the resource
     * @return an HTTP response with content of the updated or created resource.
     */
    @PUT
    @Consumes("application/xml")
    public void putXml(String content) {
    }
}

