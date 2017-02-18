<?php

// Routing
$routes = array(
  '/'      => 'views/home',
  '/about' => 'views/about',
);
route($routes);

function route($routes) {

  foreach ($routes as $path => $template) {
    if ($_SERVER[PATH_INFO] == $path) {
      include("$template.php");
      die();
    }
  }

  // 404 Response
  http_response_code(404);
  include('views/404.php');
  die();

}
