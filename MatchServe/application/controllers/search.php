<?php

/* This provides all of the business logic of the search page */

class Search_Controller extends Base_Controller {
    
    public function action_index() {
        return View::make('search');
    }
    
    public function action_query($query) {
        return View::make('search')
                    ->with('name','Pierre');
    }
}

?>