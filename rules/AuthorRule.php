<?php
namespace app\rbac;

use yii\rbac\Rule;

class AuthorRule extends Rule
{
public $name = 'isAuthor'; // Имя правила

public function execute($user_id, $item, $params)
{
    return isset($params['author_id']) ? $params['author_id']->createdBy == $user_id : false;
}
}
