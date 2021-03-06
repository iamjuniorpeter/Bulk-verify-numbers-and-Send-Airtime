<?php

namespace Vonage\User;

use Vonage\Client\Factory\MapFactory;

class ClientFactory
{
    public function __invoke(MapFactory $factory)
    {
        $collection = new Collection();
        $collection->setClient($factory->getClient());

        return $collection;
    }
}
