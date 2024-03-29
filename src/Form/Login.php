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
			'type' => 'text',
			'name' => 'Identity',
			'options' => [
				'label' => 'Identity'
			],
			'attributes' => [
				'id' => 'identity',
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
			'name' => 'SubmitButton',
			'attributes' => [
				'value' => 'Login',
				'id' => 'submit-button'
			]
		])->getInputFilter()->add([
			'name' => 'Identity',
			'filters' => [
				new StripTags(),
				new StringTrim()
			],
			'validators' => [
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