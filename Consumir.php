<?php
    //TODO! Ruta (ARCHIVO) desde servidor wampp
    $location = "http://localhost:8080/docs/p/php/soap-service/InsertCategoria.php?wsdl";

    //TODO Estructura de peticion SOAP
    $request = "<soapenv:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:ins=\"InsertCategoriaSOAP\">
    <soapenv:Header/>
    <soapenv:Body>
        <ins:InsertCategoriaService soapenv:encodingStyle=\"http://schemas.xmlsoap.org/soap/encoding/\">
            <InsertCategoria xsi:type=\"ins:InsertCategoria\">
                <!--You may enter the following 3 items in any order-->
                <usr_nom xsi:type=\"xsd:string\">Consumo Prueba 3</usr_nom>
                <usr_ape xsi:type=\"xsd:string\">Consumo Prueba Ape 3</usr_ape>
                <usr_correo xsi:type=\"xsd:string\">ConsumoPrueba3@correo3.com</usr_correo>
            </InsertCategoria>
        </ins:InsertCategoriaService>
        </soapenv:Body>
    </soapenv:Envelope>
    ";

    print("Request: </br>");
    print("<pre>".htmlentities($request)."</pre>"); //Imprimimmos el request //htmlentities() para que no se vea el codigo fuente

    $action = "InsertCategoriaService"; //Accion del WS

    $headers = //Datos del header (encabezado)
    [
        'Method: POST',
        'connection: Keep-Alive',
        'User-Agent: PHP-SOAP-CURL',
        'Content-Type: text/xml; charset=utf-8', //TODO? Tipo de contenido enviar almenenos esto para que funcione.
        'SOAPAction:InsertCategoriaService'
    ];

    //TODO* Consumo de WS a travez de CURL     
    //Segun Documentacion
    //https://www.php.net/manual/es/function.curl-setopt.php
        //TODO! Inicializamos el curl en la ruta del WS (wsdl)
        $ch = curl_init($location); 
        //TODO?: seteamos las opciones del curl
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        $response = curl_exec($ch);
        $err_status = curl_errno($ch);

        //TODO* IMPRIMIMOS EL RESPONSE
        print("Request: </br>");
        print("<pre>".$request."</pre>");
?>