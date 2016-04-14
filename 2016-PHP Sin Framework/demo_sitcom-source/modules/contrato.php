<?php 

class ContratoModel {
    
    function __construct(){
        $this->contrato_id = 0;
        $this->denominacion = '';
        $this->fecha = '';
    }

    function insert(){
        $sql = "INSERT INTO contrato (denominacion, fecha)
                VALUES (?,?)";
        $datos = array($this->denominacion, $this->fecha);
        $this->contrato_id = db($sql,$datos);
    }

    function select(){
        $sql = "SELECT denominacion, fecha
                FROM contrato 
                WHERE contrato_id = ?";
        $datos = array($this->contrato_id);

        $resultados = db($sql,$datos);

        foreach ($resultados[0] as $key => $value) {
            $this->$key = $value;
        }
    }

    function delete(){
        $sql = "DELETE FROM contrato WHERE contrato_id=?";
        $datos = array($this->contrato_id);
        db($sql,$datos);
    }
}


class ContratoView {
    
    function __construct(){
        # code...
    }

    function agregar(){
        $html = file_get_contents("static/html/contrato_agregar.html");
        $html_base = file_get_contents("static/html/base.html");

        $render = str_replace(
            "{CONTENIDO}", 
            $html, 
            $html_base);
        print $render;
    }

    function ver($contrato = null){
        $html = file_get_contents("static/html/contrato_ver.html");
        $html_base = file_get_contents("static/html/base.html");

        settype($contrato, 'array');
        $comodines = array_keys($contrato);
        $valores = array_values($contrato);

        foreach ($comodines as &$valor) $valor = "{{$valor}}";

        $render = str_replace(
            $comodines, 
            $valores, 
            $html);

        $render = str_replace(
            "{CONTENIDO}", 
            $render, 
            $html_base);
        print $render;
    }

    function listar($contratos){
        $html = file_get_contents("static/html/contrato_listar.html");
        $html_base = file_get_contents("static/html/base.html");

        $regex = "/<!--fila-->(.|\n){1,}<!--fila-->/";
        preg_match($regex, $html, $coincidencias);
        $fragmento_html = @$coincidencias[0];

        $html_aux = '';

        foreach ($contratos as $contrato) {
            settype($contrato, 'array');
            $comodines = array_keys($contrato);
            foreach($comodines as &$comodin) $comodin = "{" . $comodin . "}";
            $valores = array_values($contrato);
            $html_aux .= str_replace($comodines, $valores, $fragmento_html);
        }
        $render_contratos = str_replace($fragmento_html, $html_aux, $html);
        $html_base = file_get_contents("static/html/base.html");
        $render = str_replace(
            '{CONTENIDO}', 
            $render_contratos, 
            $html_base);
        print $render;

    }
        

    

    
}


class ContratoController {
    
    function __construct(){
        $this->model = new ContratoModel();
        $this->view = new ContratoView();
    }

    function agregar(){
        $this->view->agregar();
    }

    function guardar(){
        extract($_POST);

        $this->model->denominacion = $denominacion;
        $this->model->fecha = $fecha;
        $this->model->insert();
        header("Location: /contrato/ver/".$this->model->contrato_id);
    }

    function ver($id){
        $this->model->contrato_id = $id;
        $this->model->select();
        $this->view->ver($this->model);
        
    }

    function listar(){
        $contratos = new CollectorObject();
        $contratos->get('contrato');
        $this->view->listar($contratos->collection);        
    }

    function eliminar($id = 0){
        $this->model->contrato_id = $id;
        $this->model->delete();
        header("Location: /contrato/listar");

    }

}



















































// class ContratoModel {
    
//     function __construct(){
//         $this->contrato_id = 0;
//         $this->denominacion = '';
//         $this->fecha = '';
//     }

//     function insert(){

//     }

//     function select(){
//         $sql="SELECT denominacion, fecha
//               FROM contrato
//               WHERE contrato_id = ?
//         ";
//         $datos = array($this->contrato_id);

//         $resultados = db($sql,$datos);
//         foreach ($resultados[0] as $key => $value) {
//             $this->$key = $value;
//         }

//     }
// }

// class ContratoView {
    
//     function __construct(){
//         # code...
//     }
// }

// class ContratoController {
    
//     function __construct(){
//         # code...
//     }

//     function agregar(){
//         echo "Agregando contrato \o/";
//     }
// }

?>