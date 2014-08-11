<?php
/**
 * @file
 * This converts the raw tree array into the
 * node object.
 */
namespace SampleApp\FolderTree;

class Adapter {

  private $tree;
  private $rootNode;

  public function __construct(array $treeArray) {
    $this->tree = $treeArray;
  }

  /**
   * Returns the children of the provided
   * tree node.
   *
   * @param int $nodeId
   * @return TreeNode
   */
  public function fetchChildren($treeNodeId) {
    $treeNode = $this->fetchNodeById($treeNodeId);
    return $this->_attach($treeNode);
  }

  /**
   * Create node out of individual item array.
   *
   * @param array $item
   * @return \SampleApp\FolderTree\TreeNode
   */
  private function createNode($item) {
    return new TreeNode($item);
  }

  /**
   * Fetch the TreeNode Object
   * from the item array by its nodeId
   *
   * @param int $id
   * @return \SampleApp\FolderTree\TreeNode
   */
  private function fetchNodeById($id) {
    foreach($this->tree as $item) {
      if ($item['nodeId'] == $id) {
        return $this->createNode($item);
      }
    }
    throw new \SampleApp\FolderTree\Exception\FolderTreeException("Node id '$id' not found in the item array.");
  }

  /**
   *
   */
  private function _attach(TreeNode $node) {

  }
}
