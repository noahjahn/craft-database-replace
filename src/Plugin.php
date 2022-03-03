<?php
namespace noahjahn\databasereplace;

use craft\events\RegisterComponentTypesEvent;
use craft\services\Utilities;
use yii\base\Event;
use noahjahn\databasereplace\utilities\DatabaseReplace;
use noahjahn\databasereplace\services\Path;

class Plugin extends \craft\base\Plugin
{
    public $packageName = 'Database Replace';

    public function init()
    {
        parent::init();

        $this->createDatabaseUploadPath();
        $this->registerDatabaseReplaceUtility();
    }

    private function createDatabaseUploadPath() {
        Path::getDatabaseUploadPath(true);
    }

    private function registerDatabaseReplaceUtility() {
        Event::on(
            Utilities::class,
            Utilities::EVENT_REGISTER_UTILITY_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = DatabaseReplace::class;
            }
        );
    }
}