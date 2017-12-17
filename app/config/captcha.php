<?php if (!class_exists('CaptchaConfiguration')) { return; }
// BotDetect PHP Captcha configuration options
return [
  // Captcha configuration for login page
  'LoginCaptcha' => [
    'UserInputID' => 'captchaCode',
    'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 7),
    'CodeStyle' => CodeStyle::Alpha,
    'ImageStyle' => [
      ImageStyle::Radar,
      ImageStyle::Collage,
      ImageStyle::Fingerprints,
    ],
  ],
  // Captcha configuration for register page
  'RegisterCaptcha' => [
    'UserInputID' => 'captchaCode',
    'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 7),
    'CodeStyle' => CodeStyle::Alpha,
  ],
];