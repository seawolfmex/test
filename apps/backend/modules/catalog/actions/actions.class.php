<?php

/**
 * catalog actions.
 *
 * @package    test
 * @subpackage catalog
 * @author     Your name here
 */
class catalogActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->TestCatalogs = TestCatalogPeer::doSelect(new Criteria());
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->TestCatalog = TestCatalogPeer::retrieveByPk($request->getParameter('id'));
    $this->forward404Unless($this->TestCatalog);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TestCatalogForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new TestCatalogForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($TestCatalog = TestCatalogPeer::retrieveByPk($request->getParameter('id')), sprintf('Object TestCatalog does not exist (%s).', $request->getParameter('id')));
    $this->form = new TestCatalogForm($TestCatalog);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($TestCatalog = TestCatalogPeer::retrieveByPk($request->getParameter('id')), sprintf('Object TestCatalog does not exist (%s).', $request->getParameter('id')));
    $this->form = new TestCatalogForm($TestCatalog);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($TestCatalog = TestCatalogPeer::retrieveByPk($request->getParameter('id')), sprintf('Object TestCatalog does not exist (%s).', $request->getParameter('id')));
    $TestCatalog->delete();

    $this->redirect('catalog/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $TestCatalog = $form->save();

      $this->redirect('catalog/edit?id='.$TestCatalog->getId());
    }
  }
}
