<?php

use EasyWeChat\Factory;

class WeChatMessageSender {
    private $app;

    public function __construct($appId, $appSecret, $token) {
        $this->app = Factory::officialAccount([
            'app_id' => $appId,
            'secret' => $appSecret,
            'token' => $token,
            'response_type' => 'array',
        ]);
    }

    public function sendSubscriptionMessage($openID, $templateID, $page, $data) {
        $message = [
            'touser' => $openID,
            'template_id' => $templateID,
            'page' => $page,
            'data' => $data,
        ];

        $result = $this->app->subscribe_message->send($message);

        if ($result['errcode'] == 0) {
            return '推送成功';
        } else {
            return '推送失败';
        }
    }
}
