<?php

/**
 * TestProduct form base class.
 *
 * @method TestProduct getObject() Returns the current form's model object
 *
 * @package    test
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTestProductForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'catalog_id' => new sfWidgetFormPropelChoice(array('model' => 'TestCatalog', 'add_empty' => false)),
      'name'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'catalog_id' => new sfValidatorPropelChoice(array('model' => 'TestCatalog', 'column' => 'id')),
      'name'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('test_product[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TestProduct';
  }


}
