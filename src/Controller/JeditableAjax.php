<?php

namespace Drupal\jeditable\Controller;

use Drupal\Core\Controller\ControllerBase;

class JeditableAjax extends ControllerBase {

  public function jeditable_ajax_save(){

    print "hello";


    $array = explode('-', $_POST['id']);

    $message = "hello";
    $message = $array[0];
    \Drupal::logger('my_module')->notice($message);
    return "jeditable,ajax save return value";
  }

  public function jeditable_ajax_load(){

  }
}