<?php

namespace Drupal\recipes;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Recipe entity entity.
 *
 * @see \Drupal\recipes\Entity\RecipeEntity.
 */
class RecipeEntityAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\recipes\RecipeEntityInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished recipe entity entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published recipe entity entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit recipe entity entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete recipe entity entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add recipe entity entities');
  }

}
