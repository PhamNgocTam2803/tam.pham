<?php

namespace app\jobs;

use yii\base\BaseObject;
use yii\queue\JobInterface;
use Yii;

class SendEmail extends BaseObject implements JobInterface
{
    public $toEmail;
    public $subject;
    public $body;
    public $name;

    public function execute($queue)
    {
        Yii::$app->mailer->compose()
            ->setTo($this->toEmail)
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setReplyTo([$this->toEmail => $this->name])
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
        
    }

}