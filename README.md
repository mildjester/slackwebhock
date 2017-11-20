# Post Slack WebHock
(PHP 5 >= 5.6.0, PHP 7)  
  
This script post message to slack via "Incoming WebHocks".  
  
## Usage via CLI  
```
php SlackWebHockCli.php "#general" "Honjitsu Ha Seiten Nari."
```
Before call. You have to set WebHock URL.

  
## Usage As Static CLASS  
```
use MildJester\SlackWebHock;

SlackWebHock::setUrl('https://hooks.slack.com/services/1234567/8901234/5678901');
SlackWebHock::send('#general', 'Honjitsu Ha Seiten Nari.')
```
