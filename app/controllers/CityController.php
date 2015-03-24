<?php

class CityController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
    public function show($id)
    {

            $cities = DB::table('cities')->where('state_id', '=', $id)->get();

            return json_encode($cities);
    }

}
