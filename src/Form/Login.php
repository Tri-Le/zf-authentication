<?php
namespace ZfAuthentication\Form;


use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\Form\Form;
use Zend\Validator\EmailAddress;
use Zend\Validator\NotEmpty;

class Login extends Form {
	public function init() {
		parent::init();

		$this->add([
			'type' => 'email',
			'name' => 'Email',
			'options' => [
				'label' => 'Email'
			],
			'attributes' => [
				'id' => 'email',
				'maxlength' => 255,
			]
		])->add([
			'type' => 'password',
			'name' => 'Password',
			'options' => [
				'label' => 'Password',
			],
			'attributes' => [
				'id' => 'password',
				'maxlength' => 255
			]
		])->add([
			'type' => 'csrf',
			'name' => 'csrf',
			'options' => [
				'csrf_options' => [
					'lifetime' => 3600
				]
			]
		])->add([
			'type' => 'submit',
			'name' => 'LoginButton',
			'attributes' => [
				'value' => 'Login',
				'id' => 'login-button'
			]
		])->getInputFilter()->add([
			'name' => 'Email',
			'filters' => [
				new StripTags(),
				new StringTrim()
			],
			'validators' => [
				new EmailAddress(),
				new NotEmpty()
			]
		])->add([
			'name' => 'Password',
			'filters' => [
				new StringTrim()
			],
			'validators' => [
				new NotEmpty()
			]
		]);
	}
}