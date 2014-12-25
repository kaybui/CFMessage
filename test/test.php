<?php
require __DIR__.'/config_with_app.php';

$di->setShared('cfmessage', function() {
    $flash = new \kaybui\CFMessage\CFMessage();
    return $flash;
});

// Room for other services, modules, controllers
// Starts the session
$app->session;

// Extra stylesheet
$app->theme->addStylesheet('css/flash.css');

// Routes
$app->router->add('cfmessage', function() use ($app) {

    $app->theme->setTitle("Flash test");

    $app->cfmessage->message('notice', 'This is an notification');
    $app->cfmessage->message('info', 'This is an information message');
    $app->cfmessage->message('error', 'This is an error message');
    $app->cfmessage->message('success', 'This is a success message');
    $app->cfmessage->message('warning', 'This is a warning message');
    
    

    $app->theme->setVariable('title', "Flash test");
    
    $app->views->add('me/page', [ 
        'content' => $app->cfmessage->getMessages(),
        ]); 
});
$app->router->handle();
$app->theme->render(); 
