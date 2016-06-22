<?php

namespace Drupal\recipes\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Recipe entity entities.
 */
class RecipeEntityViewsData extends EntityViewsData implements EntityViewsDataInterface {

  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['recipe']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Recipe entity'),
      'help' => $this->t('The Recipe entity ID.'),
    );

    return $data;
  }

}
