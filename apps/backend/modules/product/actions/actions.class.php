<?php

/**
 * product actions.
 *
 * @package    test
 * @subpackage product
 * @author     Your name here
 */
class productActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->TestProducts = TestProductPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->TestProduct = TestProductPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->TestProduct);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TestProductForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TestProductForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($TestProduct = TestProductPeer::retrieveByPk($request->getParameter('id')), sprintf('Object TestProduct does not exist (%s).', $request->getParameter('id')));
    $this->form = new TestProductForm($TestProduct);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($TestProduct = TestProductPeer::retrieveByPk($request->getParameter('id')), sprintf('Object TestProduct does not exist (%s).', $request->getParameter('id')));
    $this->form = new TestProductForm($TestProduct);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($TestProduct = TestProductPeer::retrieveByPk($request->getParameter('id')), sprintf('Object TestProduct does not exist (%s).', $request->getParameter('id')));
    $TestProduct->delete();

    $this->redirect('product/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $TestProduct = $form->save();

      $this->redirect('product/edit?id='.$TestProduct->getId());
    }
  }
}
