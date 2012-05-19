<?php

/**
 * TestCatalog form base class.
 *
 * @method TestCatalog getObject() Returns the current form's model object
 *
 * @package    test
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTestCatalogForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'   => new sfWidgetFormInputHidden(),
      'name' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'name' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'TestCatalog', 'column' => array('name')))
    );

    $this->widgetSchema->setNameFormat('test_catalog[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TestCatalog';
  }


}
