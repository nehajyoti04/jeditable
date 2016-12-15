<?php

namespace Drupal\jeditable\Controller;

use Drupal\Component\Utility\Html;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Entity;
use Symfony\Component\HttpFoundation\Response;

class JeditableAjax extends ControllerBase {

  public function jeditable_ajax_save(){
    $array = explode('-', $_POST['id']);
    list($type, $id, $field_name, $field_type, $delta) = $array;
    $value = Html::escape($_POST['value']);

    switch($type) {
      case 'node':
        $node = Node::load($id);
        $node->{$field_name}->value = $value;
        $node->save();
        return new Response($value);
        break;

    }
  }
}