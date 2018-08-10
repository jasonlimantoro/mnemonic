<?php

namespace App\Presenters;

class PostPresenter extends BasePresenter {

    /**
     * Limit given field and strip html tags, if desired
     *
     * @param $field
     * @param int $limit
     * @param null $allowedTags
     * @return string
     */
    public function limitField($field, $limit = 100, $allowedTags = null){
		if(! is_null($allowedTags)){
			$description = strip_tags($this->{$field}, $allowedTags);
		} else {
			$description = $this->{$field};
		}
		
		return str_limit($description, $limit, '...');
	}
}