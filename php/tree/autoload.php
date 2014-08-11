<?php
use SampleApp\FolderTree;

/**
 * Each namespace is required to have its own autoload.
 * Otherwise it will create adding namespace in the class name if
 * object is created referencing to the namespace directly.
 */
spl_autoload_register(__NAMESPACE__ . '\sampleAppAutoLoader');

/**
 * SPL Autoload callback.
 */
function sampleAppAutoLoader($className) {
  $class = explode("\\", $className);
  $class = strtolower(end($class));
  if (preg_match('#interface#i', $class)) {
    include "tree/" . str_replace('interface', '', $class) . ".interface.php";
  }
  else if (preg_match('#abstract#i', $class)) {
    include "tree/" . str_replace('abstract', '', $class) . ".abstract.php";
  }
  else {
    include "tree/" . $class . ".class.php";
  }
}
