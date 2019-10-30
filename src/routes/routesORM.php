<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use App\Models\ORM\cd;
use App\Models\ORM\cdApi;


include_once __DIR__ . '/../../src/app/modelORM/cd.php';
include_once __DIR__ . '/../../src/app/modelORM/cdControler.php';

return function (App $app) {
    $container = $app->getContainer();

     $app->group('/cdORM', function () {   
         
        $this->get('/', function ($request, $response, $args) {
          //return cd::all()->toJson();
          $todosLosCds=cd::all();
          $newResponse = $response->withJson($todosLosCds, 200);  
          return $newResponse;
        });

        $this->get('/buscar/', function ($request, $response, $args) {
            //return cd::all()->toJson();
            // $parmqry = $request->getQueryParams();
            // var_dump($parmqry);
            // $id = $parmqry['id'];
            $unCD = cd::find(2);
            var_dump($unCD);
            // $newResponse = $response->withJson($unCD, 200);  
            // return $newResponse;
          });
    });


     $app->group('/cdORM2', function () {   

        $this->get('/',cdApi::class . ':traerTodos');
   
    });

};