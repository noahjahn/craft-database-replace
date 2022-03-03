<?php
namespace noahjahn\databasereplace\helpers;

use Craft;
use craft\controllers\UtilityController;
use craft\db\Connection as DbConnection;
use craft\helpers\App;
use craft\helpers\FileHelper;

class Db
{
    public static function getDriverName(): string
    {
        $db = self::_getDb();

        if ($db->getIsMysql()) {
            $driverName = 'MySQL';
        } else {
            $driverName = 'PostgreSQL';
        }

        return $driverName;
    }

    public static function getDriverVersion(): string
    {
        $db = self::_getDb();
        return App::normalizeVersion($db->getSchema()->getServerVersion());
    }

    private static function _getDb(): DbConnection
    {
        return Craft::$app->getDb();
    }
}