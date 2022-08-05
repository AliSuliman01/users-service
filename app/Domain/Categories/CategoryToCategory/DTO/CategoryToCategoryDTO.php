<?php


namespace App\Domain\Categories\CategoryToCategory\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class CategoryToCategoryDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;
    /* @var integer|null */
public $parent_id;
	/* @var integer|null */
public $son_id;


    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,
            'parent_id' 					=> $request['parent_id'] ?? null ,
			'son_id' 					=> $request['son_id'] ?? null ,

        ]);
    }
}
