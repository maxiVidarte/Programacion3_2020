<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->setBasePath('/Programacion3_2020/Practica Primer Parcial');

$app->post('/usuario', function (Request $request, Response $response, $args) {
    $headers = $request->getHeaders();
    $body = $request->getParsedBody();
    $files = $request->getUploadedFiles();
    //echo $body2;
    $rta = array ( "success"=> true, "data"=> $args, "body"=>$body,"files"=>$files);
    $response->getBody()->write(json_encode($rta));
    return $response
    ->withHeader("Content-type","application/json")
    ->withStatus(200);
});
$app->post('/login/{id}', function (Request $request, Response $response, $args) {
    
    $queryStrings = $request->getQueryParams();
    $rta = array("success"=> true, "data"=>$args , "query"=> $queryStrings);
   //$rta = array("success"=> true , "data" => $args);
    $rtajson = json_encode($rta);
    $response->getBody()->write($rtajson);
    return $response
    ->withHeader("Content-type","application/json")
    ->withStatus(200);

});
$app->post('/stock', function (Request $request, Response $response, $args) {
    
    $response->getBody()->write("Hello world!");
    return $response;
});
$app->get('/stock', function (Request $request, Response $response, array $args) {
    $rta = array("success"=> true , "data" => $args);
    $rtajson = json_encode($rta);
    $response->getBody()->write($rtajson);
    return $response
    ->withHeader("Content-type","application/json");
});
$app->post('/ventas', function (Request $request, Response $response, $args) {
    
    $response->getBody()->write("Hello world!");
    return $response;
});
$app->get('/ventas', function (Request $request, Response $response, $args) {
    
    $response->getBody()->write("Hello world!");
    return $response;
});






$app->run();


?>