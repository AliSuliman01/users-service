<?php


namespace App\Domain\Global\Users\Activities\ActivityLogTables\Actions;


use App\Domain\Global\Users\Activities\ActivityLogTables\DTO\ActivityLogTableDTO;
use App\Domain\Global\Users\Activities\ActivityLogTables\Model\ActivityLogTable;

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
