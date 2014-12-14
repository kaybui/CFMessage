 <?php

include('../autoload.php');

    $flash = new \..\CFMessage();
    return $flash;


// Room for other services, modules, controllers

// Starts the session 
$app->session;

// Extra stylesheet
$app->theme->addStylesheet('css/flash.css');

// Routes
$app->router->add('', function() use ($app) {

    $app->theme->setTitle("theFlash");

    $app->session;

    $app->flash->add('notice', 'This is an notification');
    $app->flash->add('info', 'This is an information message');
    $app->flash->add('error', 'This is an error message');
    $app->flash->add('success', 'This is a success message');
    $app->flash->add('warning', 'This is a warning message');
    

    $app->theme->setVariable('title', "theFlash")
           ->setVariable('main', $app->flash->getMessages());
 
});

$app->router->handle();
$app->theme->render(); 