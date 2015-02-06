<?php
/**
 * Theme: Pure Bootstrap
 * credit: http://code.tutsplus.com/articles/creating-a-simple-contact-form-for-simple-needs--wp-27893
 * @package Pure Bootstrap
 * @since   Pure Bootstrap 1.0
 */

  function get_the_ip() {
    if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
      return $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    elseif (isset($_SERVER["HTTP_CLIENT_IP"])) {
      return $_SERVER["HTTP_CLIENT_IP"];
    }
    else {
      return $_SERVER["REMOTE_ADDR"];
    }
  }

  function pure_bootstrap_contact_form( $atts ) {
    $sent = false;
    $page_id = get_the_ID();
    $info = '';
    $result = '';
    $email = '';
    $subject = '';
    $placeholder_name = '';
    $placeholder_email = '';
    $placeholder_phone = '';
    $placeholder_username = '';
    $placeholder_subject = '';
    $placeholder_message = '';
    $placeholder_submit = '';
    $form_data = array(
        'name' => '',
        'email' => '',
        'phone' => '',
        'subject' => '',
        'username' => '',
        'message' => '',
      );
    extract( shortcode_atts( array(
      // if you don't provide an e-mail address, the shortcode will pick the e-mail address of the admin:
      "email" => get_bloginfo( 'admin_email' ),
      "subject" => "",
      "placeholder_name" => "name",
      "placeholder_email" => "email",
      "placeholder_phone" => "phone",
      "placeholder_subject" => "subject",
      "placeholder_message" => "message",
      "placeholder_submit" => "send",
      // the error message when at least one of the required fields are empty:
      "error_empty" => "Please fill in all the required fields.",
      // the error message when the e-mail address is not valid:
      "error_noemail" => "Please enter a valid e-mail address.",
      // and the success message when the e-mail is sent:
      "success" => "Thanks for your e-mail! We'll get back to you as soon as we can."
    ), $atts ) );

    // if the <form> element is POSTed, run the following code
    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
      $error = false;
      // set the "required fields" to check
      $required_fields = array( "name", "email", "message", "subject" );
   
      // this part fetches everything that has been POSTed, sanitizes them and lets us use them as $form_data['subject']
      foreach ( $_POST as $field => $value ) {
        if ( get_magic_quotes_gpc() ) {
          $value = stripslashes( $value );
        }
        $form_data[$field] = strip_tags( $value );
      }
   
      // if the required fields are empty, switch $error to TRUE and set the result text to the shortcode attribute named 'error_empty'
      foreach ( $required_fields as $required_field ) {
        $value = trim( $form_data[$required_field] );
        if ( empty( $value ) ) {
          $error = true;
          $result = $error_empty;
        }
      }
   
      // and if the e-mail is not valid, switch $error to TRUE and set the result text to the shortcode attribute named 'error_noemail'
      if ( ! is_email( $form_data['email'] ) ) {
        $error = true;
        $result = $error_noemail;
      }
   
      if ( $error == false ) {
        if ( $form_data['username'] == '' ) {
          $phone = $form_data['phone'];
          // get the website's name and puts it in front of the subject
          $email_subject = "[" . get_bloginfo( 'name' ) . "] " . $form_data['subject'];
          if (isset($phone))
            $email_subject = "[" . get_bloginfo( 'name' ) . "] " . $form_data['name'] . ' - ' . $phone . ' - ' . $form_data['subject'];
          // get the message from the form and add the IP address of the user below it
          $email_message = $form_data['message'] . "\n\nIP: " . get_the_ip();
          // set the e-mail headers with the user's name, e-mail address and character encoding
          $headers  = "From: " . $form_data['name'] . " <" . $form_data['email'] . ">\n";
          $headers .= "Content-Type: text/plain; charset=UTF-8\n";
          $headers .= "Content-Transfer-Encoding: 8bit\n";
          // send the e-mail with the shortcode attribute named 'email' and the POSTed data
          wp_mail( $email, $email_subject, $email_message, $headers );
          // and set the result text to the shortcode attribute named 'success'
        }
        $result = $success;
        // ...and switch the $sent variable to TRUE
        $sent = true;
      }
    }


    // if there's no $result text (meaning there's no error or success, meaning the user just opened the page and did nothing) there's no need to show the $info variable
    if ( $result != "" ) {
      //$info = '<div class="info">' . $result . '</div>';

      $info = '<div id="success" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close confirmClose" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Message Sent</h4>
                  </div>
                  <div class="modal-body">
                      <div class="alert alert-primary">
                          ' . $result . '
                      </div>
                      <div class="text-right">
                        <button class="btn btn-sm btn-primary confirmClose">
                           Okay
                        </button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <script type="text/javascript" charset="utf-8" async defer>jQuery("#success").modal("show");</script>
      ';
    }
    // anyways, let's build the form! (remember that we're using shortcode attributes as variables with their names)
    $email_form = '<form class="contact-form" method="post" action="' . get_permalink() . '">
      <div id="message-name">
          <input type="text" name="name" class="form-control" id="cf-name-'. $page_id .'" size="50" maxlength="50" placeholder="' . $placeholder_name . '" value="' . $form_data['name'] . '" />
      </div>
      <div id="message-email">
          <input type="email" name="email" class="form-control" id="cf-email-'. $page_id .'" size="50" maxlength="50" placeholder="' . $placeholder_email . '" value="' . $form_data['email'] . '" />
      </div>
      <div id="message-phone">
          <input type="text" name="phone" class="form-control" id="cf-phone-'. $page_id .'" size="50" maxlength="50" placeholder="' . $placeholder_phone . '" value="' . $form_data['phone'] . '" />
      </div>
      <div id="message-subject">
          <input type="text" name="subject" class="form-control" id="cf-subject-'. $page_id .'" size="50" maxlength="50" placeholder="' . $placeholder_subject . '" value="' . $subject . $form_data['subject'] . '" />
      </div>
      <div id="message-username">
          <input type="text" name="username" class="form-control" id="cf-username-'. $page_id .'" size="50" maxlength="50" placeholder="' . $placeholder_username . '" value="' . $form_data['username'] . '" />
      </div>
      <div id="message-message">
          <textarea name="message" id="cf-message-'. $page_id .'" class="form-control" cols="50" rows="8" placeholder="type your message here...">' . $form_data['message'] . '</textarea>
      </div>
      <div id="message-submit">
          <input id="cf-submit-'. $page_id .'" type="submit" value="' . $placeholder_submit . '" class="btn btn-primary" name="send" />
      </div>
    </form>';


    if ( $sent == true ) {
      /* works better for forms in widgets */
      // return $info;
      echo $info;
    } else {
      return $info . $email_form;
    }

  }




  add_shortcode( 'contact', 'pure_bootstrap_contact_form' );
?>