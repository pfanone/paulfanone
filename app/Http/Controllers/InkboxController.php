<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;

use DB;
use View;

class InkboxController extends BaseController
{
	public function anyIndex() {
		$return_array = array();

		return View::make('inkbox.index', $return_array);
	}

	public function postUserdata() {
		$return_array = array();

		$select = DB::select('SELECT "day" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW() UNION SELECT "week" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 WEEK) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW() UNION SELECT "month" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()', array());

		foreach ($select as $key => $value) {
			array_push($return_array, array(
					'interval' => $value->interval,
					'date_as_of' => $value->date_as_of,
					'count' => $value->count
				)
			);
		}

		return $return_array;
	}
}
