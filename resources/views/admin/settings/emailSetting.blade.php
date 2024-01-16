@extends('layouts.app')

@section('content')
<form action="{{ route('admin.settings.emailSetting.saveOrUpdate') }}" method="post" class="emailSetting-form" id="form">
    @csrf
    <div class="row">
        <div class="mb-3">
            <label for="mail_engine" class="form-label">Mail Engine</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="mail_engine" id="mail_engine_mailgun" value="mailgun" {{ isset($emailInfo['mail_engine']) == 'mailgun' ? 'checked' : '' }}>
                <label class="form-check-label" for="mail_engine_mailgun">
                    Mailgun
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="mail_engine" id="mail_engine_postmark" value="postmark" {{ isset($emailInfo['mail_engine']) == 'postmark' ? 'checked' : '' }}>
                <label class="form-check-label" for="mail_engine_postmark">
                    Postmark
                </label>
            </div>
            <!-- Add more options as needed -->
        </div>


        <div class="mb-3">
            <label for="email_protocol" class="form-label">Email Protocol</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="email_protocol" id="email_protocol_smtp" value="smtp" {{ isset($emailInfo['email_protocol']) == 'smtp' ? 'checked' : '' }}>
                <label class="form-check-label" for="email_protocol_smtp">
                    SMTP
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="email_protocol" id="email_protocol_sendmail" value="sendmail" {{ isset($emailInfo['email_protocol']) == 'sendmail' ? 'checked' : '' }}>
                <label class="form-check-label" for="email_protocol_sendmail">
                    Sendmail
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="email_protocol" id="email_protocol_mail" value="mail" {{ isset($emailInfo['email_protocol']) == 'mail' ? 'checked' : '' }}>
                <label class="form-check-label" for="email_protocol_mail">
                    Mail
                </label>
            </div>
            <!-- Add more options as needed -->
        </div>

        <!-- Fields for SMTP -->
        <div id="smtpAndSendmailFields" style="display: {{ isset($emailInfo['email_protocol'])  && $emailInfo['email_protocol'] == 'smtp' ? 'block' : 'none' }}">
            <div class="mb-3">
                <label for="smtp_host" class="form-label">SMTP Host</label>
                <input type="text" class="form-control" name="smtp_host"  value="{{ $emailInfo['smtp_host'] ?? '' }}">
            </div>

            <div class="mb-3">
                <label for="mailer" class="form-label">Mailer</label>
                <input type="text" class="form-control" name="mailer" value="{{ $emailInfo['mailer'] ?? '' }}">
            </div>

            <div class="mb-3">
                <label for="smtp_port" class="form-label">SMTP Port</label>
                <input type="text" class="form-control" name="smtp_port"  value="{{ $emailInfo['smtp_port'] ?? '' }}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email"  value="{{ $emailInfo['email'] ?? '' }}">
            </div>

            <div class="mb-3">
                <label for="smtp_username" class="form-label">SMTP Username</label>
                <input type="text" class="form-control" name="smtp_username"  value="{{ $emailInfo['smtp_username'] ?? '' }}">
            </div>

            <div class="mb-3">
                <label for="smtp_password" class="form-label">SMTP Password</label>
                <input type="password" class="form-control" name="smtp_password"  value="{{ $emailInfo['smtp_password'] ?? '' }}">
            </div>

            <div class="mb-3">
                <label for="email_charset" class="form-label">Email Charset</label>
                <input type="text" class="form-control" name="email_charset" value="{{ $emailInfo['email_charset'] ?? '' }}">
            </div>

            <div class="mb-3">
                <label for="bcc_all_emails_to" class="form-label">BCC All Emails To</label>
                <input type="text" class="form-control" name="bcc_all_emails_to" value="{{ $emailInfo['bcc_all_emails_to'] ?? '' }}">
            </div>

            <div class="mb-3">
                <label for="email_signature" class="form-label">Email Signature</label>
                <textarea class="form-control" name="email_signature">{{ $emailInfo['email_signature'] ?? '' }}</textarea>
            </div>

            <div class="mb-3">
                <label for="predefined_header" class="form-label">Predefined Header</label>
                <textarea class="form-control" name="predefined_header">{{ $emailInfo['predefined_header'] ?? '' }}</textarea>
            </div>

            <div class="mb-3">
                <label for="predefined_footer" class="form-label">Predefined Footer</label>
                <textarea class="form-control" name="predefined_footer">{{ $emailInfo['predefined_footer'] ?? '' }}</textarea>
            </div>
        </div>

             <!-- Fields for Mail -->
            <div id="mailFields" style="display: {{ isset($emailInfo['email_protocol']) && $emailInfo['email_protocol'] == 'mail' ? 'block' : 'none' }}">

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="mail_email" value="{{ $emailInfo['mail_email'] ?? '' }}">
                </div>

                <div class="mb-3">
                    <label for="email_charset" class="form-label">Email Charset</label>
                    <input type="text" class="form-control" name="mail_email_charset" value="{{ $emailInfo['mail_email_charset'] ?? '' }}">
                </div>

                <div class="mb-3">
                    <label for="bcc_all_emails_to" class="form-label">BCC All Emails To</label>
                    <input type="text" class="form-control" name="mail_bcc_all_emails_to" value="{{ $emailInfo['mail_bcc_all_emails_to'] ?? '' }}">
                </div>

                <div class="mb-3">
                    <label for="email_signature" class="form-label">Email Signature</label>
                    <textarea class="form-control" name="mail_email_signature">{{ $emailInfo['mail_email_signature'] ?? '' }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="predefined_header" class="form-label">Predefined Header</label>
                    <textarea class="form-control" name="mail_predefined_header">{{ $emailInfo['mail_predefined_header'] ?? '' }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="predefined_footer" class="form-label">Predefined Footer</label>
                    <textarea class="form-control" name="mail_predefined_footer">{{ $emailInfo['mail_predefined_footer'] ?? '' }}</textarea>
                </div>
            </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <button class="btn btn-primary float-end mr-2 emailSetting-form-submiter" type="submit">Save</button>
            </div>
        </div>
    </div>

    <!-- Include JavaScript to toggle visibility based on selected Email Protocol -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var smtpAndSendmailFields = document.getElementById('smtpAndSendmailFields');
            var mailFields = document.getElementById('mailFields');

            function toggleFieldsVisibility() {
                if (smtpAndSendmailFields) {
                    smtpAndSendmailFields.style.display = (
                        document.getElementById('email_protocol_smtp').checked ||
                        document.getElementById('email_protocol_sendmail').checked
                    ) ? 'block' : 'none';
                }

                if (mailFields) {
                    mailFields.style.display = document.getElementById('email_protocol_mail').checked ? 'block' : 'none';
                }
            }

            // Initial visibility based on selected Email Protocol
            toggleFieldsVisibility();

            // Add change event listener to update visibility when Email Protocol changes
            document.querySelectorAll('input[name="email_protocol"]').forEach(function(radio) {
                radio.addEventListener('change', toggleFieldsVisibility);
            });
        });
    </script>




</form>



@endsection


