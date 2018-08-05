# Post Slack WebHock
(PHP 5 >= 5.6.0, PHP 7)  
  
This script post message to slack via "Incoming WebHocks".  
  
## Installation 
Download this script. or get via composer.
```
composer require mildjester/slackwebhock
```

## Usage As Static CLASS  

#### WAY1: Define constant variable
```
use MildJester\SlackWebHock;

define('MJ_SLACK_URL', 'https://hooks.slack.com/services/1234567/8901234/5678901');
define('MJ_SLACK_NAME', 'my slack police man');
define('MJ_SLACK_EMOJI', ':cop:');
define('MJ_SLACK_COLOR', '#FF0000'); // red

SlackWebHock::send('#general', 'Honjitsu Ha Seiten Nari.');
```

#### WAY2: Set parameter via static functions
```
use MildJester\SlackWebHock;

SlackWebHock::setUrl('https://hooks.slack.com/services/1234567/8901234/5678901');
SlackWebHock::setName('obaq');
SlackWebHock::setEmoji(':ghost:');
SlackWebHock::setColor('#0000FF'); // blue

SlackWebHock::send('#general', 'Ura Meshi Ya.');
```

If you set parameter both way, constant variable and via static function.
It apply constant variable.

## Usage via CLI  
```
php SlackWebHockCli.php "#general" "Honjitsu Ha Seiten Nari."
```
Before call. You have to set WebHock URL.

  
