<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 * Search criteria for events
 *
 * @pw_element string $field The field name on which search criteria is applied.
 * @pw_element string $value A comam seperated list of values to match.
 * @pw_complex APIEventCriterion
 * 
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class APIEventCriterion
{

	/**
	 * The field name on which search criteria is applied.
	 *
	 * @var string
	 */
	public $field;

	/**
	 * A comam seperated list of values to match.
	 *
	 * @var string
	 */
	public $value;

}
