<?php

namespace Drupal\recipes;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityChangedInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Recipe entity entities.
 *
 * @ingroup recipes
 */
interface RecipeEntityInterface extends ContentEntityInterface, EntityChangedInterface, EntityOwnerInterface {

  // Add get/set methods for your configuration properties here.

  /**
   * Gets the Recipe entity name.
   *
   * @return string
   *   Name of the Recipe entity.
   */
  public function getName();

  /**
   * Sets the Recipe entity name.
   *
   * @param string $name
   *   The Recipe entity name.
   *
   * @return \Drupal\recipes\RecipeEntityInterface
   *   The called Recipe entity entity.
   */
  public function setName($name);

  /**
   * Gets the Recipe entity creation timestamp.
   *
   * @return int
   *   Creation timestamp of the Recipe entity.
   */
  public function getCreatedTime();

  /**
   * Sets the Recipe entity creation timestamp.
   *
   * @param int $timestamp
   *   The Recipe entity creation timestamp.
   *
   * @return \Drupal\recipes\RecipeEntityInterface
   *   The called Recipe entity entity.
   */
  public function setCreatedTime($timestamp);

  /**
   * Returns the Recipe entity published status indicator.
   *
   * Unpublished Recipe entity are only visible to restricted users.
   *
   * @return bool
   *   TRUE if the Recipe entity is published.
   */
  public function isPublished();

  /**
   * Sets the published status of a Recipe entity.
   *
   * @param bool $published
   *   TRUE to set this Recipe entity to published, FALSE to set it to unpublished.
   *
   * @return \Drupal\recipes\RecipeEntityInterface
   *   The called Recipe entity entity.
   */
  public function setPublished($published);

}
