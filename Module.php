<?php

namespace Citing;

use Omeka\Module\AbstractModule;
use Laminas\EventManager\SharedEventManagerInterface;
use Laminas\View\Renderer\PhpRenderer;
use Laminas\EventManager\Event;

class Module extends AbstractModule
{
    /** Module body **/

    /**
     * Get this module's configuration array.
     *
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function attachListeners(SharedEventManagerInterface $sharedEventManager)
    {
        $controllers = [
            'Omeka\Controller\Site\Item',
        ];
        foreach ($controllers as $controller) {
            $sharedEventManager->attach(
                $controller,
                'view.show.after',
                [$this, 'displayCiting']
            );
        }
    }

    /**
     * Display
     *
     * @param Event $event
     */
    public function displayCiting(Event $event)
    {
        $view = $event->getTarget();
        $resource = $event->getTarget()->resource;
        echo $view->Citing($resource);
    }
}