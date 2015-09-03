<?php

require(__DIR__ . '/vendor/autoload.php');

use NextCaller\NextCallerPlatformClient;

$user = "";
$password = "";
$platformUsername = 'user1';
$sandbox = true;

$client = new NextCallerPlatformClient($user, $password, $sandbox);
try {
    $platformUser = $client->getPlatformAccount($platformUsername);
    /*
    array(
        'username' => 'user1',
        'first_name' => 'user1_fname',
        'last_name' => 'user1_lname',
        'company_name' => 'company1_name',
        'email' => 'email@company1.com',
        'number_of_operations' => '15',
        'total_calls' => array('2014 - 11' => '15'),
        'successful_calls' => array('2014 - 11' => '15'),
        'resource_uri' => '/v2/platform_users/user1/'
    );
    */
    var_dump($platformUser);
} catch (\NextCaller\Exception\BadResponseException $e) {
    // Example
    // 558
    var_dump($e->getCode());
    // The profile id you have entered is invalid. Please ensure your profile id contains 30 symbols.
    var_dump($e->getMessage());
    /* array(
     *      "message" => "The profile id you have entered is invalid. Please ensure your profile id contains 30 symbols.",
     *      "code" => "558",
     *      "type" => "Bad Request"
     * );
     * */
    var_dump($e->getError());
    /** @var \Guzzle\Http\Message\Request $request */
    $request = $e->getRequest();
    /** @var \Guzzle\Http\Message\Response $response */
    $response = $e->getResponse();
} catch (\NextCaller\Exception\FormatException $e) {
    // Example
    // 3
    var_dump($e->getCode());
    // Not valid error response
    var_dump($e->getMessage());
    /** @var \Guzzle\Http\Message\Request $request */
    $request = $e->getRequest();
    /** @var \Guzzle\Http\Message\Response $response */
    $response = $e->getResponse();
}