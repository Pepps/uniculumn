<?php

class CategoryController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
    public function show($id)
    {

            $categories = DB::table('Categories')->where('subcategory_id', '=', $id)->get();

            return json_encode($categories);
    }

}
