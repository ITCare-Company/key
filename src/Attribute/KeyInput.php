<?php

declare(strict_types=1);

namespace Drupal\key\Attribute;

use Drupal\Component\Plugin\Attribute\Plugin;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Defines a key input attribute object.
 *
 * @see \Drupal\key\Annotation\KeyInput
 * @see \Drupal\key\Plugin\KeyPluginManager
 * @see plugin_api
 */
#[\Attribute(\Attribute::TARGET_CLASS)]
class KeyInput extends Plugin {

  /**
   * Constructs a KeyInput attribute.
   *
   * @param string $id
   *   The plugin ID of the key input.
   * @param \Drupal\Core\StringTranslation\TranslatableMarkup $label
   *   The human-readable name of the key input.
   * @param \Drupal\Core\StringTranslation\TranslatableMarkup|null $description
   *   (optional) The description of the key input.
   */
  public function __construct(
    public readonly string $id,
    public readonly TranslatableMarkup $label,
    public readonly ?TranslatableMarkup $description = NULL,
  ) {}

}
