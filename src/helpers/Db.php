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

    public static function backup($download = true)
    {
        try {
            $backupPath = self::_getDb()->backup();
        } catch (\Throwable $e) {
            throw new Exception('Could not create backup: ' . $e->getMessage());
        }

        if (!is_file($backupPath)) {
            throw new Exception("Could not create backup: the backup file doesn't exist.");
        }

        // Zip it up and delete the SQL file
        $zipPath = FileHelper::zip($backupPath);
        unlink($backupPath);

        if (!$download) {
            return true;
        }

        return $zipPath;
    }

    private static function _getDb(): DbConnection
    {
        return Craft::$app->getDb();
    }
}