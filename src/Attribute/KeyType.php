<?php

declare(strict_types=1);

namespace Drupal\key\Attribute;

use Drupal\Component\Plugin\Attribute\Plugin;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Defines a key type attribute object.
 *
 * @see \Drupal\key\Annotation\KeyType
 * @see \Drupal\key\Plugin\KeyPluginManager
 * @see plugin_api
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class KeyType extends Plugin {

  /**
   * Constructs a KeyType attribute.
   *
   * @param string $id
   *   The plugin ID of the key type.
   * @param \Drupal\Core\StringTranslation\TranslatableMarkup $label
   *   The human-readable name of the key type.
   * @param \Drupal\Core\StringTranslation\TranslatableMarkup|null $description
   *   (optional) The description of the key type.
   * @param string $group
   *   (optional) The group to which this key type belongs.
   * @param array $key_value
   *   (optional) The settings to use when a key value can be submitted.
   * @param array $multivalue
   *   (optional) The fields available in keys with multiple values.
   */
  public function __construct(
    public readonly string $id,
    public readonly TranslatableMarkup $label,
    public readonly ?TranslatableMarkup $description = NULL,
    public readonly string $group = 'none',
    public readonly array $key_value = [
      'plugin' => 'text_field',
    ],
    public readonly array $multivalue = [
      'enabled' => FALSE,
      'fields' => [],
    ],
  ) {}

}
