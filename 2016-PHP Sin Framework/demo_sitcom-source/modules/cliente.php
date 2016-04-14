<?php 
require_once "contrato.php";

class ClienteModel{
    
    function __construct(ContratoModel $contrato = null){
        # Identificador
        $this->cliente_id = 0;
        # P. Simples
        $this->nombre = '';
        $this->run = '';
        # P. Compuestas
        $this->contrato = $contrato;
        # P. Colectoras
        $this->pedido_collection = array();
    }

    function add_pedido(PedidoModel $pedido = null){
        $this->pedido_collection[] = $pedido;
    }

    function insert(){
        $sql = "INSERT INTO cliente
                (nombre, run, contrato)
                VALUES (?, ?, ?);";
        $datos = array( $this->nombre,
                        $this->run,
                        $this->contrato);
        $this->cliente_id = db($sql,$datos);
    }

    function select(){
        $sql = "SELECT  nombre, run, contrato
                FROM cliente
                WHERE cliente_id = ?
                ";
        $datos = array($this->cliente_id);
        $resultados = db($sql,$datos);
        foreach ($resultados[0] as $key => $value) $this->$key = $value; 

        $contrato = new ContratoModel();
        $contrato->contrato_id = $this->contrato;
        $contrato->select();
        print_r($contrato);     
    }
}


class ClienteView{
    
    function __construct(){
        # code...
    }

    function agregar(){
        $html = file_get_contents("static/html/cliente_agregar.html");
        $html_base = file_get_contents("static/html/base.html");

        $render = str_replace(
                    "{CONTENIDO}", 
                    $html, 
                    $html_base);
        print_r($render);
    }

    function listar($clientes = array()){
        $html_base = file_get_contents("static/html/base.html");
        $html = file_get_contents("static/html/cliente_listar.html");

        $regex = "/<!--fila-->(.|\n){1,}<!--fila-->/";
        preg_match($regex, $html, $coincidencias);
        $fragmento_html = $coincidencias[0];

        $html_aux = '';

        foreach ($clientes as $cliente) {
            settype($cliente, 'array');
            $comodines = array_keys($cliente);
            foreach ($comodines as &$comodin) $comodin = "{" . $comodin . "}";
            $valores = array_values($cliente);
            $html_aux .= str_replace($comodines, $valores, $fragmento_html);
        }

        $render_clientes = str_replace($fragmento_html, $html_aux, $html);
        $html_base = file_get_contents("static/html/base.html");
        $render = str_replace(
            '{CONTENIDO}', 
            $render_clientes, 
            $html_base);
        print $render;
    }
}


class ClienteController{
    
    function __construct(){
        $this->model = new ClienteModel();
        $this->view = new ClienteView();
    }

    function agregar(){
        $this->view->agregar();
    }

    function guardar(){        
        extract($_POST);

        $this->model->nombre = $nombre;
        $this->model->run = $run;
        $this->model->contrato = $contrato;
        $this->model->insert();       
        header("Location: /cliente/ver/".$this->model->cliente_id);
    }

    function ver($id){
        $this->model->cliente_id = $id;
        $this->model->select();
        print_r($this->model);

    }

    function listar(){
        $clientes = new CollectorObject();
        $clientes->get('cliente');       
        $this->view->listar($clientes->collection);
    }
}






















































// require_once "contrato.php";
// class ClienteModel {
    
//     function __construct(Contrato $contrato = null){        
//         $this->cliente_id = 0;
//         $this->nombre = '';
//         $this->run = '';
//         $this->contrato = $contrato; 
//         $this->pedido_collection = array();
//     }

//     function add_pedido_collection(Pedido $obj = null){
//         $this->pedido_collection[] = $obj;
//     }

//     function insert(){
//         $sql = " INSERT INTO cliente
//                  (nombre, run, contrato)
//                  VALUES (?, ?, ?);
//             ";
//         $datos= array($this->nombre,$this->run,$this->contrato);
//         db($sql,$datos);
//     }

//     function select(){
//         $sql="SELECT nombre, run, contrato
//               FROM cliente
//               WHERE cliente_id = ?
//         ";
//         $datos = array($this->cliente_id);
//         $resultados = db($sql,$datos);        
//         foreach ($resultados[0] as $key => $value)$this->$key = $value;
            
//         $contrato = new ContratoModel();
//         $contrato->contrato_id = $this->contrato;
//         $contrato->select();
//         $this->contrato = $contrato;        
//     }

//     function delete(){
//         $sql = "DELETE FROM cliente WHERE cliente_id=?";
//         $datos = array($this->cliente_id);
//         db($sql,$datos);
//     }


// }

// class ClienteView {
    
//     function __construct(){
//         # code...
//     }

//     function agregar(){
//         $html = file_get_contents("static/html/cliente_agregar.html");
//         $html_base = file_get_contents("static/html/base.html");
//         $render = str_replace(
//             '{CONTENIDO}', 
//             $html, 
//             $html_base);
//         print $render;
//     }

//     function listar($clientes = array()){
//         $html = file_get_contents("static/html/cliente_listar.html");
        
//         $regex = "/<!--fila-->(.|\n){1,}<!--fila-->/";
//         preg_match($regex, $html, $coincidencias);
//         $fragmento_html = @$coincidencias[0];
        
//         $html_aux = '';

//         foreach($clientes as $cliente) {
//             $cliente->contrato = $cliente->contrato->denominacion;
//             unset($cliente->pedido_collection);
//             settype($cliente, 'array');
//             $comodines = array_keys($cliente);
//             foreach($comodines as &$comodin) $comodin = "{" . $comodin . "}";
//             $valores = array_values($cliente);
//             $html_aux .= str_replace($comodines, $valores, $fragmento_html);
//         }

//         $render_alumnos = str_replace($fragmento_html, $html_aux, $html);

//         $html_base = file_get_contents("static/html/base.html");
//         $render = str_replace(
//             '{CONTENIDO}', 
//             $render_alumnos, 
//             $html_base);
//         print $render;

//     }
// }

// class ClienteController {
    
//     function __construct(){
//         $this->model = new ClienteModel();
//         $this->view = new ClienteView;
//     }

//     function agregar(){
//         $this->view->agregar();
//     }

//     function guardar(){
//         extract($_POST);
//         $this->model->nombre = $nombre;
//         $this->model->run = $run;
//         $this->model->contrato = $contrato;
//         $this->model->insert();
//         header("Location: /cliente/listar");
//     }

//     function listar(){
//         $clientes = new CollectorObject();
//         $clientes->get('Cliente');
//         $this->view->listar($clientes->collection);
//     }

//     function eliminar($id){        
//         $this->model->cliente_id = $id;
//         $this->model->delete();
//         header("Location: /cliente/listar");

//     }
// }


?>