<?php
/**
 * @file
 * Provides the basic methods that concrete composite
 * objects needs to have
 */
namespace SampleApp\FolderTree;

interface CompositeInterface {

  /**
   *
   */
  public function getId();

  /**
   *
   */
  public function getChildrens();

  /**
   *
   */
  public function hasChildren();

}
