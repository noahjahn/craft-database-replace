<?php
namespace noahjahn\craftdatabasereplace;

use craft\events\RegisterComponentTypesEvent;
use craft\services\Utilities;
use yii\base\Event;
use noahjahn\craftdatabasereplace\utilities\DatabaseReplace;

class Plugin extends \craft\base\Plugin
{
    public $packageName = 'Database Replace';

    public function init()
    {
        parent::init();

        Event::on(
            Utilities::class,
            Utilities::EVENT_REGISTER_UTILITY_TYPES,
            function(RegisterComponentTypesEvent $event) {
                $event->types[] = DatabaseReplace::class;
            }
        );
    }
}