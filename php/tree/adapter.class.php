<?php
/**
 * @file
 * This converts the raw tree array into the
 * node object.
 */
namespace SampleApp\FolderTree;

class Adapter {
  private $tree = array();

  public function __construct(array $tree_array) {
    $this->tree = $tree_array;
  }


  public function _traverse() {
  }

}