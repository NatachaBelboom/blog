<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function subscribe(string $email, string $list = null)
    {
        // php8  $list ??= config('services.mailchimp.lists.subscribers');

        if(!$list){
            $list = config('services.mailchimp.lists.subscribers');
        }

        $response = $this->client->lists->addListMember(config('services.mailchimp.lists.subscribers'), [
            "email_address" => $email,  // email qui a ete passé en argument
            "status" => "subscribed",
        ]);
    }

    protected function client()
    {

    }
}
