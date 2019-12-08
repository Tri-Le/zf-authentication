<?php


namespace ZfAuthentication;


use Interop\Container\ContainerInterface;
use Interop\Container\Exception\ContainerException;
use Zend\Authentication\Adapter\DbTable\CredentialTreatmentAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Authentication\Storage\Session;
use Zend\Db\Adapter\Adapter;
use Zend\ServiceManager\Exception\ServiceNotCreatedException;
use Zend\ServiceManager\Exception\ServiceNotFoundException;
use Zend\ServiceManager\Factory\FactoryInterface;

class AuthenticationServiceFactory implements FactoryInterface {
	public function __invoke(ContainerInterface $container, $requestedName, array $options = null) {
		$config = $container->get('config');
		$default = [
			'adapter' => CredentialTreatmentAdapter::class,
			'db' => Adapter::class,
			'table' => 'w_users',
			'identity' => 'email',
			'credential' => 'password',
			'credential_treatment' => 'SHA1(?)'
		];

		if (isset($config['zf_authentication'])) {
			$default = array_merge($default, $config['zf_authentication']);
		}

		extract($default);
		/*$tableName = null;
        $identityColumn = null;
        $credentialColumn = null;
        $credentialTreatment = null;*/
		$adapter = new $adapter($container->get($db), $table, $identity, $credential, $credential_treatment);
		return new AuthenticationService(new Session('AuthSession'), $adapter);
	}

}