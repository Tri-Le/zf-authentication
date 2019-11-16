<?php
namespace ZfAuthentication;

use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter;
use Zend\Db\Adapter\Adapter;

class Module {
	public function getConfig() {
		return [
			'zf-authentication' => [
				'storage' => '',
				'adapter' => [
					'class' => CredentialTreatmentAdapter::class,
					'db' => Adapter::class,
					'table' => 'w_users',
					'identity' => 'email',
					'credential' => 'password',
					'credential_treatment' => 'SHA1'
				]
			]
		];
	}
}
