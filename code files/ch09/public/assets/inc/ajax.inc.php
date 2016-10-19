<?php

declare(strict_types=1);

/*
 * Enable sessions if needed.
 * Avoid pesky warning if session already active.
 */
$status = session_status();
if ($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
}

/*
 * Include necessary files
 */
include_once '../../../sys/config/db-cred.inc.php';

/*
 * Define constants for config info
 */
foreach ( $C as $name => $val )
{
    define($name, $val);
}

/*
 * Create a lookup array for form actions
 */
define('ACTIONS', array(
        'event_view' => array(
                'object' => 'Calendar',
                'method' => 'displayEvent'
            ),
        'edit_event' => array(
                'object' => 'Calendar',
                'method' => 'displayForm'
            ),
        'event_edit' => array(
                'object' => 'Calendar',
                'method' => 'processForm'
            ),
        'delete_event' => array(
                'object' => 'Calendar',
                'method' => 'confirmDelete'
            ),
        'confirm_delete' => array(
                'object' => 'Calendar',
                'method' => 'confirmDelete'
            )
        )
    );

/*
 * Need a PDO object.
 */
$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
$dbo = new PDO($dsn, DB_USER, DB_PASS);

/*
 * Make sure the anti-CSRF token was passed and that the
 * requested action exists in the lookup array
 */
if ( isset(ACTIONS[$_POST['action']]) )
{
    $use_array = ACTIONS[$_POST['action']];
    $obj = new $use_array['object']($dbo);
    $method = $use_array['method'];

    /*
     * Check for an ID and sanitize it if found
     */
    if ( isset($_POST['event_id']) )
    {
        $id = (int) $_POST['event_id'];
    }
    else { $id = NULL; }

    echo $obj->$method($id);
}

function __autoload($class_name)
{
    $filename = '../../../sys/class/class.'
        . strtolower($class_name) . '.inc.php';
    if ( file_exists($filename) )
    {
        include_once $filename;
    }
}

?>