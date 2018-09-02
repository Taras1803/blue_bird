<section class="comment items-line--header">
    <div class="container">
        <div class="comment__content">
            <div class="items-line__top">
                <div class="items-line__top-inner">
                    <span class="main-text main-text--sm"><?= Yii::t('main', 'yours') ?></span>
                    <h2 class="main-title"><?= Yii::t('main', 'comments') ?></h2>
                </div>
                <div class="items-line__top-line"></div>
            </div>
            <div class="comment__holder">
                <div class="comment__items scrollbar">
                    <?php foreach ($comments as $comment): ?>
                    <div class="comment__item">
                        <strong><?= $comment->user_name?></strong>
                        <span><?= date("d/m/Y", $comment->created_at) ?></span>
                        <p class="main-text"><?= $comment->comment ?>
                        </p>
                    </div>
                    <?php endforeach; ?>
                </div>
                <form action="/actions/comment" class="comment__form">
                    <input type="hidden" class="form-fields" name="item_id" value="<?= $item_id ?>">
                    <input type="hidden" class="form-fields" name="item_type" value="<?= $item_type ?>">
                    <input type="hidden" class="form-fields" name="lang_id" value="<?= $lang->id ?>">
                    <input type="text" name="user_name" placeholder="<?= Yii::t('main', 'first_name') ?>" class="field-input form-fields required">
                    <textarea name="comment" cols="30" rows="10" placeholder="<?= Yii::t('main', 'comment') ?>" class="field-textarea form-fields required"></textarea>
                    <div class="errorText" data-text="<?= Yii::t('main', 'fill_in_required_fields') ?>"><?= Yii::t('main', 'fill_in_required_fields') ?></div>
                    <div class="successText"></div>
                    <button type="submit" class="btn-purple-lg js__submitForm" onclick="formSend.send(this, event, 'comment')"><span><?= Yii::t('main', 'send') ?></span></button>
                </form>
            </div>
        </div>
    </div>
</section>