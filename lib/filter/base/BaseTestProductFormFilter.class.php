<?php

/**
 * TestProduct filter form base class.
 *
 * @package    test
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseTestProductFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'catalog_id' => new sfWidgetFormPropelChoice(array('model' => 'TestCatalog', 'add_empty' => true)),
      'name'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'catalog_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TestCatalog', 'column' => 'id')),
      'name'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('test_product_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TestProduct';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'catalog_id' => 'ForeignKey',
      'name'       => 'Text',
    );
  }
}
