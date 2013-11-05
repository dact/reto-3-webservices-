<?php

$file = "calcserver.xml";

if (file_exists($file)) {
    $xml = simplexml_load_file($file);

    //print_r($xml);

    if (!empty($_POST['calculadora-post'])) {
        //importamos nusoap webservice client soap
        require_once('lib/nusoap.php');
        $op = $_POST['op'];
        $a = $_POST['p1'];
        $b = $_POST['p2'];

        //sumar multiplicar
        //$xml->url[0]; AppServer1ws1 
        
        //restar dividir
        //$xml->url[2];   AppServer2 ws1

        if ($op == "+") {
            //conectandos al servicio
            $client = new SoapClient($xml->url[0], true);
            $result = $client->call("sumar", array('a' => $a, 'b' => $b));
        }
        if ($op == "*") {
            //conectandos al servicio
            $client = new SoapClient($xml->url[0], true);
            $result = $client->call("multiplicar", array('a' => $a, 'b' => $b));
        }
        if ($op == "-") {
            //conectandos al servicio
            $client = new SoapClient($xml->url[2], true);
            $result = $client->call("restar", array('a' => $a, 'b' => $b));
        }
        if ($op == "/") {
            //conectandos al servicio
            $client = new SoapClient($xml->url[2], true);
            $result = $client->call("dividir", array('a' => $a, 'b' => $b));
        }

        $palabra = (integer) $result['return'];

        echo $a . " " . $op . " " . $b . " = " . $palabra;
    }

    if (!empty($_GET['calculadora-get'])) {
        //importamos RESTclient  client rest
        $op = $_GET['op'];
        $a  = $_GET['p1'];
        $b  = $_GET['p2'];
        //sumar multiplicar
        //$xml->url[1]; AppServer1 ws2 
        
        //restar dividir
        //$xml->url[3];   AppServer2 ws2
        $response="";
        if($op=="+"){
            $response =  file_get_contents($xml->url[1]."op=$op&p1=$a&p2=$b");
        }
        
        if($op=="*"){
            $response = file_get_contents($xml->url[1]."op=$op&p1=$a&p2=$b");
        }
        if($op=="-"){
            $response =  file_get_contents($xml->url[3]."op=$op&p1=$a&p2=$b");
        }
        
        if($op=="/"){
            $response = file_get_contents($xml->url[3]."op=$op&p1=$a&p2=$b");
        }
        
        $resultado = json_decode($response, true);
        echo $a.$op.$b."=".$resultado["res"];
        
    }
} else {
    exit('Error abriendo ' . $file);
}
?>