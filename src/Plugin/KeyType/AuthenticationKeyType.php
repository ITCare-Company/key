<?php

namespace Drupal\key\Plugin\KeyType;

use Drupal\Core\Form\FormStateInterface;
use Drupal\key\Plugin\KeyTypeBase;

/**
 * Defines a generic key type for authentication.
 *
 * @KeyType(
 *   id = "authentication",
 *   label = @Translation("Authentication"),
 *   description = @Translation("A generic key type to use for a password or API key that does not belong to any other defined key type."),
 *   group = "authentication",
 *   key_value = {
 *     "plugin" = "text_field"
 *   }
 * )
 */
class AuthenticationKeyType extends KeyTypeBase {

  /**
   * {@inheritdoc}
   */
  public static function generateKeyValue(array $configuration) {
    // The password_generator service was introduced in Drupal 9.1.0 and Key
    // currently supports versions of Drupal below 9.1.0, so ensure that the
    // password_generator service exists before calling it and provide a
    // fallback for backward compatibility.
    // @todo Remove the check for the password_generator service and the
    // fallback once Key no longer supports versions of Drupal below 9.1.0.
    if (\Drupal::getContainer()->has('password_generator')) {
      $password = \Drupal::service('password_generator')->generate(16);
    }
    else {
      // Reproduce the functionality of the password_generator service.
      // @see \Drupal\Core\Password\DefaultPasswordGenerator::generate()
      $allowed_chars = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';
      $max = strlen($allowed_chars) - 1;
      $length = 16;
      $password = '';
      for ($i = 0; $i < $length; $i++) {
        $password .= $allowed_chars[random_int(0, $max)];
      }
    }

    return $password;
  }

  /**
   * {@inheritdoc}
   */
  public function validateKeyValue(array $form, FormStateInterface $form_state, $key_value) {
    // Validation of the key value is optional.
  }

}
