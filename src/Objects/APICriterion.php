<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 * Search criteria.
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
 * @pw_element string $field The field name on which search criteria is applied.
 * @pw_element string $operator The operator to apply. See available list upper.
 * @pw_element string $value The value to match.
 * @pw_element APICriterionArray $subcriteria A list of criteria when the operator is "or" or "and".
 * @pw_complex APICriterion
 * 
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class APICriterion
{

	/**
	 * The field name on which search criteria is applied.
	 *
	 * @var string
	 */
	public $field;

	/**
	 * The operator to apply. See available list upper.
	 *
	 * @var string
	 */
	public $operator;

	/**
	 * The value to match.
	 *
	 * @var string
	 */
	public $value;

	/**
	 * A list of criteria when the operator is "or" or "and".
	 *
	 * @var APICriterionArray
	 */
	public $subcriteria;

	public function setField($field): APICriterion
	{
		$this->field = $field;
		return ($this);
	}

	public function getField()
	{
		return ($this->field);
	}

	public function setOperator($operator): APICriterion
	{
		$this->operator = $operator;
		return ($this);
	}

	public function getOperator()
	{
		return ($this->operator);
	}

	public function setValue($value): APICriterion
	{
		$this->value = $value;
		return ($this);
	}

	public function getValue()
	{
		return ($this->value);
	}

	public function setSubcriteria($subcriteria): APICriterion
	{
		$this->subcriteria = $subcriteria;
		return ($this);
	}

	public function getSubcriteria()
	{
		return ($this->subcriteria);
	}

}
