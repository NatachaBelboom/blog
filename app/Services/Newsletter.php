<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email, string $list = null)
    {
        // php8  $list ??= config('services.mailchimp.lists.subscribers');

        if(!$list){
            $list = config('services.mailchimp.lists.subscribers');
        }

        $response = $this->client()->lists->addListMember(config('services.mailchimp.lists.subscribers'), [
            "email_address" => $email,  // email qui a ete passé en argument
            "status" => "subscribed",
        ]);
    }

    protected function client()
    {
        $mailchimp = new ApiClient();

        return $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => config('services.mailchimp.server-prefix')
        ]);
    }
}
