# Ardaccess-bridge-bundle

Symfony bundle for ARD Access REST client which is base on username,password authentication

## Required configuration

### Modify framework.yaml
```yaml
ardaccess:
    authentication:
        protocol: "http"
        host: "127.0.0.1"
        port: "80"
        username: "USERNAME"
        password: "PASSWORD"
```

### Modify services.yaml
```yaml
services:
    MaillotF\Ardaccess\ArdaccessBridgeBundle\Service\ArdaccessService: '@ardaccess.service'
```

## Package instalation with composer

```console
$ composer require maillotf/ardaccess-bridge-bundle
```

## Use in controller:

```php
<?php
//...
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Service\ArdaccessService;

class exampleController extends AbstractController
{
	/**
	 * Example
	 * 
	 * @Route("example", name="example", methods={"GET"})
	 * 
	 */
	public function test(ArdaccessService $aas)
	{
		//List of the carriers
		$carriersList = $aas->carrier->ListCarriers();
		
		//Update a carrier
		$apiAttributes = $aas->creator
				->addAttribute('uid', 6078)
				->addAttribute('rid', 794)
				->addAttribute('firstname', 'Jean')
				->addAttribute('lastname', 'Dupont')
				->addAttribute('usergroup', '171,233')
				->addAttribute('begindate', 946681200)
				->addAttribute('enddate', 1627602000)
				->addAttribute('country', 'France')
				->getAttributes();
		$attributes = $aas->carrier->Carrier(null, 'u', $apiAttributes);

		//Search with criterion
		$criterions = $aas->creator
					->newCriterion('date', '>', 946681200)
						->addSubCriterion('example', '=', 'value')
					->addCriterion()
					->newCriterion('...', '=', '...')
					->addCriterion()
					->getCriterionsArray()
					;
		$result = $aas->supervision->ListEvents(null, $criterions);

		//Handback a smartobject
		$smartobjectId = 2;
		$success = $aas->getSmartObjectHelper()->handbackSmartObject($smartObjectId);
		if ($success === true)
			return ($this->json('OK'));
		return ($this->json('Not Found', Response::HTTP_BAD_REQUEST));
	}

}
```
