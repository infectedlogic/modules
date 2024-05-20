<?php

namespace Drupal\offices;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;

/**
 * Provides a list controller for the office entity type.
 */
class OfficeListBuilder extends EntityListBuilder {
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['name'] = $this->t('Office name');
    $header['county'] = $this->t('County');
    $header['address'] = $this->t('Address');
    $header['phone'] = $this->t('Phone');
    $header['email'] = $this->t('Email');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var \Drupal\offices\Entity\Office $entity */
    $row['name'] = $entity->label();
    $row['county'] = $entity->get('county')->value;
    $row['address'] = $entity->get('address')->value;
    $row['phone'] = $entity->get('phone')->value;
    $row['email'] = $entity->get('email')->value;
    return $row + parent::buildRow($entity);
  }
}
