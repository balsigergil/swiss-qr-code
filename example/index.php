<?php

use Balsigergil\SwissQrCode\SvgRenderer;
use Balsigergil\SwissQrCode\SwissQrCode;

require '../vendor/autoload.php';

require 'header.php';

$code = new SwissQrCode();
$code->setCreditor('Badminton Club Vevey', postcode: 1814, city: "Vevey");
$code->setIban('CH5204835012345671000');
$code->setAmount(1234.56);
$code->setDebtor('Gil Balsiger', 'Quelque part sur Terre 42', 1234, 'Lausanne');

$renderer = new SvgRenderer();
$renderer->renderSVG($code);

require 'footer.php';
