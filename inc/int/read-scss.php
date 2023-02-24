<?php
  // Set the path to your Sass variables file
  $variables_file = 'assets/scss/core/components/_variables.scss';
  
  // Read the variables from the file
  $variables = array();
  $file_handle = fopen($variables_file, 'r');
  if ($file_handle) {
    while (!feof($file_handle)) {
      $line = fgets($file_handle);
      if (preg_match('/^\$(.*):\s*(.*);/', $line, $matches)) {
        $variables[$matches[1]] = $matches[2];
      }
    }
    fclose($file_handle);
  }
?>
