<?php
namespace noahjahn\databasereplace;

use craft\events\RegisterComponentTypesEvent;
use craft\events\RegisterTemplateRootsEvent;
use craft\services\Utilities;
use craft\web\View;
use yii\base\Event;
use noahjahn\databasereplace\utilities\DatabaseReplace;
use noahjahn\databasereplace\services\Path;

class DatabaseReplace extends \craft\base\Plugin
{
    public $packageName = 'Database Replace';

    public function init()
    {
        parent::init();

        $this->createDatabaseUploadPath();
        $this->registerDatabaseReplaceUtility();
        $this->registerDatabaseReplaceCpTemplateRoot();
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

    private function registerDatabaseReplaceCpTemplateRoot() {
        Event::on(
            View::class,
            View::EVENT_REGISTER_CP_TEMPLATE_ROOTS,
            function(RegisterTemplateRootsEvent $event) {
                $event->roots['noahjahn/databasereplace'] = __DIR__ . '/templates';
            }
        );
    }
}