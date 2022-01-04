<?php


namespace App\Domain\Base\Categories\Categories\DTO;

use Spatie\DataTransferObject\DataTransferObject;


class CategoryDTO extends DataTransferObject
{
	/* @var integer|null */
    public $id;


    public static function fromRequest($request)
    {
        return new self([
            'id'        =>  $request['id'] ?? null,

        ]);
    }
}
