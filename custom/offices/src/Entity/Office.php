<?php

namespace Drupal\offices\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Defines the Office entity.
 *
 * @ContentEntityType(
 *   id = "office",
 *   label = @Translation("Office"),
 *   base_table = "office",
 *   entity_keys = {
 *     "id" = "id",
 *     "uuid" = "uuid",
 *   },
 * )
 */
class Office extends ContentEntityBase {

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = [];

    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(new TranslatableMarkup('ID'))
      ->setDescription(new TranslatableMarkup('The ID of the Office entity.'))
      ->setReadOnly(TRUE);

    $fields['uuid'] = BaseFieldDefinition::create('uuid')
      ->setLabel(new TranslatableMarkup('UUID'))
      ->setDescription(new TranslatableMarkup('The UUID of the Office entity.'))
      ->setReadOnly(TRUE);

    // Add more fields as needed (office name, county, address, phone, email).
    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Office Name'))
      ->setDescription(new TranslatableMarkup('The name of the office.'))
      ->setRequired(TRUE);

    $fields['county'] = BaseFieldDefinition::create('string')
      ->setLabel(new TranslatableMarkup('County'))
      ->setDescription(new TranslatableMarkup('The county of the office.'))
      ->setRequired(TRUE);

    $fields['address'] = BaseFieldDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Address'))
      ->setDescription(new TranslatableMarkup('The address of the office.'))
      ->setRequired(TRUE);

    $fields['phone'] = BaseFieldDefinition::create('string')
      ->setLabel(new TranslatableMarkup('Phone'))
      ->setDescription(new TranslatableMarkup('The phone number of the office.'))
      ->setRequired(TRUE);

    $fields['email'] = BaseFieldDefinition::create('email')
      ->setLabel(new TranslatableMarkup('Email'))
      ->setDescription(new TranslatableMarkup('The email address of the office.'))
      ->setRequired(TRUE);

    return $fields;
  }

  // Define methods to retrieve field values.
  public function getName() {
    return $this->get('name')->value;
  }

  public function getCounty() {
    return $this->get('county')->value;
  }

  public function getAddress() {
    return $this->get('address')->value;
  }

  public function getPhone() {
    return $this->get('phone')->value;
  }

  public function getEmail() {
    return $this->get('email')->value;
  }

}
