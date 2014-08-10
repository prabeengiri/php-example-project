<?php
/**
 * @author prabeen
 *
 * @file
 * Extending the Composite Object without altering the
 * its structure.
 */
namespace SampleApp\FolderTree;

interface VisitableInterface {

  /**
   *
   * @param Visitor $node
   */
  public function apply(Visitor $visitor);
}