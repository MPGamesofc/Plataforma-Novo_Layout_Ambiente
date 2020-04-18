<?php
/**
 * Arcadia - Arcade Gaming Platform
 * @author Norielle Cruz <http://noriellecruz.com>
 */ 

/**
 * Start Session
 */
 
 session_start();

/**
 * Require Captcha Class
 */
 
require '../captcha.class.php';

/**
 * Print Captcha
 */
 
$captchaConfig = array(
     'img_width' => '210',
     'img_height' => '55',
     'font_size' => '26',
     'font_path' => '../assets/cheapink.ttf'
 );
 
$captcha = new Captcha($captchaConfig);
$captcha->createCaptcha();

/* End */
?>