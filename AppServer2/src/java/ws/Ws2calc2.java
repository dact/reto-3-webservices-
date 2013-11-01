/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package ws;

import javax.ws.rs.core.Context;
import javax.ws.rs.core.UriInfo;
import javax.ws.rs.Consumes;
import javax.ws.rs.PUT;
import javax.ws.rs.Path;
import javax.ws.rs.GET;
import javax.ws.rs.Produces;
import javax.enterprise.context.RequestScoped;
import javax.ws.rs.QueryParam;
import logica.Calculadora2;
import org.json.simple.JSONObject;

/**
 * REST Web Service
 *
 * @author dact
 */
@Path("ws2calc2")
@RequestScoped
public class Ws2calc2 {

    @Context
    private UriInfo context;

    /**
     * Creates a new instance of Ws2calc2
     */
    public Ws2calc2() {
    }

    /**
     * Retrieves representation of an instance of ws.Ws2calc2
     * @return an instance of java.lang.String
     */
        /*
     * para retornar un json vamos a importar un libreria java
     */
    
    
    @GET
    @Produces("application/json")
    public JSONObject getResultado(@QueryParam("op")String op,@QueryParam("p1")int a,@QueryParam("p2")int b) {
        System.out.print(op+a+b);
        int resultado=0;
        
        if(op.equals("-")){
            resultado = new Calculadora2().restar(a, b);
        }
        if(op.equals("/")){
            resultado = new Calculadora2().dividir(a, b);
        }
        
        JSONObject obj = new JSONObject();

        obj.put("res", resultado);
        
        return obj;
        
    }

    /**
     * PUT method for updating or creating an instance of Ws2calc2
     * @param content representation for the resource
     * @return an HTTP response with content of the updated or created resource.
     */
    @PUT
    @Consumes("application/xml")
    public void putXml(String content) {
    }
}
