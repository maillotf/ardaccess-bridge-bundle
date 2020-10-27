# Access Service

## <a name="raccesspoints"></a>Lists available access points based on search criteria

**Signature:**
```php
public function ListAccessPoints(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;
```

**Available criteria:**
- uid (integer) :
- name (string) :
- description (string) :
- creationdate (integer) : unix timestamp of record creation
- modificationdate (integer) : unix timestamp of last record modification

**Returned items properties (APIList):**
- uid (integer) : unique id of acces point
- name (string) : variable name of access point
- description (string) : Human readable name of access point
- creationdate (integer) : unix timestamp of record creation
- modificationdate (integer) : unix timestamp of last record modification

**Example:**
```php
$aas->access->ListAccessPoints();
```

## <a name="cudweekschedule"></a>Create, update or delete week schedule

**Signature:**
```php
public function WeekSchedule(?string $sessionId, string $action, array $attributes): array;
```

**Action:**
- c : create
- u : update
- d : delete

**Available attributes:**
- uid (integer) : The week schedule unique identifier. Required for update and delete. Don't give it for create.
- name (string) : The week schedule name.
- description (string) : The week schedule description.
- hidden (bool) : The week schedule hidden.<code>1</code> The week schedule is desactivate<code>0</code>otherwise.
- taxons(string): The week schedule taxons (list of int separated by a comma).
- devices (integer): The week schedule devices (used only for Forced schedule)
- type (integer): The week schedule type (0: Time table 1:Forced schedule)
- creationdate(timestamp): The week schedule crdate
- modificationdate(timestamp): The week schedule tstamp
	
**Returned item properties (Array):**
- uid (integer) : The week schedule unique identifier.
- name (string) : The week schedule name.
- description (string) : The week schedule description.
- hidden (bool) : The week schedule hidden.<code>1</code> The week schedule is desactivate<code>0</code>otherwise.
- taxons(string): The week schedule taxons (list of int separated by a comma)
- devices (integer): The week schedule devices (used only for Forced schedule)
- type (integer): The week schedule type (0: Time table 1:Forced schedule)
- creationdate(timestamp): The week schedule crdate
- modificationdate(timestamp): The week schedule tstamp
- modificationutilisateur(int): The week schedule upuser_id
- creationutilisateur(int): The week schedule cruser_id

## <a name="cuddailyschedule"></a>Create, update or delete daily schedule

**Signature:**
```php
public function DailySchedule(?string $sessionId, string $action, array $attributes): array;
```

**Action:**
- c : create
- u : update
- d : delete

**Available attributes:**
- uid (integer) : The week schedule unique identifier. Required for update and delete. Don't give it for create.
- name (string) : The week schedule name.
- description (string) : The week schedule description.
- hidden (bool) : The week schedule hidden.<code>1</code> The week schedule is desactivate<code>0</code>otherwise.
- taxons(string): The week schedule taxons (list of int separated by a comma).
- devices (integer): The week schedule devices (used only for Forced schedule)
- type (integer): The week schedule type (0: Time table 1:Forced schedule)
- creationdate(timestamp): The week schedule crdate
- modificationdate(timestamp): The week schedule tstamp
	
**Returned item properties (Array):**
- uid (integer) : The week schedule unique identifier.
- name (string) : The week schedule name.
- description (string) : The week schedule description.
- hidden (bool) : The week schedule hidden.<code>1</code> The week schedule is desactivate<code>0</code>otherwise.
- taxons(string): The week schedule taxons (list of int separated by a comma)
- devices (integer): The week schedule devices (used only for Forced schedule)
- type (integer): The week schedule type (0: Time table 1:Forced schedule)
- creationdate(timestamp): The week schedule crdate
- modificationdate(timestamp): The week schedule tstamp
- modificationutilisateur(int): The week schedule upuser_id
- creationutilisateur(int): The week schedule cruser_id

## <a name="rweekschedule"></a>Lists available week schedules based on search criteria

**Signature:**
```php
public function ListWeekSchedules(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;
```

**Available criteria:**
- uid (integer) : The week schedule unique identifier.
- name (string) : The week schedule name.
- description (string) : The week schedule description.
- creationdate (integer) : unix timestamp of record creation
- modificationdate (integer) : unix timestamp of last record modification
	
**Returned items properties (APIList):**
- uid (integer) : The week schedule unique identifier.
- name (string) : The week schedule name.
- description (string) : The week schedule description.
- creationdate (integer) : unix timestamp of record creation
- modificationdate (integer) : unix timestamp of last record modification

## <a name="cudgroupright"></a>Create, update or delete rights on a carrier group

**Signature:**
```php
public function GroupRight(?string $sessionId, string $action, array $attributes): array;
```

**Action:**
- c : create
- u : update
- d : delete

**Available attributes:**
- uid (integer) : The unique id of the access right. Required for update and delete.
- group (integer) : The unique id of the group. Required for create.
- accesspoint (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
- weeklyschedule (integer) : The unique id of weekly schedule. If 0, then the right is 24/24 7/7. Default 0.

**Returned item properties (Array):**
- uid (integer) : unique id of access right
- group (integer) : The unique id of the group.
- accesspoint (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
- weeklyschedule (integer) : The unique id of weekly schedule. If 0, then the right is 24/24 7/7. Default 0.

## <a name="cudcarrierright"></a>Create, update or delete rights on a carrier (individual rights)

**Signature:**
```php
public function CarrierRight(?string $sessionId, string $action, array $attributes): array;
```

**Action:**
- c : create
- u : update
- d : delete

**Available attributes:**
- uid (integer) : The unique id of the access right. Required for update and delete.
- carrier (integer) : The unique id of the carrier. Required for create.
- accesspoint (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
- weeklyschedule (integer) : The unique id of weekly schedule. If 0, then the right is 24/24 7/7. Default 0.
	
**Returned item properties (Array):**
- uid (integer) : The unique id of the access right.
- carrier (integer) : The unique id of the carrier.
- accesspoint (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
- weeklyschedule (integer) : The unique id of weekly schedule. If 0, then the right is 24/24 7/7. Default 0.

## <a name="cudsmartobjectright"></a>Create, update or delete rights on a smart object

**Signature:**
```php
public function SmartObjectRight(?string $sessionId, string $action, array $attributes): array;
```

**Action:**
- c : create
- u : update
- d : delete

**Available attributes:**
- uid (integer) : The unique id of the access right. Required for update and delete.
- smartobject (integer) : The unique id of the smart object. Required for create.
- accesspoint (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
- weeklyschedule (integer) : The unique id of weekly schedule. If 0, then the right is 24/24 7/7. Default 0.
	
**Returned item properties (Array):**
- uid (integer) : The unique id of the access right.
- smartobject (integer) : The unique id of the smart object.
- accesspoint (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
- weeklyschedule (integer) : The unique id of weekly schedule. If 0, then the right is 24/24 7/7. Default 0.

## <a name="rrights"></a>Lists available access rights based on search criteria

**Signature:**
```php
public function ListRights(?string $sessionId = null, array $criteria = null, ?APIPagination $pagination = null): APIList;
```

**Available criteria:**
- uid (integer) : The access right unique identifier.
- accesspoint (integer) : The access right access point.
- weeklyschedule (integer) : The access right weekschedule.
- carrier (integer) : The access right carrier.
- group (integer) : The access right carrier group.
- smartobject (integer) : The access right smart object unique identifier.
- creationdate (integer) : unix timestamp of record creation
- modificationdate (integer) : unix timestamp of last record modification

**Returned record properties (APIList):**
- uid (integer) : The access right unique identifier.
- accesspoint (integer) : The access right access point.
- weeklyschedule (integer) : The access right weekschedule. 0 means 24/24 7/7.
- carrier (integer) : The access right carrier, if it's an individual right.
- group (integer) : The access right carrier group, if it's a group right.
- smartobject (integer) : The access right smart object unique identifier.
- creationdate (integer) : unix timestamp of record creation
- modificationdate (integer) : unix timestamp of last record modification

## <a name="cuddaterange"></a>Creates, Updates, Deletes a date range to a calendar
Before AVB 2.0 , calendar is unique with uid 1

**Signature:**
```php
public function DateRange(?string $sessionId, int $calendarId, string $action, array $attributes): array;
```

**Available attributes:**
- uid (integer) : The unique id of the access right. Required for update and delete.
- name (string) : name Date Range
- startdate (integer) : The unique id of the carrier. Required for create.
- enddate (integer) : The unique id of access point. If 0, then the right is on all access points. Default 0.
Dates set in 1970 will be repeated every year
	
**Returned item properties (Array):**
- uid (integer) : unique id of Date Range
- name (string) : name Date Range
- begindate (integer) : unix timestamp of begin of date range
- enddate (integer) : unix timestamp of end of date range

## <a name="rdateranges"></a>List date ranges of a calendar 
Before AVB 2.0 , calendar is unique with uid 1

**Signature:**
```php
public function ListDateRanges(?string $sessionId, int $calendarId): APIList;
```

**Returned item properties (Array):**
- uid (integer) : unique id of Date Range
- name (string) : name Date Range
- begindate (integer) : unix timestamp of begin of date range
- enddate (integer) : unix timestamp of end of date range

## <a name="cuforceoutput"></a>Forces output for a given number of seconds


**Signature:**
```php
public function ForceOutput(?string $sessionId, int $outputId, int $tempo);
```

## <a name="rforceoutput"></a>Returns list of output devices

**Signature:**
```php
public function ListOutputs(?string $sessionId = null, ?array $criteria = null, ?APIPagination $pagination = null): APIList;
```

**Available criteria:**
- uid (integer) : unique id of device
- variable (string) : variable name of device
- description (string) : human readable name of device
- creationdate (integer) : unix timestamp of record creation
- modificationdate (integer) : unix timestamp of last record modification
	
**Returned record properties:**
- uid (integer) : unique id of device
- variable (string) : variable name of device
- description (string) : human readable name of device
- creationdate (integer) : unix timestamp of record creation
- modificationdate (integer) : unix timestamp of last record modification