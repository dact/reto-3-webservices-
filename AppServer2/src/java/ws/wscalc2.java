/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package ws;

import javax.jws.WebService;
import javax.jws.WebMethod;
import javax.jws.WebParam;
import logica.Calculadora2;

/**
 *
 * @author dact
 */
@WebService(serviceName = "wscalc2")
public class wscalc2 {

    /**
     * This is a sample web service operation
     */
    @WebMethod(operationName = "restar")
    public int restar(@WebParam(name = "a") int a,@WebParam(name = "b") int b) {
        return new Calculadora2().restar(a, b);
    }
    
    @WebMethod(operationName = "dividir")
    public int dividir(@WebParam(name = "a") int a,@WebParam(name = "b") int b) {
        return new Calculadora2().dividir(a, b);
    }
}
