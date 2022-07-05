<?php

spl_autoload_register(function ($class) {
  $prefix = 'php\\';

  $length = strlen($prefix);

  $base_directory = __DIR__ . '/php/models/';

  if (strncmp($prefix, $class, $length) !== 0) {
    return;
  }

  $relative_class = substr($class, $length);

  $file = $base_directory . str_replace('\\', '/', $relative_class) . 'php';

  if (file_exists($file)) {
    require $file;
  }
});