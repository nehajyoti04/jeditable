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


//    $recursive_render_id = $items->getFieldDefinition()->getTargetEntityTypeId()
//      . $items->getFieldDefinition()->getTargetBundle()
//      . $items->getName()
//      . $entity->id();




//    foreach ($this->getEntitiesToView($items, $langcode) as $delta => $entity) {
//      if ($entity->id()) {
//        $elements[$delta] = array(
//          '#plain_text' => $entity->id(),
//          // Create a cache tag entry for the referenced entity. In the case
//          // that the referenced entity is deleted, the cache for referring
//          // entities must be cleared.
//          '#cache' => array(
//            'tags' => $entity->getCacheTags(),
//          ),
//        );
//      }
//    }



//    $elements[$delta] = [
//      '#type' => 'inline_template',
//      '#template' => '{{ value|nl2br }}',
//      '#context' => ['value' => $item->value],
//    ];




    // The ProcessedText element already handles cache context & tag bubbling.
    // @see \Drupal\filter\Element\ProcessedText::preRenderText()
//    return "inside theme function--- milstone 1 of jeditable done.";
//    return '<span id="' . $entity_type . '-' . $id . '-' . $field['field_name'] . '-' . $widget_type . '-' . $variables['delta'] . '" class="jeditable jeditable-textfield">' . $element['value'] . '</span>';
    foreach ($items as $delta => $item) {
//      dpm("item");
//      dpm($item->getFieldDefinition());

//      $markup = '<span class="jeditable jeditable-textfield">' . $item->value. '</span>';
//      $item->value = "hello";
//      $markup = '<div id="test" class="jeditable jeditable-textfield">' . $item->value. '</div>';
//      $markup = "<span class='hello'> hello123 </span>";
      $elements[$delta] = array(
        '#type' => 'processed_text',
//        '#text' => $item->value,
      '#prefix' => '<span id="entity_type-test_id-test_field_name-test_widget_name" class="jeditable jeditable-textfield">',
        '#text' =>  $item->value,
        '#suffix' => '</span>',
        '#format' => $item->format,
        '#langcode' => $item->getLangcode(),
      );
    }

//    return "hello123";
    $theme = array(
      '#theme' =>'jeditable_formatter_jeditable',
      );
//    dpm("theme 1");
//    dpm($theme);
//return $theme;
    $theme = [
      '#theme' => 'jeditable_formatter_jeditable',
      ];
    $render = $theme;
//    dpm("theme");
//    dpm($render);
//    dpm("elements");
//    dpm($elements);
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
