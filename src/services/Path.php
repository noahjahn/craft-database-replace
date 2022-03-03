<?php
namespace noahjahn\databasereplace\services;

use Craft;
use craft\helpers\FileHelper;
use yii\base\Component;

class Path extends Component
{
    /**
     * Returns the path to the `storage/database-replace/` directory.
     * 
     * TODO: make this value configurable in the control panel settings
     *
     * @param bool $create Whether the directory should be created if it doesn't exist
     * @return string
     */
    public static function getDatabaseUploadPath(bool $create = true): string
    {
        $path = Craft::$app->path->getStoragePath($create) . DIRECTORY_SEPARATOR . 'database-replace';

        if ($create) {
            FileHelper::createDirectory($path);
            FileHelper::writeGitignoreFile($path);
        }

        return $path;
    }
}