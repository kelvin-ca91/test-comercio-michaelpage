<?php
// Routes
date_default_timezone_set('Asia/Tehran');
$app->get('/', function ($request, $response, $args) {

    $data = file_get_contents("../public/employees.json");
    $employees = json_decode($data, true);
    // Render index view
    return $this->renderer->render($response, 'index.phtml', ['employees'=>$employees]);
});

$app->post('/', function ($request, $response, $args) {
    $data = file_get_contents("../public/employees.json");
    $employees = json_decode($data, true);
    $newEmployees = $employees;
    if(trim($_POST['search'])!=''){
      $newEmployees = [];
      foreach ($employees as $value) {
        if(strpos($value['email'], $_POST['search'], 1) || $value['email'] == $_POST['search']){
          $newEmployees[] = $value;
        }
      }
    }

    // Render index view
    return $this->renderer->render($response, 'index.phtml', ['employees'=>$newEmployees]);
});


$app->get('/{id}/show', function ($request, $response, $args) {
    $route = $request->getAttribute('route');
    $id = $route->getArgument('id');

    $data = file_get_contents("../public/employees.json");
    $employees = json_decode($data, true);
    // Render index view
    
    foreach ($employees as $row) {
      if($row['id'] == $id){
        $show = $row;
        $skills = '';
        foreach ($row['skills'] as $value) {
          $skills.=$value['skill'].', ';
        }
        $show['skills'] = $skills;
      }
    }
    return $this->renderer->render($response, 'detail.phtml', ['employees'=>$show]);
});