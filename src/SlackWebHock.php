<?php
namespace MildJester;

class SlackWebHock {
	/* ****************
	 * Custom Settings
	 * *************** */
	private static $url      = 'https://hooks.slack.com/services/AAAAAAAAA/BBBBBBBBB/CCCCCCCCC';
	private static $emoji    = ':space_invader:';
	private static $username = 'PHP SlackBot';
	private static $color    = '';
	
	/**
	 * Set WebHock URL
	 * @param string $url WebHock URL
	 */
	static public function setUrl($url) {
		self::$url = $url;
	}
	/**
	 * set display icon
	 * @param string $emoji display icon
	 */
	static public function setEmoji($emoji) {
		self::$emoji = $emoji;
	}
	/**
	 * set display name
	 * @param string $username display name
	 */
	static public function setName($username) {
		self::$username = $username;
	}
	/**
	 * Set display color.
	 * if you want to set color at leftside of message.
	 * Set this parameter
	 * @param string $color display color
	 */
	static public function setColor($color) {
		self::$color = $color;
	}
	
	/**
	 * Send Message to Slack
	 * 
	 * @param string $to target channel(ex. #general) or DM(ex. @mike)
	 * @param string $text send message
	 * @param string $ua user agent(optional)
	 * @return boolean result of send message
	 */
	static public function send($to, $text, $ua = 'php slack bot') {
		try{
			$postData = new \stdClass();
			$postData->channel = $to;
			$postData->username = defined('MJ_SLACK_NAME') ? MJ_SLACK_NAME : self::$username;
			$postData->icon_emoji = defined('MJ_SLACK_EMOJI') ? MJ_SLACK_EMOJI : self::$emoji;
			$slackBotColor = defined('MJ_SLACK_COLOR') ? MJ_SLACK_COLOR : self::$color;
			if (isset($slackBotColor) && strlen($slackBotColor) > 0) {
				$attachment = new \stdClass();
				$attachment->color = $slackBotColor;
				$attachment->text = $text;
				$postData->attachments = [$attachment];
			} else {
				$postData->text = $text;
			}
			$ch = curl_init(defined('MJ_SLACK_URL') ? MJ_SLACK_URL : self::$url);
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_USERAGENT, $ua);
			curl_setopt($ch, CURLOPT_POSTFIELDS, 'payload='.json_encode($postData));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$res = curl_exec($ch);
			curl_close($ch);
			if ($res === 'ok') {
				return true;
			} else {
				return false;
			}
		} catch (Exception $e) {
			if (is_resource($ch)) {
				curl_close($ch);
			}
			throw $e;
		}
	}
	
}
