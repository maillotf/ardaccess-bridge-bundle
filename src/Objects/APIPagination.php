<?php

namespace MaillotF\Ardaccess\ArdaccessBridgeBundle\Objects;

/**
 * Pagination list parameters.
 *
 * @pw_element integer $page The pagination starting page. If not set, return first page.
 * @pw_element integer $pageSize The number of items by page. If not set, ard_mcm Interface/pagesize value is used. This value can't be greater than ard_mcm Interface/maxPageSize.
 * @pw_complex APIPagination
 * 
 * @author Flavien Maillot "contact@webcomputing.fr"
 */
class APIPagination
{

	/**
	 * The pagination starting page. If not set, return first page.
	 *
	 * @var integer
	 */
	public $page;

	/**
	 * The number of items by page. If not set, ard_mcm Interface/pagesize value is used. This value can't be greater than ard_mcm Interface/maxPageSize.
	 *
	 * @var integer
	 */
	public $pageSize;

}
