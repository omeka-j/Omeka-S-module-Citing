<?php
namespace Citing\View\Helper;

use Omeka\Api\Representation\AbstractResourceEntityRepresentation;
use Laminas\View\Helper\AbstractHelper;

class Citing extends AbstractHelper {

    public function __invoke(AbstractResourceEntityRepresentation $resource)
    {
        $view = $this->getView();

        $title = $resource->displayTitle();

        $url = (empty($_SERVER["HTTPS"]) ? "http://" : "https://").$_SERVER["HTTP_HOST"].$resource->url();

        return $view->partial('common/citing',
            [
                'url' =>  $url,
                "title" => $title
            ]
        );
    }

}
