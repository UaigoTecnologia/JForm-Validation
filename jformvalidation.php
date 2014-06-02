<?php

defined('_JEXEC') or die ;


class PlgContentJformValidation extends JPlugin{
    
    public function onContentPrepareForm($form, $data){ 

          $app = JFactory::getApplication();
          if ($app->isAdmin()) return true;
          $list_form_validation = json_decode($this->params->get('list_forms_field_validation'), true); 
          
          if(!in_array($form->getName(), $list_form_validation)){

              JHTML::_('behavior.formvalidation');
              for($i=0;$i < count($list_form_validation['context']);$i++){
                  if($form->getName() == $list_form_validation['context'][$i] ){
                        $app->getDocument()->addScriptDeclaration("var message_wrong_tel_format = '{$list_form_validation['msg_return'][$i]}';");                                
                        $app->getDocument()->addScript(JUri::base().'plugins/content/jformvalidation/media/js/'.$list_form_validation['class'][$i].'.js', 'text/javascript');
                        $form->setFieldAttribute($list_form_validation['field_name'][$i],'class',$list_form_validation['class'][$i]);                
                        $form->setFieldAttribute($list_form_validation['field_name'][$i],'validate',$list_form_validation['validate'][$i]);
                  }
              }
          } 

         return true;
    }
}
