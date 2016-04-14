function suprimir_fila_producto_actual(obj) {
    var contenedor = document.getElementById('contenedorDeProductosActuales');
    var filaproducto = obj.parentNode.parentNode;
    contenedor.removeChild(filaproducto);
    var filasviejas = document.getElementsByName('filaProductoActual').length;
    var filasnuevas = document.getElementsByName('filaProducto').length;
    if(filasnuevas == 1 && filasviejas == 0) {
        document.getElementsByName('btnSuprimir')[0].disabled = true;
    }
}


function agregar_fila() {
    document.getElementsByName('btnSuprimir')[0].disabled = false;
    var filaproducto = document.getElementsByName('filaProducto')[0];
    var clon = filaproducto.cloneNode(true);
    document.getElementById('contenedorDeProductos').appendChild(clon);
    var ultimo_campo_cantidad = document.getElementsByName('cantidades[]');
    var indice = ultimo_campo_cantidad.length - 1;
    ultimo_campo_cantidad[indice].value = '1';
}


function suprimir_fila_producto_nuevo(obj) {
    var contenedor = document.getElementById('contenedorDeProductos');
    var filaproducto = obj.parentNode.parentNode;
    var filas = document.getElementsByName('filaProducto');
    if(filas.length > 1) contenedor.removeChild(filaproducto);
    if(filas.length == 1) {
        document.getElementsByName('btnSuprimir')[0].disabled = true;
    }
}