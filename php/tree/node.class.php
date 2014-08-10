<?php
/**
 * @file
 * This contains the node class which represents each
 * individual item of the tree.
 */
namespace SampleApp\FolderTree;

use SampleApp\FolderTree\CompositeInterface;
use SampleApp\FolderTree\VisitableInterface;
use Doctrine\ORM\Query\AST\Node;

class Node implements CompositeInterface, VisitableInterface{
  private $nodeId;
  private $type;
  private $title;
  private $parent;
  private $children = array();

  /**
   * Construct the node.
   *
   * @param array $node_array
   */
  public function __construct(array $node_array) {
    $this->nodeId = $node_array['nodeId'];
    $this->type = $node_array['type'];
    $this->title = $node_array['title'];
    $this->parentid = $node_array['parent'];
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
  public function getChildren() {
    return $this->children;
  }

  /**
   * Add children
   * @param Node $children
   */
  public function setChildren(Node $children) {
    $this->children = $children;
  }

  /**
   * Returns the parent node of the node
   *
   * @return Node
   */
  public function getParent() {
    return $this->_parent;
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
