<?php
require dirname(__FILE__).'/../src/SlackWebHock.php';

use MildJester\SlackWebHock;

SlackWebHock::setUrl('https://hooks.slack.com/services/1234567/8901234/5678901');
SlackWebHock::setName('obaq');
SlackWebHock::setEmoji(':ghost:');
SlackWebHock::setColor('#0000FF'); // blue

SlackWebHock::send('#general', 'Ura Meshi Ya.');
