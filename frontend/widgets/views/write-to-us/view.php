<section class="connect items-line--header">
    <div class="container">
        <div class="connect__content">
            <div class="items-line__top">
                <div class="items-line__top-inner">
                    <span class="main-text main-text--sm"><?= Yii::t('main', 'communications') ?></span>
                    <h2 class="main-title"><?= Yii::t('main', 'write_to_us') ?></h2>
                </div>
                <div class="items-line__top-line"></div>
            </div>
            <form action="/actions/write-us" class="connect__form" enctype="multipart/form-data">
                <div class="connect__inner">
                    <input type="text" name="name" placeholder="<?= Yii::t('main', 'first_name') ?>" class="field-input form-fields required">
                    <input type="text" name="phone" placeholder="<?= Yii::t('main', 'phone') ?>" class="field-input form-fields">
                    <div class="field-file">
                        <label for="file-input" class="file-label"><?= Yii::t('main', 'attach_file') ?></label>
                        <input type="file" name="file" id="file-input" class="form-fields" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf">
                    </div>
                </div>
                <div class="connect__inner">
                    <input type="email" name="email" placeholder="E-mail" class="field-input form-fields required">
                    <textarea name="comment" cols="30" rows="10" placeholder="<?= Yii::t('main', 'comment') ?>" class="field-textarea form-fields required"></textarea>
                    <div class="errorText" data-text="<?= Yii::t('main', 'fill_in_required_fields') ?>"><?= Yii::t('main', 'fill_in_required_fields') ?></div>
                    <div class="successText"></div>
                    <button type="submit" class="btn-purple-lg js__submitForm" onclick="formSend.send(this, event, 'write_us')"><span><?= Yii::t('main', 'send') ?></span></button>
                </div>
            </form>
        </div>
    </div>
</section>