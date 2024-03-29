<?php
namespace ZfAuthentication\Controller;


use Zend\Mvc\Controller\AbstractActionController;
use Zend\Stdlib\RequestInterface as Request;
use Zend\Stdlib\ResponseInterface as Response;
use Zend\View\Model\ViewModel;
use ZfAuthentication\Form\Login;

class LoginController extends AbstractActionController {
	public function dispatch(Request $request, Response $response = null) {
		$this->layout('layout/login');
		return parent::dispatch($request, $response); // TODO: Change the autogenerated stub
	}

	public function indexAction() {
		$form = new Login();
		$form->init();



		$view = new ViewModel([
			'form' => $form
		]);

		$view->setTemplate('application/login/index');

		return $view;
	}
}