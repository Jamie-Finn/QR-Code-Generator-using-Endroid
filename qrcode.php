<?php

// Alters the content type of this page so that it is rendered as an image.
header('Content-Type: image/png');

// Requires in the composer autoload file so that The QrCode library is pulled in.
require_once 'vendor/autoload.php';

// Check if text for QR code in index.html is set before generating the QR code.
if(isset($_GET['text'])) {

	// Default size and padding of generated QR code and to check whether the size and padding values are included in a GET request.
	$size = isset($_GET['size']) ? $_GET['size'] : 200;
	$padding = isset($_GET['padding']) ? $_GET['padding'] : 10;

	// Instantiates the QrCode class provided by Endroid to be able use the methods within.
	$qr = new Endroid\QrCode\QrCode();

	// Sets the text to be included in the QR code, sets the size and also the padding.
	$qr->setText($_GET['text']);
	$qr->setSize($size);
	$qr->setPadding($padding);

	// Simply renders the QR code on the screen provided the content type has been set to image as shown at the top of this page.
	$qr->render();
}

