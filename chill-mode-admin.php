<?php

if(isset($_POST['chill_hidden']) && $_POST['chill_hidden'] == 'chill_mode') {
  if(1 === check_admin_referer('chill-mode')) {

    $chillModeTitle = $_POST['chillModeTitle'];
    update_option('chillModeTitle', $chillModeTitle);

    $chillModeHeading = $_POST['chillModeHeading'];
    update_option('chillModeHeading', $chillModeHeading);

    $chillModeMessage = $_POST['chillModeMessage'];
    update_option('chillModeMessage', $chillModeMessage);

    $chillModeStyling = stripslashes($_POST['chillModeStyling']);
    update_option('chillModeStyling', $chillModeStyling);

    $chillModeScripts = stripslashes($_POST['chillModeScripts']);
    update_option('chillModeScripts', $chillModeScripts); ?>

    <div class="updated"><p><strong>Options saved.</strong></p></div><?php
  } else {
    die('Permission denied.');
  }
} else {
  $chillModeTitle = get_option('chillModeTitle');
  $chillModeHeading = get_option('chillModeHeading');
  $chillModeMessage = get_option('chillModeMessage');
  $chillModeStyling = get_option('chillModeStyling');
  $chillModeScripts = get_option('chillModeScripts');
} ?>

<style>

  input {
    width: 100%;
  }
  textarea {
    width: 100%;
    min-height: 100px;
  }
  textarea.customCode {
    font-family: monospace, sans-serif;
    min-height: 200px;
  }
  input.btn {
    width: auto;
    margin-top: 15px;
  }

  /* Maintenance Mode Message */
  #message {
    margin: 20px 15px 0 0;
    padding: 10px 12px;
    border-left: none;
    border-top: 4px solid #dd3d36;
  }
  #message p {
    color: #dd3d36;
    font-size: 30px;
    text-align: center;
  }
  #message p a {
    display: block;
    font-size: 14px;
  }

</style>

<h2>Chill Mode</h2>
<hr>
<p>Edit the page settings for when chill mode is activated.</p>
<hr>
<form name="chill_form_update_options" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
  <input type="hidden" name="chill_hidden" value="chill_mode">
  <?php wp_nonce_field('chill-mode'); ?>
  <table class="form-table">
    <tr>
      <th><label for="chillModeTitle">Page Title</label></th>
      <td><input id="chillModeTitle" type="text" name="chillModeTitle" placeholder="We'll be right back." value="<?php echo $chillModeTitle ? $chillModeTitle : ''; ?>"></td>
    </tr>
    <tr>
      <th><label for="chillModeHeading">Heading</label></th>
      <td><input id="chillModeHeading" type="text" name="chillModeHeading" placeholder="Undergoing Maintenance" value="<?php echo $chillModeHeading ? $chillModeHeading : ''; ?>"></td>
    </tr>
    <tr>
      <th><label for="chillModeMessage">Message</label></th>
      <td><textarea id="chillModeMessage" type="text" name="chillModeMessage" placeholder="Hang tight. We'll be right back."><?php echo $chillModeMessage ? $chillModeMessage : ''; ?></textarea></td>
    </tr>
  </table>
  <hr>
  <p>Add any custom styling or scripts below. No need to include the HTML tags. Just copy and paste.</p>
  <hr>
  <table class="form-table">
    <tr>
      <th><label for="chillModeStyling">Custom Styles</label></th>
      <td><textarea id="chillModeStyling" type="text" name="chillModeStyling" class="customCode"><?php echo $chillModeStyling ? $chillModeStyling : ''; ?></textarea></td>
    </tr>
    <tr>
      <th><label for="chillModeScripts">Custom Scripts</label></th>
      <td><textarea id="chillModeScripts" type="text" name="chillModeScripts" class="customCode"><?php echo $chillModeScripts ? $chillModeScripts : ''; ?></textarea></td>
    </tr>
  </table>
  <input class="btn button" type="submit" name="Submit" value="Update Settings" />
</form>
