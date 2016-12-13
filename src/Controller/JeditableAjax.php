<?php

namespace Drupal\jeditable\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;

class JeditableAjax extends ControllerBase {

  public function jeditable_ajax_save(){

//    print "hello";


    $array = explode('-', $_POST['id']);

    $message = "hello";
    $message = $array[0];
    \Drupal::logger('my_module')->notice($message);


    return new Response('Hello, world');
//    return "jeditable,ajax save return value";


//    return $this->render(
//      "YourBundlePath:Something:template.html.twig",
//      array(
//        'curso'        => $curso,
//        'delete_form'  => $deleteForm->createView(),
//        'detcurso'     => $detcurso,
//        'formdetcurso' => $formdetcurso,
//      )
//    );


  }

  public function jeditable_ajax_load(){

  }
}