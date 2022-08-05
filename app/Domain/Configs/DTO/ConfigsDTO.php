<?php


namespace App\Domain\Configs\DTO;


use Spatie\DataTransferObject\DataTransferObject;

class ConfigsDTO extends DataTransferObject
{
    public $min_product_reserving_time_in_minutes;
    public $max_product_reserving_time_in_minutes;
    public $items_per_page;
    public $max_table_records;
    public $can_delete;
    public $logging;

    public static function fromRequest($request){
        return new self([
            'min_product_reserving_time_in_minutes' => $request['min_product_reserving_time_in_minutes'] ?? null,
            'max_product_reserving_time_in_minutes' => $request['max_product_reserving_time_in_minutes'] ?? null,
            'items_per_page' => $request['items_per_page'] ?? null,
            'max_table_records' => $request['max_table_records'] ?? null,
            'can_delete' => $request['can_delete'] ?? null,
            'logging' => $request['logging'] ?? null,
        ]);
    }

}
