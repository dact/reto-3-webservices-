/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package ws;
import logica.Calculadora1;

import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;

/**
 *
 * @author dact
 */
@WebService(serviceName = "wscalc1")
public class wscalc1 {

    /**
     * This is a sample web service operation
     */
    @WebMethod(operationName = "sumar")
    public int sumar(@WebParam(name = "a") int a,@WebParam(name = "b") int b) {
        return new Calculadora1().sumar(a, b);
    }
    
    @WebMethod(operationName = "multiplicar")
    public int multiplicar(@WebParam(name = "a") int a,@WebParam(name = "b") int b) {
        return new Calculadora1().multiplicar(a, b);
    }
}
