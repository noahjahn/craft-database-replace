<?php
namespace noahjahn\databasereplace\utilities;

use Craft;
use noahjahn\databasereplace\helpers\Db;

class DatabaseReplace extends \craft\base\Utility
{
    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('app', 'Database Replace');
    }
    
    /**
     * @inheritdoc
     */
    public static function id(): string
    {
        return 'database-replace';
    }

    /**
     * @inheritdoc
     */
    public static function iconPath()
    {
        return Craft::getAlias('@appicons/database.svg');
    }

    /**
     * @inheritdoc
     */
    public static function contentHtml(): string
    {
        $view = Craft::$app->getView();

        return $view->renderTemplate('noahjahn/databasereplace/DatabaseReplace', [
            'dbDriver' => self::_dbDriver(),
        ]);
    }

    private static function _dbDriver(): string
    {
        return Db::getDriverName() . ' ' . Db::getDriverVersion();
    }
}