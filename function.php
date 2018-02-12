<?php
function createcaptcha($flocation)
{
    global $Route;
    $_SESSION['count'] = time();
    $filelocation = (!$flocation ? $Route->folder : $flocation );
    $image = imagecreatetruecolor(150, 50) or die("Cannot Initialize new GD image stream");
    $background_color = imagecolorallocate($image, 221, 121, 55);
    $text_color = imagecolorallocate($image, 0, 255, 255);
    $line_color = imagecolorallocate($image, 64, 64, 64);
    $pixel_color = imagecolorallocate($image, 0, 0, 255);
    imagefilledrectangle($image, 0, 0, 150, 50, $background_color);
    for ($i = 0; $i < 4; $i++) {
        imageline($image, 0, rand() % 50, 150, rand() % 50, $line_color);
    }
    for ($i = 0; $i < 1000; $i++) {
        imagesetpixel($image, rand() % 150, rand() % 50, $pixel_color);
    }
    $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
    $len = strlen($letters);
    $letter = $letters[rand(0, $len - 1)];
    $text_color = imagecolorallocate($image, 0, 0, 0);
    $word = "";
    for ($i = 0; $i < 5; $i++) {
        $letter = $letters[rand(0, $len - 1)];
        imagestring($image, 7, 5 + ($i * 30), 20, $letter, $text_color);
        $word .= $letter;
    }
    $_SESSION['captcha_string'] = $word;
    $images = glob($flocation."*.png");
    foreach ($images as $image_to_delete) {
        @unlink($image_to_delete);
    }
    imagepng($image, $flocation . "image-" . $_SESSION['count'] . ".png");

    echo '<img src="'.$flocation.'image-' . $_SESSION['count'] . '.png" />';
}

?>
