<?php
require "../vendor/autoload.php";

require "tree/autoload.php";

//use SampleApp\FolderTree;

// Load the ORM
//require "orm/RedBeanPHP4_0_8/rb.php";

// Get the Data from the Database
//@todo Get the data through the ORM and change the config in different page.
try {
  $dbh = new PDO('mysql:host=localhost;dbname=sample_project', "root", "");
  $stmt = $dbh->query('SELECT * from FolderTree');
  $stmt->execute();
  $tree_array = $stmt->fetchAll(PDO::FETCH_OBJ);

} catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
}

// Get the Node Object.
$nodeTree = new \SampleApp\FolderTree\Adapter($tree_array);
$node = $nodeTree->fetchChildren(1);

// output as the JSON String.
print $node->accept(new \SampleApp\FolderTree\Visitor\JsonVisitor());
