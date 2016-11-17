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

		$interval_current = array();
		$date_as_of_current = array();
		$count_current = array();

		$interval_past = array();
		$date_as_of_past = array();
		$count_past = array();

		$count_difference = array();

		$select = DB::select('SELECT 0 AS `type`, "All" AS `interval`, "" `date_as_of`, count(*) AS `count` FROM `users`'
			. ' UNION'
			. ' SELECT 1 AS `type`, "Month" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()'
			. ' UNION'
			. ' SELECT 1 AS `type`, "Week" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 WEEK) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()'
			. ' UNION'
			. ' SELECT 1 AS `type`, "Day" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW()'
			. ' UNION'
			. ' SELECT 2 AS `type`, "Month" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND DATE_SUB(NOW(), INTERVAL 1 MONTH)'
			. ' UNION'
			. ' SELECT 2 AS `type`, "Week" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 WEEK) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 2 WEEK) AND DATE_SUB(NOW(), INTERVAL 1 WEEK)'
			. ' UNION'
			. ' SELECT 2 AS `type`, "Day" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) AS `date_as_of`, count(*) AS `count` FROM `users` WHERE `last_login` BETWEEN DATE_SUB(NOW(), INTERVAL 2 DAY) AND DATE_SUB(NOW(), INTERVAL 1 DAY)', array());

		foreach ($select as $key => $value) {
			if ($value->type != 2) {
				$user_data[$value->interval] = array(
					'type' => $value->type,
					'interval' => $value->interval,
					'date_as_of' => $value->date_as_of,
					'count' => $value->count
				);
			}

			if ($value->type == 1) {
				array_push($interval_current, $value->interval);
				array_push($date_as_of_current, $value->date_as_of);
				array_push($count_current, $value->count);
			}
			else if ($value->type == 2) {
				array_push($interval_past, $value->interval);
				array_push($date_as_of_past, $value->date_as_of);
				array_push($count_past, $value->count);
			}
		}

		foreach ($count_current as $key => $value) {
			$difference = $count_current[$key] - $count_past[$key];
			
			if ($difference > 0) 
				$diff_string = ' <i class="fa fa-caret-up" aria-hidden="true"></i> ' . abs($difference);
			else if ($difference < 0) 
				$diff_string = ' <i class="fa fa-caret-down" aria-hidden="true"></i> ' . abs($difference);
			else
				$diff_string = ' - ';

			$count_difference[$interval_current[$key]] = $diff_string;
		}

		$return_array['user_data_array'] = $user_data;
		$return_array['interval_array'] = $interval_current;
		$return_array['date_as_of_array'] = $date_as_of_current;
		$return_array['count_array'] = $count_current;
		$return_array['count_difference'] = $count_difference;

		return View::make("inkbox.partials.user_graph", $return_array)->render();
	}

	public function postTattoodata() {
		$return_array = array();
		$tattoo_data = array();

		$interval_current = array();
		$date_as_of_current = array();
		$count_current = array();

		$interval_past = array();
		$date_as_of_past = array();
		$count_past = array();

		$count_difference = array();

		$select = DB::select('SELECT 0 AS `type`, "All" AS `interval`, "" `date_as_of`, count(*) AS `count` FROM `designs`'
			. ' UNION'
			. ' SELECT 1 AS `type`, "Month" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH) AS `date_as_of`, count(*) AS `count` FROM `designs` WHERE `date_created` BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()'
			. ' UNION'
			. ' SELECT 1 AS `type`, "Week" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 WEEK) AS `date_as_of`, count(*) AS `count` FROM `designs` WHERE `date_created` BETWEEN DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()'
			. ' UNION'
			. ' SELECT 1 AS `type`, "Day" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) AS `date_as_of`, count(*) AS `count` FROM `designs` WHERE `date_created` BETWEEN DATE_SUB(NOW(), INTERVAL 1 DAY) AND NOW()'
			. ' UNION'
			. ' SELECT 2 AS `type`, "Month" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 MONTH) AS `date_as_of`, count(*) AS `count` FROM `designs` WHERE `date_created` BETWEEN DATE_SUB(NOW(), INTERVAL 2 MONTH) AND DATE_SUB(NOW(), INTERVAL 1 MONTH)'
			. ' UNION'
			. ' SELECT 2 AS `type`, "Week" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 WEEK) AS `date_as_of`, count(*) AS `count` FROM `designs` WHERE `date_created` BETWEEN DATE_SUB(NOW(), INTERVAL 2 WEEK) AND DATE_SUB(NOW(), INTERVAL 1 WEEK)'
			. ' UNION'
			. ' SELECT 2 AS `type`, "Day" AS `interval`, DATE_SUB(CURRENT_DATE, INTERVAL 1 DAY) AS `date_as_of`, count(*) AS `count` FROM `designs` WHERE `date_created` BETWEEN DATE_SUB(NOW(), INTERVAL 2 DAY) AND DATE_SUB(NOW(), INTERVAL 1 DAY)', array());

		foreach ($select as $key => $value) {
			if ($value->type != 2) {
				$tattoo_data[$value->interval] = array(
					'type' => $value->type,
					'interval' => $value->interval,
					'date_as_of' => $value->date_as_of,
					'count' => $value->count
				);
			}

			if ($value->type == 1) {
				array_push($interval_current, $value->interval);
				array_push($date_as_of_current, $value->date_as_of);
				array_push($count_current, $value->count);
			}
			else if ($value->type == 2) {
				array_push($interval_past, $value->interval);
				array_push($date_as_of_past, $value->date_as_of);
				array_push($count_past, $value->count);
			}
		}

		foreach ($count_current as $key => $value) {
			$difference = $count_current[$key] - $count_past[$key];
			
			if ($difference > 0) 
				$diff_string = ' <i class="fa fa-caret-up" aria-hidden="true"></i> ' . abs($difference);
			else if ($difference < 0) 
				$diff_string = ' <i class="fa fa-caret-down" aria-hidden="true"></i> ' . abs($difference);
			else
				$diff_string = ' - ';

			$count_difference[$interval_current[$key]] = $diff_string;
		}

		$return_array['tattoo_data_array'] = $tattoo_data;
		$return_array['interval_array'] = $interval_current;
		$return_array['date_as_of_array'] = $date_as_of_current;
		$return_array['count_array'] = $count_current;
		$return_array['count_difference'] = $count_difference;

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

		$select = DB::select('SELECT `count` AS `design_count`, COUNT(`count`) AS `user_count` FROM (SELECT count(user_id) AS count FROM designs GROUP BY user_id) AS tmp GROUP BY `count` ORDER BY `count` ASC', array());

		foreach ($select as $key => $value) {
			array_push($label_array, $value->design_count);
			array_push($count_array, $value->user_count);
		}

		$return_array['label_array'] = $label_array;
		$return_array['count_array'] = $count_array;

		return View::make("inkbox.partials.user_tattoo_graph", $return_array)->render();
	}

	public function postTattoolist() {
		$return_array = array();
		$tattoo_array = array();

		$select = DB::select('SELECT `id`, `user_id`, `save_count`, `deleted`, `design_name`, `preview_image`, `width`, `height`, `date_created`, `date_updated` FROM `designs` WHERE `deleted` = 0 ORDER BY `date_updated` DESC, `date_created` DESC', array());

		foreach ($select as $key => $value) {
			array_push($tattoo_array, array(
						'id' => $value->id,
						'user_id' => $value->user_id,
						'save_count' => $value->save_count,
						'deleted' => $value->deleted,
						'design_name' => $value->design_name,
						'preview_image' => $value->preview_image,
						'width' => $value->width,
						'height' => $value->height,
						'date_created' => date("Y-m-d", strtotime($value->date_created)),
						'date_updated' => date("Y-m-d", strtotime($value->date_updated))
					)
				);
		}

		$return_array['tattoo_array'] = $tattoo_array;

		return View::make("inkbox.partials.tattoo", $return_array)->render();
	}
}