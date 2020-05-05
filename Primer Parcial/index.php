<?php
include_once "./clases/usuario.php";
include_once "./clases/pizza.php";
//echo json_encode($_SERVER);
$request_method = $_SERVER['REQUEST_METHOD'];
$operation = $_SERVER['PATH_INFO'];

if($request_method == 'POST'){
    switch($operation){
        case '/usuario':
            echo "Registrar a un cliente con emaill, clave y tipo (encargado, cliente) y guardarlo en el archivo users.xxx.";
            $userArray = array($_POST['email'],$_POST['clave'],$_POST['tipo']);
            $user = new usuario($userArray);
            usuario::Guardar($user);   
            break;
        case '/login':
            echo "Recibe email y clave y si son correctos devuelve un JWT, de lo contrario informar lo sucedido.";
            usuario::ValidarUsuario($_POST['nombre'],$_POST['clave']);
            break;
        case '/pizzas':
            $pizzaArray = array($_POST['tipo'],$_POST['precio'],$_POST['stock'],$_POST['sabor'],$_FILES["foto"]['tmp_name']);
            
            $pizza = new pizza($pizzaArray);
            var_dump(json_encode($pizza));
            //pizza::Guardar($pizza);
            break;
        case '/ventas':
            echo "(Solo clientes) Recibe tipo y sabor y si existe esa combinación y hay stock devuelve el
            monto total de la operación. Si se realiza la venta restar el stock a la pizza y guardar la venta archivo
            ventas.xxx el email, tipo, sabor, monto y fecha.";
            break;  
        default:
            echo "No se encuentra operacion de este tipo";
    }
}
else if ($request_method == 'GET'){
    switch($operation){
        case '/pizzas':
            
            $respuesta = new stdClass;
            $datos = array(pizza::TraerTodosLosProductos());
            $respuesta->data = $datos;
            echo json_encode($respuesta);
            break;
        case '/ventas':
            echo "Si es encargado muestra el monto total y la cantidad de las ventas, si es cliente solo las
            compras de dicho usuario.";
            break;
        default:
            echo "No se encuentra operacion de este tipo";

    }
    
}else{
    echo "405 method not allowed";
}
?>