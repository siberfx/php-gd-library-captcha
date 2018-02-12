<?php
// we including the function...
include_once "function.php";

// where the file is located...
if (isset($_SERVER['HTTP_HOST']))
{
    if (strpos($_SERVER['HTTP_HOST'], ':') !== FALSE)
    {
        $serverhost = '['.$_SERVER['HTTP_HOST'].']';
    }
    else
    {
        $serverhost = $_SERVER['HTTP_HOST'];
    }

  // you can make your own controller for that that if the host has https or not.
    $site = 'http://'.$serverhost
    .substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
}

$Route (object) array(
'folder'  => $site . 'captcha/' // This is where the cached file located.
);
?>
<form method="post" action="mail.php">
<div class="col-md-6">
  <div class="form-group">
    <div class="col-md-6">
      <?php echo createcaptcha($Route->folder); ?>
    </div>
    <div class="col-md-6">
      <input type="text" name="sbxcaptcha" placeholder="Enter your code." required="required">
    </div>
  </div>
</div>
</form>
