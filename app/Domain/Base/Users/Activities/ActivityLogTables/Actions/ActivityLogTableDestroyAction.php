<?php


namespace App\Domain\Base\Users\Activities\ActivityLogTables\Actions;


use App\Domain\Base\Users\Activities\ActivityLogTables\DTO\ActivityLogTableDTO;
use App\Domain\Base\Users\Activities\ActivityLogTables\Model\ActivityLogTable;

class ActivityLogTableDestroyAction
{
    public static function execute(
        ActivityLogTableDTO   $logTableDTO
    ){

        $logTable = ActivityLogTable::find($logTableDTO->id);
        $logTable->delete();
        return $logTable;
    }
}
