<?php

namespace Drupal\jeditable\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'text_default' formatter.
 *
 * @FieldFormatter(
 *   id = "jeditable_textfield",
 *   label = @Translation("jEditable textfield"),
 *   field_types = {
 *     "text",
 *     "text_long",
 *     "text_with_summary",
 *   "number_integer",
 *    "number_decimal",
 *    "number_float",
 *    "list_boolean",
 *    "list_integer",
 *   "list_float",
 *   "list_text",
 *   },
 *   quickedit = {
 *     "editor" = "plain_text"
 *   }
 * )
 */
class JeditableTextfieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return array(
      'trim_length' => '600',
    ) + parent::defaultSettings();

//    return array(
//        'settings' => array(
//          'fallback_format' => NULL,
//          'fallback_settings' => array(),
//          'empty_text' => '--',
//        ),
//      );
  }



  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = array();

    dpm("hello");
    // The ProcessedText element already handles cache context & tag bubbling.
    // @see \Drupal\filter\Element\ProcessedText::preRenderText()
    foreach ($items as $delta => $item) {
      $elements[$delta] = array(
        '#type' => 'processed_text',
        '#text' => $item->value,
        '#format' => $item->format,
        '#langcode' => $item->getLangcode(),
      );
    }

    $theme = array(
      '#theme' =>'jeditable_formatter_jeditable',
      );
return $theme;
    $theme = [
      '#theme' => 'jeditable_formatter_jeditable',
      ];
    $render = $theme;
    dpm("theme");
    dpm($render);
    foreach ($items as $delta => $item) {
//      $field_delta = isset($display['views_field']) ? $display['views_field']->options['delta_offset'] + $delta : $delta;
//      $elements[$delta] = array(
//        '#markup' => theme('jeditable_formatter_jeditable', array(
//          'element' => $item,
//          'field' => $instance,
//          'entity' => $entity,
//          'entity_type' => $entity_type,
//          'widget_type' => $widget_type,
//          'delta' => $field_delta
//        )),
//      );
//
//
//      if (user_access('use jeditable')) {
    $elements[$delta]['#attached']['library'][] = 'jeditable/jeditable.admin';

//        $elements[$delta]['#attached'] = array(
//          'js' => array(
//            $path . '/jquery.jeditable.mini.js',
//            $path . '/drupal_jeditable.js',
//          ),
//          'css' => array(
//            $path . '/jeditable.css',
//          ),
//        );
//      }
    }
//
//
//    $element['trim_length'] = array(
//      '#title' => t('Trimmed limit'),
//      '#type' => 'number',
//      '#field_suffix' => t('characters'),
//      '#default_value' => $this->getSetting('trim_length'),
//      '#description' => t('If the summary is not set, the trimmed %label field will end at the last full sentence before this character limit.', array('%label' => $this->fieldDefinition->getLabel())),
//      '#min' => 1,
//      '#required' => TRUE,
//    );

    return $elements;
  }

}
