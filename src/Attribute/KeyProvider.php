<?php

declare(strict_types=1);

namespace Drupal\key\Attribute;

use Drupal\Component\Plugin\Attribute\Plugin;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Defines a key provider attribute object.
 *
 * @see \Drupal\key\Annotation\KeyProvider
 * @see \Drupal\key\Plugin\KeyPluginManager
 * @see plugin_api
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class KeyProvider extends Plugin {

  /**
   * Constructs a KeyProvider attribute.
   *
   * @param string $id
   *   The plugin ID of the key provider.
   * @param \Drupal\Core\StringTranslation\TranslatableMarkup $label
   *   The human-readable name of the key provider.
   * @param \Drupal\Core\StringTranslation\TranslatableMarkup|null $description
   *   (optional) The description of the key provider.
   * @param string|null $storage_method
   *   (optional) The storage method of the key provider.
   *   Deprecated in key:1.18.0 and removed from key:2.0.0, use $tags instead.
   *   @see https://www.drupal.org/node/3364701
   * @param array $tags
   *   (optional) The key provider tags, used for classification and
   *   filtering.
   * @param array $key_value
   *   (optional) The settings for inputting a key value.
   */
  public function __construct(
    public readonly string $id,
    public readonly TranslatableMarkup $label,
    public readonly ?TranslatableMarkup $description = NULL,
    public readonly ?string $storage_method = NULL,
    public readonly array $tags = [],
    public readonly array $key_value = [
      'accepted' => FALSE,
      'required' => FALSE,
    ],
  ) {}

}
