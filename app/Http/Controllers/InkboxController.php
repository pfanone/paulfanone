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
		$user_data = array();
		$interval = array();
		$date_as_of = array();
		$count = array();

		$select = DB::select('SELECT "All" AS `interval`, "" `date_as_of`, count(*) AS `count` FROM `users` UNION SELECT "Month" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW() UNION SELECT "Week" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 WEEK) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW() UNION SELECT "Day" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW()', array());

		foreach ($select as $key => $value) {
			$user_data[$value->interval] = array(
					'interval' => $value->interval,
					'date_as_of' => $value->date_as_of,
					'count' => $value->count
				);

			if ($value->interval != "All") {
				array_push($interval, $value->interval);
				array_push($date_as_of, $value->date_as_of);
				array_push($count, $value->count);
			}
		}

		$return_array['user_data_array'] = $user_data;
		$return_array['interval_array'] = $interval;
		$return_array['date_as_of_array'] = $date_as_of;
		$return_array['count_array'] = $count;

		return View::make("inkbox.partials.user_graph", $return_array)->render();
	}

	public function postTattoodata() {
		$return_array = array();
		$tattoo_data = array();
		$interval = array();
		$date_as_of = array();
		$count = array();

		$select = DB::select('SELECT "All" AS `interval`, "" AS `date_as_of`, count(*) AS `count` FROM `designs` UNION SELECT "Month" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH) AS `date_as_of`, count(*) AS `count` FROM `designs` WHERE `date_created` BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW() UNION SELECT "Week" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 WEEK) AS `date_as_of`, count(*) AS `count` FROM `designs` WHERE `date_created` BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW() UNION SELECT "Day" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) AS `date_as_of`, count(*) AS `count` FROM `designs` WHERE `date_created` BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW()', array());

		foreach ($select as $key => $value) {
			$tattoo_data[$value->interval] = array(
					'interval' => $value->interval,
					'date_as_of' => $value->date_as_of,
					'count' => $value->count
				);

			if ($value->interval != "All") {
				array_push($interval, $value->interval);
				array_push($date_as_of, $value->date_as_of);
				array_push($count, $value->count);
			}
		}

		$return_array['tattoo_data_array'] = $tattoo_data;
		$return_array['interval_array'] = $interval;
		$return_array['date_as_of_array'] = $date_as_of;
		$return_array['count_array'] = $count;

		return View::make("inkbox.partials.tattoo_graph", $return_array)->render();
	}

	public function postUsertattoodata() {
		$return_array = array();

		$user_count = 0;
		$tattoo_count = 0;

		$select = DB::select('SELECT "user" AS `type`, count(DISTINCT `id`) AS `count` FROM `users` UNION SELECT "tattoo" AS `type`, count(DISTINCT `id`) AS `count` FROM `designs`', array());

		foreach ($select as $key => $value) {
			if ($value->type == "user") $user_count = intval($value->count);
			else if ($value->type == "tattoo") $tattoo_count = intval($value->count);
		}

		$tattoo_user = 0;

		if ($user_count > 0) $tattoo_user = intval($tattoo_count / $user_count);

		$return_array['user_count'] = $user_count;
		$return_array['tattoo_count'] = $tattoo_count;
		$return_array['tattoo_user'] = $tattoo_user;

		$label_array = array();
		$count_array = array();

		$select = DB::select('SELECT `count` AS `design_count`, COUNT(`count`) AS `user_count` FROM (SELECT count(user_id) AS count FROM designs GROUP BY user_id) AS tmp GROUP BY `count`', array());

		foreach ($select as $key => $value) {
			array_push($label_array, $value->design_count);
			array_push($count_array, $value->user_count);
		}

		$return_array['label_array'] = $label_array;
		$return_array['count_array'] = $count_array;

		return View::make("inkbox.partials.user_tattoo_graph", $return_array)->render();
	}
}
