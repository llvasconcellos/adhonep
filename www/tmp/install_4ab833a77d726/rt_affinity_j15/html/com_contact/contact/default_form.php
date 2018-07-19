<?php // @version $Id: default_form.php 11917 2009-05-29 19:37:05Z ian $
defined( '_JEXEC' ) or die( 'Restricted access' );
?>

<script type="text/javascript">
		function validateForm( frm ) {
			var valid = document.formvalidator.isValid(frm);
			if (valid == false) {
				// do field validation
				if (frm.email.invalid) {
				alert( "<?php echo JText::_( 'Please enter a valid e-mail address.', true );?>" );
				} else if (frm.text.invalid) {
				alert( "<?php echo JText::_( 'CONTACT_FORM_NC', true ); ?>" );
				}
				return false;
			} else {
				frm.submit();
			}
		}
</script>

	<br />
	<div class="input-surround">
	<form action="<?php echo JRoute::_( 'index.php' );?>" method="post" name="emailForm" id="emailForm" class="form-validate">
		<div class="contact_email<?php echo $this->escape($this->params->get( 'pageclass_sfx' )); ?>">
			<label for="contact_name">
				&nbsp;<?php echo JText::_( 'Enter your name' );?>:
			</label>
			<div class="input-field-l"><input type="text" name="name" id="contact_name" size="30" class="inputbox" value="" /></div>
			<div class="clr"></div>
			<label id="contact_emailmsg" for="contact_email">
				&nbsp;<?php echo JText::_( 'Email address' );?>:
			</label>
			<div class="input-field-l"><input type="text" id="contact_email" name="email" size="30" value="" class="inputbox required validate-email" maxlength="100" /></div>
			<div class="clr"></div>
			<label for="contact_subject">
				&nbsp;<?php echo JText::_( 'Message subject' );?>:
			</label>
			<div class="input-field-l"><input type="text" name="subject" id="contact_subject" size="30" class="inputbox" value="" /></div>
			<div class="clr"></div>
			<label id="contact_textmsg" for="contact_text">
				&nbsp;<?php echo JText::_( 'Enter your message' );?>:
			</label>
			<textarea cols="50" rows="10" name="text" id="contact_text" class="inputbox required"></textarea>
			<?php if ($this->contact->params->get( 'show_email_copy' )) : ?>
			<br />
				<input type="checkbox" name="email_copy" id="contact_email_copy" value="1"  />
				<label for="contact_email_copy">
					<?php echo JText::_( 'EMAIL_A_COPY' ); ?>
				</label>
			<?php endif; ?>
			<br />
			<br />
			<div class="readon-wrap1"><div class="readon1-l"></div><a class="readon-main"><span class="readon1-m"><span class="readon1-r"><input class="button validate" type="submit" value="<?php echo JText::_('Send'); ?>" /></span></span></a></div>
		</div>

	<input type="hidden" name="option" value="com_contact" />
	<input type="hidden" name="view" value="contact" />
	<input type="hidden" name="id" value="<?php echo (int)$this->contact->id; ?>" />
	<input type="hidden" name="task" value="submit" />
	<?php echo JHTML::_( 'form.token' ); ?>
	</form>
	</div>