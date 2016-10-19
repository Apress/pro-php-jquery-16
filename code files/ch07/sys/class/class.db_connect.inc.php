<?php

declare(strict_types=1);

/**
 * Database actions (DB access, validation, etc.)
 *
 * PHP version 7
 *
 * LICENSE: This source file is subject to the MIT License, available
 * at http://www.opensource.org/licenses/mit-license.html
 *
 * @author     Jason Lengstorf <jason.lengstorf@ennuidesign.com>
 * @copyright  2009 Ennui Design
 * @license    http://www.opensource.org/licenses/mit-license.html
 */
class DB_Connect {

    /**
     * Stores a database object
     *
     * @var object A database object
     */
    protected $db;

    /**
     * Checks for a DB object or creates one if one isn't found
     *
     * @param object $dbo A database object
     */
    protected function __construct($db=NULL)
    {
        if ( is_object($db) )
        {
            $this->db = $db;
        }
        else
        {
            // Constants are defined in /sys/config/db-cred.inc.php
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
            try
            {
                $this->db = new PDO($dsn, DB_USER, DB_PASS);
            }
            catch ( Exception $e )
            {
                // If the DB connection fails, output the error
                die ( $e->getMessage() );
            }
        }
    }

}

?>