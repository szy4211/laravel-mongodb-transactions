<?php

namespace  Zs\Mongodb\Eloquent;

use Zs\Mongodb\Query\Builder as QueryBuilder;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

abstract class Model extends Eloquent
{
    /**
     * @inheritdoc
     */
    protected function newBaseQueryBuilder()
    {
        $connection = $this->getConnection();

        return new QueryBuilder($connection, $connection->getPostProcessor());
    }
}
