<?php

function get_title() {
  $title = 'Timson Dev';
  $titles = array('/about' => 'About');
  foreach ($titles as $path => $page_name) {
    if ($_SERVER[PATH_INFO] == $path) {
      $title = $title . ' | ' . $page_name;
    }
  }
  return $title;
}

function get_menu() {
  $menu = array(
    '/'      => 'Home',
    '/about' => 'About'
  );

  $menu_html = '';
  foreach ($menu as $path => $name) {
    $active_class = $_SERVER[PATH_INFO] == $path ? 'active' : '';
    $menu_html .= "<li class='$active_class'><a href='$path'>$name</a></li>";
  }

  return $menu_html;
}
