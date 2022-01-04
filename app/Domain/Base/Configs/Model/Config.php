<?php

namespace App\Domain\Base\Configs\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Config extends Model
{
    use HasFactory,SoftDeletes;
    public static $items_per_page ;
    public static $can_delete ;
    public static $max_table_records ;
    public static $logging ;
    public static $min_product_reserving_time_in_minutes ;
    public static $max_product_reserving_time_in_minutes ;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [
        'created_by_user_id',
        'updated_by_user_id',
        'deleted_by_user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts = [
        'can_delete' => 'integer',
        'logging' => 'integer',
        'items_per_page' => 'integer',
        'min_product_reserving_time_in_minutes' => 'integer',
        'max_product_reserving_time_in_minutes' => 'integer',
    ];

    public static function set_configs($props = []){
        self::$items_per_page = $props['items_per_page'] ?? 15;
        self::$max_table_records = $props['max_table_records'] ?? 15;
        self::$can_delete = $props['can_delete'] ?? 0;
        self::$logging = $props['logging'] ?? 0;
        self::$min_product_reserving_time_in_minutes = $props['min_product_reserving_time_in_minutes'] ?? 30;
        self::$max_product_reserving_time_in_minutes = $props['max_product_reserving_time_in_minutes'] ?? 60;
    }
}
