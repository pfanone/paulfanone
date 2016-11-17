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

		$user_data = array();
		$user_interval = array();
		$user_date_as_of = array();
		$user_count = array();

		$user_select = DB::select('SELECT "All" AS `interval`, "" `date_as_of`, count(*) AS `count` FROM `users` UNION SELECT "Month" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW() UNION SELECT "Week" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 WEEK) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW() UNION SELECT "Day" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW()', array());

		foreach ($user_select as $key => $value) {
			$user_data[$value->interval] = array(
					'interval' => $value->interval,
					'date_as_of' => $value->date_as_of,
					'count' => $value->count
				);

			if ($value->interval != "All") {
				array_push($user_interval, $value->interval);
				array_push($user_date_as_of, $value->date_as_of);
				array_push($user_count, $value->count);
			}
		}

		$return_array['user_data_array'] = $user_data;

		$tattoo_data = array();
		$tattoo_interval = array();
		$tattoo_date_as_of = array();
		$tattoo_count = array();

		$tattoo_select = DB::select('SELECT "All" AS `interval`, "" AS `date_as_of`, count(*) AS `count` FROM `designs` UNION SELECT "Month" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH) AS `date_as_of`, count(*) AS `count` FROM `designs` WHERE `date_created` BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW() UNION SELECT "Week" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 WEEK) AS `date_as_of`, count(*) AS `count` FROM `designs` WHERE `date_created` BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW() UNION SELECT "Day" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) AS `date_as_of`, count(*) AS `count` FROM `designs` WHERE `date_created` BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW()', array());

		foreach ($tattoo_select as $key => $value) {
			$tattoo_data[$value->interval] = array(
					'interval' => $value->interval,
					'date_as_of' => $value->date_as_of,
					'count' => $value->count
				);

			if ($value->interval != "All") {
				array_push($tattoo_interval, $value->interval);
				array_push($tattoo_date_as_of, $value->date_as_of);
				array_push($tattoo_count, $value->count);
			}
		}

		$return_array['tattoo_data_array'] = $tattoo_data;

		$user_tattoo_data = array();
		$count_array = array();

		foreach ($user_data as $key => $value) {
			$user_tattoo_value = 0;
			if ($user_data[$key]['count'] > 0) {
				$user_tattoo_value = intval($tattoo_data[$key]['count'] / $user_data[$key]['count']);
			}
			$user_tattoo_data[$key] = $user_tattoo_value;

			if ($key != "All") array_push($count_array, $user_tattoo_value);
		}

		$return_array['user_tattoo_data_array'] = $user_tattoo_data;

		dd($user_tattoo_data);

		$return_array['interval_array'] = $user_interval;
		$return_array['date_as_of_array'] = $user_date_as_of;
		$return_array['count_array'] = $count_array;
		
		return View::make("inkbox.partials.user_tattoo_graph", $return_array)->render();
	}
}
