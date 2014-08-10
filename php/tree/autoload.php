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
  include "tree/" . strtolower(end($class)) . ".class.php";
}
