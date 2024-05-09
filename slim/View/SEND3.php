<?php

 use Infobip\Configuration;
 use Infobip\Api\SmsApi;
 use Infobip\Model\SmsDestination;
 use Infobip\Model\SmsTextualMessage;
 use Infobip\Model\SmsAdvancedTextualRequest;

    require __DIR__ . "/vendor/autoload.php";

    $message=$_POST["message"];
    $tel=$_POST["phone"];

    $apiURL ="e158qq.api.infobip.com";
    $apiKey = "cf4fa6f51a6e6db03da7f13fed40c245-93689ecd-118b-46b0-bb93-6cb563026814";

    $configuration= new Configuration(host:$apiURL , apiKey: $apiKey);

    $api=new SmsApi(config : $configuration);

    $destination = new SmsDestination(to: $tel);

    $theMessage = new SmsTextualMessage(
        destination : [$destination],
        text : $message ,
        from:"Syntax Flow"
    );


    $request = new SmsAdvancedTextualRequest(messages : [$theMessage]);

    $response = $api->sendSmsMessage($request);


?>
