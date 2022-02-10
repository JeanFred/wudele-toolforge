<?php
/**
 * This software is governed by the CeCILL-B license. If a copy of this license
 * is not distributed with this file, you can obtain one at
 * http://www.cecill.info/licences/Licence_CeCILL-B_V1-en.txt
 *
 * Authors of STUdS (initial project): Guilhem BORGHESI (borghesi@unistra.fr) and Raphaël DROZ
 * Authors of Framadate/OpenSondage: Framasoft (https://github.com/framasoft)
 *
 * =============================
 *
 * Ce logiciel est régi par la licence CeCILL-B. Si une copie de cette licence
 * ne se trouve pas avec ce fichier vous pouvez l'obtenir sur
 * http://www.cecill.info/licences/Licence_CeCILL-B_V1-fr.txt
 *
 * Auteurs de STUdS (projet initial) : Guilhem BORGHESI (borghesi@unistra.fr) et Raphaël DROZ
 * Auteurs de Framadate/OpenSondage : Framasoft (https://github.com/framasoft)
 */

include("variables.php");

$db_settings = parse_ini_file("$database_config_file");

// Application name
define('NOMAPPLICATION', ucfirst("$application_name"));

// Database administrator email
define('ADRESSEMAILADMIN', $email_address);

// Email for automatic responses (you should set it to "no-reply")
const ADRESSEMAILREPONSEAUTO = '';

$db_host = getenv('DB_HOST') ? getenv('DB_HOST') : 'tools.db.svc.eqiad.wmflabs';
$db_port = 3306;
define('DB_CONNECTION_STRING', "mysql:host=$db_host;dbname=$db_name;port=$db_port");

// Database user
define('DB_USER', $db_settings['user']);

// Database password
define('DB_PASSWORD', $db_settings['password']);

// Table name prefix
const TABLENAME_PREFIX = 'fd_';

// Name of the table that stores migration script already executed
const MIGRATION_TABLE = 'framadate_migration';

// Default Language
const DEFAULT_LANGUAGE = 'en';

// List of supported languages, fake constant as arrays can be used as constants only in PHP >=5.6
$ALLOWED_LANGUAGES = [
    'fr' => 'Français',
    'en' => 'English',
    'oc' => 'Occitan',
    'es' => 'Español',
    'de' => 'Deutsch',
    'nl' => 'Dutch',
    'it' => 'Italiano',
    'br' => 'Brezhoneg',
    'ca' => 'Català',
];

// Path to image file with the title
const IMAGE_TITRE = '/images/logo-wudele.png';

// Clean URLs, boolean
define('URL_PROPRE', $clean_urls);

// Use REMOTE_USER data provided by web server
const USE_REMOTE_USER =  true;

// Path to the log file
const LOG_FILE = 'logs/stdout.log';

// Days (after expiration date) before purging a poll
const PURGE_DELAY = 60;

// Max slots per poll
const MAX_SLOTS_PER_POLL = 366;

// Number of seconds before we allow to resend an "Remember Edit Link" email.
const TIME_EDIT_LINK_EMAIL = 60;

$mail_host = getenv('MAIL_HOST') ? getenv('MAIL_HOST') : 'mail.tools.wmflabs.org';
$mail_port = getenv('MAIL_PORT') ? getenv('MAIL_PORT') : 25;

// Config
$config = [
    /* general config */
    'use_smtp' => false,                     // use email for polls creation/modification/responses notification
    'smtp_options' => [
        'host' => $mail_host,               // SMTP server (you could add many servers (main and backup for example) : use ";" like separator
        'auth' => false,                    // Enable SMTP authentication
        'username' => '',                   // SMTP username
        'password' => '',                   // SMTP password
        'secure' => '',                     // Enable encryption (false, tls or ssl)
        'port' => $mail_port,               // TCP port to connect to
    ],
    /* home */
    'show_what_is_that' => false,            // display "how to use" section
    'show_the_software' => false,            // display technical information about the software
    'show_cultivate_your_garden' => false,   // display "development and administration" information
    /* create_classic_poll.php / create_date_poll.php */
    'default_poll_duration' => 60,          // default values for the new poll duration (number of days).
    /* create_classic_poll.php */
    'user_can_add_img_or_link' => true,     // user can add link or URL when creating his poll.
    'markdown_editor_by_default' => true,   // The markdown editor for the description is enabled by default
    'provide_fork_awesome' => true,         // Whether the build-in fork-awesome should be provided
];
