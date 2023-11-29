<?php

// Settings for session before it start

ini_set('session.use_only_cookies', 1);
ini_set('session.use_strict_mode', 1);

session_set_cookie_params([
    'lifetime' => 1800,
    'domain' => 'localhost',
    'path' => '/',
    'secure' => true,
    'httponly' => true,
]);

// Start session to use it in if else

session_start();

// Check for session exist 


if (issest($_SESSION["user_id"])) {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerateSessionIdLoggedIn();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerateSessionIdLoggedIn();
        }
    }
} else {
    if (!isset($_SESSION["last_regeneration"])) {
        regenerateSessionId();
    } else {
        $interval = 60 * 30;
        if (time() - $_SESSION["last_regeneration"] >= $interval) {
            regenerateSessionId();
        }
    }
}



function regenerateSessionId()
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}

function regenerateSessionIdLoggedIn()
{
    session_regenerate_id(true);
    $_SESSION["last_regeneration"] = time();
}
