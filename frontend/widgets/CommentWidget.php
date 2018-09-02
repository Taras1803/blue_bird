<?php

namespace frontend\widgets;

use yii\bootstrap\Widget;
use common\models\Comment;
use common\models\Lang;

class CommentWidget extends Widget
{
    public $item_type;
    public $item_id;

    public function run()
    {
        return $this->render('comment/view', [
            'lang' => Lang::getCurrent(),
            'item_type' => $this->item_type,
            'item_id' => $this->item_id,
            'comments' => Comment::find()
                ->where(['status' => 1])
                ->andWhere(['item_type' => $this->item_type])
                ->andWhere(['item_id' => $this->item_id])
                ->orderBy(['id' => SORT_DESC])
                ->limit(8)
                ->all(),
        ]);
    }
}