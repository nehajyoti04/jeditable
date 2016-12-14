<?php

namespace Drupal\jeditable\Controller;

use Drupal\Component\Utility\Html;
use Drupal\Core\Controller\ControllerBase;
//use Drupal\node\Plugin\views\field\Node;
use Drupal\node\Entity\Node;
use Drupal\Core\Entity;
use Symfony\Component\HttpFoundation\Response;

class JeditableAjax extends ControllerBase {

  public function jeditable_ajax_save(){

//    print "hello";


    $array = explode('-', $_POST['id']);
    list($type, $id, $field_name, $field_type, $delta) = $array;
    $value = Html::escape($_POST['value']);

    $message = "hello";
    $message = $array[0];
    \Drupal::logger('my_module')->notice($message);

    switch($type) {
      case 'node':

        $node = Node::load($id);
        //set value for field
        $node->{$field_name}->value = $value;

        //save to update node
        $node->save();
        return new Response($value);


        break;

      case 'user':
//        $user = user_load($id);
//        if(!user_edit_access($user)) { // check to see that current user has update permissions on the user
//          $value = 'access denied'; // this is the value that will be returned, but no updates made
//        } else {
//          $field_info=field_info_field($field_name);
//          $user->{$field_name}[$field_info['translatable']?$user->language:LANGUAGE_NONE][0]['value'] = $value;
//          $edit = array($field_name => array($field_info['translatable']?$user->language:LANGUAGE_NONE => array($delta => array('value' => $value))));
//          user_save($user, $edit);
//        }
        break;

      case 'field':
//        $node = node_load($id);
//        $delta=intval($delta);
//        if(!node_access('update', $node)) { // check to see that current user has update permissions on the node
//          $value = 'access denied'; // this is the value that will be returned, but no updates made
//        } else {
//          $field=field_info_field($field_name);
//          $lang=$field['translatable']?$node->language:LANGUAGE_NONE;
//          // assign nid if nodereference, format date if date, otherwise just assign value
//          if($field['type'] == 'nodereference') {
//            $node->{$field_name}[$lang][$delta]['nid'] = $value;
//            $referenced = node_load($value);
//            $value = $referenced->title;
//          } elseif($field['type'] == 'datetime') {
//            $unixtime = strtotime($value);
//            $value = date('o-m-d H:i:s', $unixtime);
//            $node->{$field_name}[$lang][$delta]['value'] = $value;
//          } else {
//            $node->{$field_name}[$lang][$delta]['value'] = $value;
//          }
//          $node->revision = variable_get('jeditable_create_new_revisions', false);
//          node_save($node);
//        }
        break;

      case 'workflow':
//        $node = node_load($id);
//        $value = _jeditable_workflow_save($node, $value);
        break;
    }

//    print $value;
//    exit();


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