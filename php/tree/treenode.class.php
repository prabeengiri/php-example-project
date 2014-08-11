<?php
/**
 * @file
 * This contains the node class which represents each
 * individual item of the tree.
 */
namespace SampleApp\FolderTree;

use SampleApp\FolderTree\CompositeInterface;
use SampleApp\FolderTree\VisitableInterface;

class TreeNode implements CompositeInterface, VisitableInterface {
  private $nodeId;
  private $type;
  private $title;
  private $parentId;
  private $children = array();

  /**
   * Construct the node.
   *
   * @param associative array $node_array
   *   - nodeId int Unique NodeId
   *   - type string Node type
   *   - title string Title of the Node
   *   - parentId int Id of the Parent
   */
  public function __construct(array $nodeArray) {
    if ($this->isValid($nodeArray)) {
      $this->nodeId = $nodeArray['nodeId'];
      $this->type = $nodeArray['type'];
      $this->title = $nodeArray['title'];
      $this->parentId = $nodeArray['parentId'];
    } else {
      var_dump($nodeArray);
      throw new \InvalidArgumentException("Invalid node array");
    }
  }

  /**
   * Check if array provided to construct this object
   * is valid or not.
   */
  private function isValid(array $nodeArray) {
    if ( !isset($nodeArray['nodeId']) || empty($nodeArray['nodeId'])
      || !isset($nodeArray['type']) || empty($nodeArray['type'])
      || !isset($nodeArray['title']) || empty($nodeArray['title'])
      //|| !isset($nodeArray['parentId']) || empty($nodeArray['parentId'])
    ) {
      return FALSE;
    }
    return TRUE;
  }

  /**
   * Returns whether the node has children.
   *
   * @return bool
   */
  public function hasChildren() {
    return (count($this->children) > 0) ? true : false;
  }

  /**
   * Returns the children of the node
   *
   * @return Node
   */
  public function getChildrens() {
    return $this->children;
  }

  /**
   * Add children
   * @param Node $children
   */
  public function setChildren(TreeNode $children) {
    $this->children[] = $children;
  }

  /**
   * Returns the parent node of the node
   *
   * @return Node
   */
  public function getParentId() {
    return $this->parentId;
  }

  /**
   * Returns the id of the node
   *
   * @return int
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Returns the title of the node
   *
   * @return int
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * Let other object extend the functionality
   */
  public function accept(Visitor $visitor) {
    $visitor->visit($this);
  }
}
