<?php
/** @var $l \OCP\IL10N */
/** @var $_ array */
?>
<div class="drop-area dz-clickable">
	<div class="icon-download dz-message"></div>
	<p class="dz-clickable dz-message"><?php p($l->t('Drop your file here to generate a link')); ?></p>
</div>
<div class="url-share">
	<label><?php p($l->t('Link to share')); ?></label>
	<input id="url-drop" />
	<span class="copyButton icon-clippy" data-clipboard-target="#url-drop" title="<?php p($l->t('Copy')); ?>"></span>
</div>
