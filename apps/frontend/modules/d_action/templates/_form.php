<?php $petition = $form->getObject() ?>
<form id="petition_edit_form" class="ajax_form form-horizontal" action="<?php echo url_for('petition_edit_', array('id' => $form->getObject()->getId())) ?>" method="post" enctype="multipart/form-data">
    <fieldset>
        <legend>Basic settings</legend>
        <div class="control-group">
            <label class="control-label">
                E-action type
            </label>
            <div class="controls">
                <span class="widget_text"><?php echo $petition->getKindName() ?></span>
            </div>
        </div>
        <?php echo $form->renderRows('status', 'start_at', 'end_at', 'name', '*editable') ?>
        <fieldset>
            <?php if ($petition->isEmailKind() && !$petition->isGeoKind()): ?><legend>Recipient(s) of the email action (your campaign targets)</legend><?php endif ?>
            <?php echo $form->renderRows('*email_target_name_1', '*email_target_email_1', '*email_target_name_2', '*email_target_email_2', '*email_target_name_3', '*email_target_email_3') ?>
        </fieldset>
        <?php echo $form->renderRows('*label_mode', 'read_more_url') ?>
    </fieldset>
    <fieldset>
        <legend>Customise sign-up form</legend>
        <p class="alert alert-danger">If you make changes here for a running action you may lose data if you remove fields.</p>
        <div class="global_error">
          <span id="new_petition_customise"></span>
        </div>
        <?php echo $form->renderRows('titletype', 'nametype', 'with_address', 'with_country', 'default_country', 'country_collection_id', 'with_comments', 'with_extra1', 'policy_checkbox', 'subscribe_default') ?>
      </fieldset>
    <fieldset>
        <legend>Opt-in (email verification) &amp; thank-you emails</legend>
        <?php echo $form->renderRows('from_name', 'from_email') ?>
        <div class="controls">
            <a data-collect="<?php echo Util::enc(json_encode(array('email' => '#edit_petition_from_email'))) ?>" href="<?php echo url_for('petition_spf') ?>" class="btn ajax_link post">Make SPF check</a>
        </div>
        <br />
        <?php echo $form->renderRows('*validation_required', 'landing_url', 'thank_you_email') ?>
    </fieldset>
    <fieldset>
        <legend>Donation module (optional)</legend>
        <?php echo $form->renderRows('*paypal_email', 'donate_url', 'donate_widget_edit') ?>
    </fieldset>
    <fieldset>
        <legend>Promote your e-action</legend>
        <?php echo $form->renderRows('homepage', 'twitter_tags') ?>
    </fieldset>
    <fieldset>
        <legend>Widget adjustability and standard design</legend>
        <?php echo $form->renderRows('widget_individualise') ?>
        <div class="row">
            <div class="span4">
                <?php echo $form->renderRows('themeId', 'style_bg_right_color', 'style_bg_left_color', 'style_button_primary_color', 'style_button_color') ?>
            </div>
            <div class="span4">
                <?php echo $form->renderRows('style_font_family', 'style_title_color', 'style_form_title_color', 'style_body_color', 'style_label_color') ?>
            </div>
        </div>
        <?php echo $form->renderRows('share', 'key_visual', 'show_keyvisual', 'last_signings') ?>
    </fieldset>
    <?php if ($petition->getKind() == Petition::KIND_PLEDGE): ?>
      <fieldset>
          <legend>Pledge Settings</legend>
          <?php echo $form->renderRows('pledge_with_comments', 'pledge_header_visual', 'pledge_key_visual', 'pledge_background_color', 'pledge_color', 'pledge_head_color', 'pledge_font', 'pledge_info_columns_comma') ?>
      </fieldset>
    <?php endif ?>
    <?php echo $form->renderHiddenFields() ?>
    <div class="form-actions">
        <button accesskey="s" title="[Accesskey] + S" class="btn btn-primary" type="submit">Save</button>
        <?php if ($petition->isGeoKind()): ?>
          <a class="btn submit" data-submit='{"go_target":1}'>Save &amp; select target list</a>
        <?php elseif ($petition->getKind() == Petition::KIND_PLEDGE): ?>
          <a class="btn submit" data-submit='{"go_pledge":1}'>Save &amp; define pledges</a>
        <?php else: ?>
          <a class="btn submit" data-submit='{"go_translation":1}'>Save &amp; go to actions texts and translations</a>
        <?php endif ?>
    </div>
</form>