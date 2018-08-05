<?php
require dirname(__FILE__).'/../src/SlackWebHock.php';

use MildJester\SlackWebHock;

define('MJ_SLACK_URL', 'https://hooks.slack.com/services/1234567/8901234/5678901');
define('MJ_SLACK_NAME', 'my slack police man');
define('MJ_SLACK_EMOJI', ':cop:');
define('MJ_SLACK_COLOR', '#FF0000'); // red

SlackWebHock::send('#general', 'Honjitsu Ha Seiten Nari.');
