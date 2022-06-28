<?php

namespace app\modules\admin\models;
use paulzi\adjacencyList\AdjacencyListQueryTrait;

class MenuQuery extends  \yii\db\ActiveQuery
{
    use AdjacencyListQueryTrait;
}