@extends('layouts.app')
@section('content')
<section style="background:#fff; width: 98.1%; margin-top: auto;">
<div class="contact">
	<div class="contact-wrap clearfix">
		<div class="contact-col1 span7">
			<div class="contact-view">
				<h3>Contact</h3>
				<div class="contact-misc">
                <p>
                    <iframe src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=77%20Itire%20Road%20%2C%20Surulere%2C%20Lagos%2C%20Nigeria.+(Ecole%20De%20Dessin)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
                </p>
                <p>You can use our contact form on the left to send your inquiries directly to us.</p></div><div class="contact-address dl-horizontal"><div class="contact-info"><span class="jicons-text" ><i class="icon-home"></i>
					Address: 				</span><span class="contact-street">
					77 Itire Road , Surulere, Lagos, Nigeria.<br/></span></div><div class="contact-info"></div><div class="contact-info"></div><div class="contact-info"><span class="jicons-text" ><i class="icon-phone"></i>
				Mobile: 			</span><span class="contact-mobile">
				+234-8059994834			</span></div><div class="contact-info"><span class="jicons-text" ><i class="icon-phone"></i>
				Phone: 			</span><span class="contact-telephone">
				+234(01)875 9962			</span></div><div class="contact-info"><span class="jicons-text" ><i class="icon-envelope"></i>
                Email: 			</span>
                <span class="contact-emailto"></span>
				</div>
			</div>
		</div>
	</div>
	<div class="contact-col2 span4">
		<div class="contact-view">
            @include('inc.messages')
			<h3>Contact Form</h3>
			<div class="contact-form">
				<form id="contact-form" action="dashboard/contact" method="post" class="form-validate form-horizontal">
                    @csrf
					<fieldset>
						<legend>Send an email. All fields with an * are required.</legend>
						<div class="control-group-header">
							<div class="control-contact">
								<label id="jform_contact_name-lbl" for="jform_contact_name" class="hasTooltip required" title="
									<strong>Name</strong>
									<br />Your name">Name
									<span class="star">&#160;*</span>
								</label>
								<input type="text" name="contact_name" id="jform_contact_name" value="" class="required" size="30" required="required" aria-required="true"/>
							</div>
							<div class="control-contact">
								<label id="jform_contact_emailmsg-lbl" for="jform_contact_emailmsg" class="hasTooltip required" title="
									<strong>Subject</strong>
									<br />Enter the subject of your message here .">Subject
									<span class="star">&#160;*</span>
								</label>
								<input type="text" name="contact_subject" id="jform_contact_emailmsg" value="" class="required" size="60" required="required" aria-required="true"/>
							</div>
							<div class="control-contact">
								<label id="jform_contact_email-lbl" for="jform_contact_email" class="hasTooltip required" title="
									<strong>Email</strong>
									<br />Email for contact">Email
									<span class="star">&#160;*</span>
								</label>
								<input type="text" name="contact_email" class=" required" id="jform_contact_email" value="" size="30" required="required" aria-required="true"/>
							</div>
							<div class="control-contact">
								<label id="jform_contact_message-lbl" for="jform_contact_message" class="hasTooltip required" title="
									<strong>Message</strong>
									<br />Enter your message here.">Message
									<span class="star">&#160;*</span>
								</label>
								<textarea name="contact_message" id="jform_contact_message" cols="50" rows="10" class="required" required="required" aria-required="true"></textarea>
							</div>
						</div>
						<div class="re-captcha">
							<div class="control-group">
								<div class="controls"></div>
							</div>
						</div>
						<div class="control-group-footer clearfix">
							<div class="control-group">
								<input type="checkbox" name="contact_email_copy" id="jform_contact_email_copy" value="1" />
								<label id="jform_contact_email_copy-lbl" for="jform_contact_email_copy" class="hasTooltip" title="
									<strong>Send copy to yourself</strong>
									<br />Sends a copy of the message to the address you have supplied.">Send copy to yourself
								</label>
							</div>
							<div class="control-group">
								<button class="btn btn-primary validate" type="submit">Send Email</button>
								<input type="hidden" name="option" value="com_contact" />
								<input type="hidden" name="task" value="contact.submit" />
								<input type="hidden" name="return" value="" />
								<input type="hidden" name="id" value="1:contact-us" />
								<input type="hidden" name="2e01ba32679636dd6d02284442e1564b" value="1" />
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<h3>Links</h3>
			<div class="contact-links">
				<ul class="nav nav-tabs nav-stacked">
					<li>
						<a href="http://twitter.com/ecoledessin1">
								Twitter							</a>
					</li>
					<li>
						<a href="http://www.facebook.com/ecolededessin">
								Facebook							</a>
					</li>
				</ul>
			</div>
		</div>
    </div>
</section>
<!-- //MAIN CONTENT -->

@endsection