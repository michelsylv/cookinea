<?php

namespace Drupal\test_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'ingredient' field type.
 *
 * @FieldType(
 *   id = "ingredient",
 *   label = @Translation("Ingredient"),
 *   description = @Translation("Stores quantity, unity and ingredient for recipes."),
 *   default_widget = "ingredient_default",
 *   default_formatter = "ingredient_inline",
 * )
 */
class IngredientItem extends FieldItemBase implements FieldItemInterface{


    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition){
        $properties['quantity'] = DataDefinition::create('float')
            ->setLabel(t('Quantity'));

        $properties['unity'] = DataDefinition::create('string')
            ->setLabel(t('ISBN-10'));

        return $properties;
    }

    public static function schema(FieldStorageDefinitionInterface $field_definition){
        return array(
            'columns' => array(
                'quantity' => array(
                    'description' => 'the quantity',
                    'type' => 'float',
                ),
                    'unity' => array(
                        'description' => 'The ID of the target entity.',
                        'type' => 'int',
                        'unsigned' => TRUE,
                    ),
                'ingredient' => array(
                    'description' => 'The ID of the target entity.',
                    'type' => 'int',
                    'unsigned' => TRUE,
                ),
            ),
        );
    }
    public function isEmpty() {
        $value_10 = $this->get('isbn_10')->getValue();
        $value_13 = $this->get('isbn_13')->getValue();
        return empty($value_13) && empty($value_10);
    }

    public function getIsbn(){
        if ($this->get('isbn_10')->getValue()){
            return $this->get('isbn_10')->getValue();
        }
        return $this->get('isbn_13')->getValue();
    }

    public static function mainPropertyName() {
        return 'isbn_13';
    }
}