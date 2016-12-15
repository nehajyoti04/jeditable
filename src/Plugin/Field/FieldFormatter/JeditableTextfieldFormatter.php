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
 *     "number_integer",
 *     "number_decimal",
 *     "number_float",
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

//    $node = \Drupal::routeMatch()->getParameter('node');
//    dpm("node");
//    dpm($node);

    $node_id = \Drupal::routeMatch()->getRawParameter('node');




//    $elements[$delta] = [
//      '#type' => 'inline_template',
//      '#template' => '{{ value|nl2br }}',
//      '#context' => ['value' => $item->value],
//    ];



    foreach ($items as $delta => $item) {

      $bundle = $item->getFieldDefinition()->getTargetBundle();
      $entity_type = $item->getFieldDefinition()->getTargetEntityTypeId();
      $field_name = $items->getName();
      $widget = $item->getFieldDefinition()->getType();



      $id = $node_id;
      $prefix = '<span id = "'.$entity_type . '-' .$id. '-' .$field_name. '-'.$widget .'-'.$delta.'" class="jeditable jeditable-textfield">';
      $elements[$delta] = array(
        '#type' => 'processed_text',
        '#prefix' => $prefix,
        '#text' =>  $item->value,
        '#suffix' => '</span>',
        '#format' => $item->format,
        '#langcode' => $item->getLangcode(),
      );
      $elements[$delta]['#attached']['library'][] = 'jeditable/jeditable.admin';
    }
//    $theme = array(
//      '#theme' =>'jeditable_formatter_jeditable',
//      );
//
//    $theme = [
//      '#theme' => 'jeditable_formatter_jeditable',
//      ];
//    $render = $theme;

//    foreach ($items as $delta => $item) {


//    $elements[$delta]['#attached']['library'][] = 'jeditable/jeditable.admin';

//    }

    return $elements;
  }

}
