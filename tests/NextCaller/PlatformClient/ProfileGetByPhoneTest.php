<?php

namespace NextCaller\Test\PlatformClient;

use NextCaller\NextCallerPlatformClient;

class ProfileGetByPhoneTest extends \PHPUnit_Framework_TestCase
{
    const JSON_RESPONSE = '{"records":[{"id":"12848e91004c7bdbd77fcc2be75e5b","first_name":"Nyquela","middle_name":"","last_name":"Fields","name":"Nyquela Fields","language":"English","phone":[{"number":"2125558383","resource_uri":"/v2/records/2125558383/"}],"carrier":"","address":[{"city":"Powder Springs","extended_zip":"6781","country":"USA","line1":"149 Yellowstone Dr","line2":"","state":"GA","zip_code":"30127"}],"line_type":"","department":"not specified","resource_uri":"/v2/users/12848e91004c7bdbd77fcc2be75e5b/"}]}';

    const PROFILE_PHONE = '2125558383';
    const PLATFORM_USERNAME = 'user12345';

    public function testGetByPhone() {
        $client = new NextCallerPlatformClient(null, null, true);
        $profiles = $client->getByPhone(self::PROFILE_PHONE, self::PLATFORM_USERNAME);
        $this->assertEquals($profiles, json_decode(self::JSON_RESPONSE, true));
    }
}