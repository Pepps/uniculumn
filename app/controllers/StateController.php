<?php

class StateController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
    public function show($id)
    {

            $states = DB::table('states')->get();

            return json_encode($states);
    }

}
