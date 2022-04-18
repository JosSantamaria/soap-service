<?php
/** CREACION DE ESTRUCTURA DE WS CATEGORIA */

    /** //TODO Ruta de la clase econea/nusoap  */
    require_once "vendor/econea/nusoap/src/nusoap.php";

    /** //TODO? Nombre sel Servicio Web */
    $namespace = "InsertCategoriaSOAP";
    //TODO! Creacion del server SOAP
    $server = new soap_server(); 
    //TODO* Configuracion del WSDL
    $server->configureWSDL("InsertCategoria", $namespace);
    //TODO* Configuracion del namespace 
    $server->wsdl->schemaTargetNamespace = $namespace; 

    //TODO? Estructura / Configuracion del tipo de datos
    $server->wsdl->addComplexType( 
        'InsertCategoria',
        'complexType',
        'struct',
        'all',
        '',
        array(
                'usr_nom' => array('name' => 'usr_nom', 'type' => 'xsd:string'),
                'usr_ape' => array('name' => 'usr_ape', 'type' => 'xsd:string'),
                'usr_correo' => array('name' => 'usr_correo', 'type' => 'xsd:string')
            )
    );


    //TODO! Estructura de respuesta del WS
    $server->wsdl->addComplexType( 
        'response',
        'complexType',
        'struct',
        'all',
        '',
        array(
                'Resultado' => array('name' => 'Resultado', 'type' => 'xsd:boolean'),
            )
    );


    //TODO* Funciones del WS
    //TODO registro de categoria.
    $server->register(
        "InsertCategoriaService",
        array("InsertCategoria" => "tns:InsertCategoria"),
        array("InsertCategoria" => "tns:response"),
        $namespace,
        false,
        'rpc',
        'encoded',
        'Inserta una categoria'
    );

    //TODO! Funcion de registro de categoria
    function InsertCategoriaService($request){
        require_once "config/conexion.php";
        require_once "models/mdl_Usuario.php";

        $usuario = new Usuario();
        $usuario->insert_usuario( $request['usr_nom'], $request['usr_ape'], $request['usr_correo']);

        return array(
            'Resultado' => true
        );
    }

    $POST_DATA = file_get_contents("php://input");
    $server->service($POST_DATA);
    exit();
?>