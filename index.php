<?php
interface INotifyProvider {
    public function sendSms();
    public function sendEmail();
}
interface IUser {
    public function getEmail();
    public function getPhone();
}
class User implements  IUser {
    private $email;
    private $phone;
    public function __construct($phone, $email)
    {
        $this->email = $email;
        $this->phone = $phone;
    }

    public function getEmail() {
        return $this->email;
    }
    public function getPhone() {
        return $this->phone;
    }
}
class NotifyProvider implements INotifyProvider {
    public function sendSms() {

    }
    public function sendEmail() {

    }

}
class NotificationService {
    private $provider;
    public function __construct(INotifyProvider $provider)
    {
    $this->provider = $provider;
    }
    public function notify(IUser $user, $text){
        $this->provider->sendSms($user->getPhone(), $text);
        $this->provider->Email($user->getEmail(), $text);
    }
}


///// Клиентский код

$service = new NotificationService(new NotifyProvider);
$text = 'Какой-то текст';

foreach ($users as $user)
$service->notify($user, $text);
