# Carrier Service

## <a name="cudcarrier"></a>Create, update or delete a carrier

**Signature:**
```php
public function Carrier(?string $sessionId, string $action, array $attributes): array;
```

**Action:**
- c : create
- u : update
- d : delete

**Available attributes:**
- uid (integer) : The carrier unique identifier in AVB. Required for update and delete if no rid given. Don't give it for create.
- rid (string) :  The carrier unique identifier in third party system. Required for create. Required for update and delete if no uid given.
- firstname (string) : The carrier first name. Required for create.
- lastname (string) :  The carrier last name. Required for create.
- image (string) : The carrier image list of images names separate by "," optional.
- disabled (bool [0/1]) : The carrier validity. Default is 1.
- begindate (timestamp) : The carrier validity start date. Default is 0 (valid from a long time ago).
- enddate (timestamp) : The carrier validity end date. Default is 0 (no end).
- userfield0 (string) : The carrier 1 additional field. Default is null.
- userfield1 (string) : The carrier 2 additional field. Default is null.
- userfield2 (string) : The carrier 3 additional field. Default is null.
- userfield3 (string) : The carrier 4 additional field. Default is null.
- userfield4 (string) : The carrier 5 additional field. Default is null.
- userfield5 (string) : The carrier 6 additional field. Default is null.
- userfield6 (string) : The carrier 7 additional field. Default is null.
- userfield7 (string) : The carrier 8 additional field. Default is null.
- userfield8 (string) : The carrier 9 additional field. Default is null.
- userfield9 (string) : The carrier 10 additional field. Default is null.

**Returned item properties (array):**
- uid (integer) : The carrier unique identifier.
- rid (string) :  The carrier unique identifier in third party system.
- firstname (string) : The carrier first name.
- lastname (string) :  The carrier last name.
- image (string) : The carrier list of images names
- disabled (bool [0/1]) : The carrier validity.
- begindate (timestamp) : The carrier validity start date.
- enddate (timestamp) : The carrier validity end date.
- userfield0 (string) : The carrier 1 additional field.
- userfield1 (string) : The carrier 2 additional field.
- userfield2 (string) : The carrier 3 additional field.
- userfield3 (string) : The carrier 4 additional field.
- userfield4 (string) : The carrier 5 additional field.
- userfield5 (string) : The carrier 6 additional field.
- userfield6 (string) : The carrier 7 additional field.
- userfield7 (string) : The carrier 8 additional field.
- userfield8 (string) : The carrier 9 additional field.
- userfield9 (string) : The carrier 10 additional field.

**Throws:**
ArdAccessException

**Example:**
```php
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
```

## <a name="rcarriers"></a>Lists available carriers based on search criteria

**Signature:**
```php
public function ListCarriers(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;
```

**Available criteria :**
- uid (integer) : The carrier unique identifier.
- rid (string) :  The carrier unique identifier in third party system.
- firstname (string) : The carrier first name.
- lastname (string) :  The carrier last name.
- disable (bool [0/1]) : The carrier validity.
- begindate (timestamp) : The carrier validity start date.
- enddate (timestamp) : The carrier validity end date.
- hasimage (bool [0/1]) : Does the carrier has an image ?
- hassmartobject (bool [0/1]) : Does the carrier has a smart object ?
- usergroup (integer) : The carrier group

**Returned items properties (APIList):**
- uid (integer) : The carrier unique identifier.
- rid (string) :  The carrier unique identifier in third party system.
- firstname (string) : The carrier first name.
- lastname (string) :  The carrier last name.
- image (string) : The carrier photo.
- disable (bool [0/1]) : The carrier validity.
- begindate (timestamp) : The carrier validity start date.
- enddate (timestamp) : The carrier validity end date.
- userfield0 (string) : The carrier 1 additional field.
- userfield1 (string) : The carrier 2 additional field.
- userfield2 (string) : The carrier 3 additional field.
- userfield3 (string) : The carrier 4 additional field.
- userfield4 (string) : The carrier 5 additional field.
- userfield5 (string) : The carrier 6 additional field.
- userfield6 (string) : The carrier 7 additional field.
- userfield7 (string) : The carrier 8 additional field.
- userfield8 (string) : The carrier 9 additional field.
- userfield9 (string) : The carrier 10 additional field.
- usergroup (string) : list of user groups identifier

**Example:**
```php
	//List of the carriers
	$carriersList = $aas->carrier->ListCarriers();
```

## <a name="cudcarriergroup"></a>Create, update or delete carrier group

**Signature:**
```php
public function CarrierGroup(?string $sessionId, string $action, array $attributes): array;
```

**Available attributes:**
- uid (integer) : The carriers group unique identifier. Required for update and delete. Don't give it for create.
- name (string) : The carriers group name. Required for create.
- description (string) : The carriers group name. Required for create.
- disabled (bool [0/1]) : The carriers group disabled state.  Default to 0.
- parent (integer) : The carriers group parent folder. Required for create.
	
** Returned item properties (array):**
- uid (integer) : The carriers group unique identifier. Required for update and delete. Don't give it for create.
- name (string) : The carriers group name. Required for create.
- description (string) : The carriers group name. Required for create.
- disabled (bool [0/1]) : The carriers group disabled state.
- parent (integer) : The carriers group parent folder. Required for create.

## <a name="rcarriergroups"></a>Lists available carrier groups based on search criteria

**Signature:**
```php
public function ListCarrierGroups(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;
```

**Available criteria :**
- uid (integer) : The carriers group unique identifier.
- name (string) : The carriers group name.
- description (string) : The carriers group description.
- disabled (bool [0/1]) : The carriers groups disabled state.
- parent (integer) : The carriers group parent folder.
	
**Returned items properties  (APIList):**
- uid (integer) : The carriers group unique identifier.
- name (string) : The carriers group name.
- description (string) : The carriers group description.
- disabled (bool [0/1]) : The carriers groups disabled state.
- parent (integer) : The carriers group parent folder.

## <a name="cudgroupfolder"></a>Create, update or delete a group folder

**Signature:**
```php
public function GroupFolder(?string $sessionId, string $action, array $attributes): array;
```

**Available attributes:**
- uid (integer) : The group folder unique identifier. Required for update and delete. Don't give it for create.
- name (string) : The group folder name. Required for create.
- description (string) : The group folder description. Required for create.
- disabled (bool [0/1]) : The group folder disabled state.  Default to 0.
- parent (integer) : The group folder parent folder. Required for create.
	 
** Returned item properties (array):**
- uid (integer) : The group folder unique identifier. Required for update and delete. Don't give it for create.
- name (string) : The group folder name. Required for create.
- description (string) : The group folder name. Required for create.
- disabled (bool [0/1]) : The  group folder disabled state.
- parent (integer) : The group folder parent folder. Required for create.

## <a name="rgroupfolders"></a>Lists available carrier groups folder based on search criteria

**Signature:**
```php
public function ListCarrierGroupFolders(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;
```

**Available criteria :**
- uid (integer) : The carriers groups folder unique identifier.
- name (string) : The carriers groups folder name.
- description (string) : The carriers groups folder description.
- disabled (bool [0/1]) : The carriers groups folder disabled state.
- parent (integer) : The carriers groups folder parent folder.
	
**Returned items properties (APIList):**
- uid (integer) : The carriers groups folder unique identifier.
- name (string) : The carriers groups folder name.
- description (string) : The carriers groups folder description.
- disabled (bool [0/1]) : The carriers groups folder disabled state.
- parent (integer) : The carriers groups folder parent folder.

## <a name="cucarriergroup"></a>Sets carrier's carrier groups

**Signature:**
```php
public function SetCarrierGroup(?string $sessionId, int $carrierId, array $carriergroupIds, bool $eraseGroup = true, bool $strict = false): bool;
```

## <a name="dcarriergroup"></a>Remove carrier's carrier groups

**Signature:**
```php
public function RemoveCarrierGroup(?string $sessionId, int $carrierId, array $carriergroupIds, bool $strict = false): bool;
```

## <a name="cucarrierimage"></a>Sets carrier's image

**Signature:**
```php
public function SetCarrierImage(?string $sessionId, int $carrierId, bool $append, string $imageName, string $imageData, bool $strict = false): bool;
```

