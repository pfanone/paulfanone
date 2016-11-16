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
		$data_array = array();

		$select = DB::select("SELECT id FROM designs LIMIT 10", array());

		foreach ($select as $key => $value) {
			array_push($data_array, array(
					'id' => $value->id
				));
		}

		$return_array['designs'] = $data_array;

		return View::make('inkbox.index', $return_array);
	}
}
