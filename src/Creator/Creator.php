<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator;

use MaillotF\Ardaccess\ArdaccessBridgeBundle\Service\AbstractWS;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIAttribute;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIAttributeArray;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APICriterion;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APICriterionArray;
use MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects\APIPagination;

/**
 * Help to create and manage Attributes, Criterions and Pagination.
 *
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class Creator
{

	/**
	 *
	 * @var array
	 */
	private $attributes = array();

	/**
	 *
	 * @var APICriterion 
	 */
	private $criterion = null;

	/**
	 *
	 * @var array 
	 */
	private $criterions = array();

	/**
	 *
	 * @var APIPagination
	 */
	private $paginatation = null;

	/**
	 * 
	 * @param array $attributes
	 * @return array
	 */
	public static function castAttributes(array $attributes): array
	{
		$APIattributes = array();
		if (!empty($attributes))
			foreach ($attributes as $attribute)
			{
				$APIattributes[] = self::createAttribute($attribute->index, $attribute->value);
			}
		return ($APIattributes);
	}

	/**
	 * Reset attributes to the default value
	 * 
	 * @return \MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator
	 * @author Flavien Maillot 
	 */
	public function clearAttributes(): Creator
	{
		$this->attributes = array();
		return ($this);
	}

	/**
	 * Add a list of object [{"index":"INDEX", "value": "VALUE" }] to the attributes
	 * 
	 * @param array $attributes
	 * @return \MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator
	 * @author Flavien Maillot 
	 */
	public function setAttributes(array $attributes): Creator
	{
		if (!empty($attributes))
		{
			$this->attributes = array();
			foreach ($attributes as $attribute)
			{
				$this->attributes[] = $this->createAttribute($attribute->index, $attribute->value);
			}
		}
		return ($this);
	}

	/**
	 * Create an attribute with the name and value defined
	 * 
	 * @param string $name
	 * @param mixed $value
	 * @return APIAttribute
	 * @author Flavien Maillot 
	 */
	public static function createAttribute(string $name, $value): APIAttribute
	{
		/* @var $attribute APIAttribute */
		$attribute = new APIAttribute();
		$attribute->index = $name;
		$attribute->value = $value;
		return ($attribute);
	}

	/**
	 * Add an attribute to the attributes
	 * 
	 * @param string $name
	 * @param mixed $value
	 * @return \MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator
	 * @author Flavien Maillot 
	 */
	public function addAttribute(string $name, $value): Creator
	{
		$this->attributes[] = $this->createAttribute($name, $value);
		return ($this);
	}

	/**
	 * Get the attributes wrap in APIAttributeArray
	 * 
	 * @return array
	 * @author Flavien Maillot 
	 */
	public function getAttributes(): APIAttributeArray
	{
		$obj = (object) $this->attributes;
		$attributes = AbstractWS::cast($obj, 'APIAttributeArray');
		return ($attributes);
	}

	/**
	 * Get the attributes in array
	 * 
	 * @return array
	 * @author Flavien Maillot 
	 */
	public function getAttributesArray(): array
	{
		return ($this->attributes);
	}

	/**
	 * Create a criterion with the field, operator and value defined
	 * 
	 * Valid operator by types:
	 * - integer: "=", "!=", "<", "<=", ">", ">=", "isn", "isnn", "in", "nin", "fis", "nfis", "sif" or "nsif".
	 * - string: "=", "!=", "isn", "isnn", "in", "nin", "fis", "nfis", "sif", "nsif", "like" or "nlike".
	 * - boolean: "=" or "!=".
	 * - timestamp (date) : "=", "!=", "<", "<=", ">", ">=", "isn" or "isnn"
	 * 
	 * Logical operators: "and" or "or".
	 * 
	 * Special operators descriptions:
	 * - isn is for a IS NULL search (value will not be used),
	 * - isnn is for IS NOT NULL search (value will not be used),
	 * - in is for IN search (value is a list),
	 * - nin is for NOT IN search (value is a list),
	 * - fis is for FIND_IN_SET search,
	 * - nfis is for NOT FIND_IN_SET search,
	 * - sif is for FIND_IN_SET search (value is a list),
	 * - nfis is for NOT FIND_IN_SET search (value is a list),
	 * - like is for LIKE search (% can be used as * joker),
	 * - nlike is for NOT LIKE search (% can be used as * joker).
	 * - and, or: value and index are not used, and subcriterie must be setted. It's like grouping subcriterie into parenthesis.
	 *
	 * @param string $field The field name on which search criteria is applied.
	 * @param string $operator The operator to apply. See available list upper.
	 * @param string $value The value to match.
	 * @return APICriterion
	 * @author Flavien Maillot 
	 */
	private function createCriterion(string $field, string $operator, string $value): APICriterion
	{
		$criterion = new APICriterion();
		$criterion->field = $field;
		$criterion->operator = $operator;
		$criterion->value = $value;
		$criterion->subcriteria = array();
		return ($criterion);
	}

	/**
	 *  Define a criterion with the field, operator and value defined
	 * 
	 * Valid operator by types:
	 * - integer: "=", "!=", "<", "<=", ">", ">=", "isn", "isnn", "in", "nin", "fis", "nfis", "sif" or "nsif".
	 * - string: "=", "!=", "isn", "isnn", "in", "nin", "fis", "nfis", "sif", "nsif", "like" or "nlike".
	 * - boolean: "=" or "!=".
	 * - timestamp (date) : "=", "!=", "<", "<=", ">", ">=", "isn" or "isnn"
	 * 
	 * Logical operators: "and" or "or".
	 * 
	 * Special operators descriptions:
	 * - isn is for a IS NULL search (value will not be used),
	 * - isnn is for IS NOT NULL search (value will not be used),
	 * - in is for IN search (value is a list),
	 * - nin is for NOT IN search (value is a list),
	 * - fis is for FIND_IN_SET search,
	 * - nfis is for NOT FIND_IN_SET search,
	 * - sif is for FIND_IN_SET search (value is a list),
	 * - nfis is for NOT FIND_IN_SET search (value is a list),
	 * - like is for LIKE search (% can be used as * joker),
	 * - nlike is for NOT LIKE search (% can be used as * joker).
	 * - and, or: value and index are not used, and subcriterie must be setted. It's like grouping subcriterie into parenthesis.
	 *
	 * @param string $field The field name on which search criteria is applied.
	 * @param string $operator The operator to apply. See available list upper.
	 * @param string $value The value to match.
	 * @param APICriterionArray $subcriteria A list of criteria when the operator is "or" or "and".
	 * @return \MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator
	 * @author Flavien Maillot 
	 */
	public function setCriterion(string $field, string $operator, string $value): Creator
	{
		$this->criterion = $this->createCriterion($field, $operator, $value);
		return ($this);
	}

	/**
	 * Alias for setCriterion
	 * 
	 * Valid operator by types:
	 * - integer: "=", "!=", "<", "<=", ">", ">=", "isn", "isnn", "in", "nin", "fis", "nfis", "sif" or "nsif".
	 * - string: "=", "!=", "isn", "isnn", "in", "nin", "fis", "nfis", "sif", "nsif", "like" or "nlike".
	 * - boolean: "=" or "!=".
	 * - timestamp (date) : "=", "!=", "<", "<=", ">", ">=", "isn" or "isnn"
	 * 
	 * Logical operators: "and" or "or".
	 * 
	 * Special operators descriptions:
	 * - isn is for a IS NULL search (value will not be used),
	 * - isnn is for IS NOT NULL search (value will not be used),
	 * - in is for IN search (value is a list),
	 * - nin is for NOT IN search (value is a list),
	 * - fis is for FIND_IN_SET search,
	 * - nfis is for NOT FIND_IN_SET search,
	 * - sif is for FIND_IN_SET search (value is a list),
	 * - nfis is for NOT FIND_IN_SET search (value is a list),
	 * - like is for LIKE search (% can be used as * joker),
	 * - nlike is for NOT LIKE search (% can be used as * joker).
	 * - and, or: value and index are not used, and subcriterie must be setted. It's like grouping subcriterie into parenthesis.
	 *
	 * @param string $field The field name on which search criteria is applied.
	 * @param string $operator The operator to apply. See available list upper.
	 * @param string $value The value to match.
	 * @see setCriterion
	 * @return \MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator
	 */
	public function newCriterion(string $field, string $operator, string $value): Creator
	{
		$this->setCriterion($field, $operator, $value);
		return ($this);
	}

	/**
	 * Add a subcriterion with the field, operator and value defined
	 * 
	 * Valid operator by types:
	 * - integer: "=", "!=", "<", "<=", ">", ">=", "isn", "isnn", "in", "nin", "fis", "nfis", "sif" or "nsif".
	 * - string: "=", "!=", "isn", "isnn", "in", "nin", "fis", "nfis", "sif", "nsif", "like" or "nlike".
	 * - boolean: "=" or "!=".
	 * - timestamp (date) : "=", "!=", "<", "<=", ">", ">=", "isn" or "isnn"
	 * 
	 * Logical operators: "and" or "or".
	 * 
	 * Special operators descriptions:
	 * - isn is for a IS NULL search (value will not be used),
	 * - isnn is for IS NOT NULL search (value will not be used),
	 * - in is for IN search (value is a list),
	 * - nin is for NOT IN search (value is a list),
	 * - fis is for FIND_IN_SET search,
	 * - nfis is for NOT FIND_IN_SET search,
	 * - sif is for FIND_IN_SET search (value is a list),
	 * - nfis is for NOT FIND_IN_SET search (value is a list),
	 * - like is for LIKE search (% can be used as * joker),
	 * - nlike is for NOT LIKE search (% can be used as * joker).
	 * - and, or: value and index are not used, and subcriterie must be setted. It's like grouping subcriterie into parenthesis.
	 *
	 * @param string $field The field name on which search criteria is applied.
	 * @param string $operator The operator to apply. See available list upper.
	 * @param string $value The value to match.
	 * @return \MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator
	 * @author Flavien Maillot 
	 */
	public function addSubCriterion(string $field, string $operator, string $value): Creator
	{
		if ($this->criterion != null)
		{
			$this->criterion->subcriteria[] = $this->createCriterion($field, $operator, $value);
		}
		return ($this);
	}

	/**
	 * Get the criterion
	 * 
	 * @return APICriterion
	 * @author Flavien Maillot 
	 */
	public function getCriterion(): APICriterion
	{
		return ($this->criterion);
	}

	/**
	 * Reset criterios to the default value
	 * 
	 * @return \MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator
	 * @author Flavien Maillot 
	 */
	public function clearCriterions(): Creator
	{
		$this->criterions = array();
		return ($this);
	}

	/**
	 * Add a criterion to the criterions
	 * 
	 * @param APICriterion|null $criterion
	 * @return \MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator
	 */
	public function addCriterion(?APICriterion $criterion = null): Creator
	{
		if ($criterion == null && $this->criterion != null)
		{
			$criterion = $this->criterion;
			$this->criterions[] = $criterion;
		}
		return ($this);
	}

	/**
	 * Get the criterions wrap in APICriterionArray
	 * 
	 * @return APICriterion
	 * @author Flavien Maillot 
	 */
	public function getCriterions(): APICriterionArray
	{
		$obj = (object) $this->criterions;
		$criterions = AbstractWS::cast($obj, 'APIAttributeCriterion');
		return ($criterions);
	}

	/**
	 * Get the attributes in array
	 * 
	 * @return array
	 * @author Flavien Maillot 
	 */
	public function getCriterionsArray(): array
	{
		return ($this->criterions);
	}

	/**
	 * Defined a pagination
	 * 
	 * @param int $page
	 * @param int|null $pageSize
	 * @return \MaillotF\Ardaccess\ArdaccessBridgeBundle\Creator\Creator
	 * @author Flavien Maillot 
	 */
	public function setPagination(int $page, ?int $pageSize = null): Creator
	{
		if ($this->paginatation == null)
			$this->paginatation = new APIPagination();
		$this->paginatation->page = $page;
		$this->paginatation->pageSize = $pageSize;
		return ($this);
	}

	/**
	 * Get the pagination
	 * 
	 * @return APIPagination
	 * @author Flavien Maillot 
	 */
	public function getPagination(): APIPagination
	{
		return ($this->paginatation);
	}

}
