<?php


namespace App\Domain\Global\Users\Activities\ActivityLogTables\Actions;


use App\Domain\Global\Users\Activities\ActivityLogTables\DTO\ActivityLogTableDTO;
use App\Domain\Global\Users\Activities\ActivityLogTables\Model\ActivityLogTable;

class ActivityLogTableStoreAction
{
    public static function execute(
        ActivityLogTableDTO $logTableDTO
    ){

        $logTable = new ActivityLogTable($logTableDTO->toArray());
        $logTable->save();
        return $logTable;
    }
}
