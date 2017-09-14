<?php

class HealthGraphApiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \InhaleExhale\HealthGraphApi
     */
    private $healthGraphApi;

    public function setUp()
    {
        $this->healthGraphApi = new \InhaleExhale\HealthGraphApi(999, '_SECRET_');
    }

    public function tearDown()
    {
        unset($this->healthGraphApi);
    }

    public function testIfAuthenticationUrlWorksAsExpected()
    {
        $expected = 'https://www.runkeeper.com/apps/authorize'
            . '?client_id=999'
            . '&redirect_uri=' . urlencode('https://example.org/')
            . '&response_type=code'
            . '&approval_prompt=auto';

        $url = $this->healthGraphApi->authenticationUrl('https://example.org/', 'auto', null, null);

        $this->assertEquals($expected, $url);
    }

    public function testIfAuthenticationUrlWithScopeWorksAsExpected()
    {
        $expected = 'https://www.runkeeper.com/apps/authorize'
            . '?client_id=999'
            . '&redirect_uri=' . urlencode('https://example.org/')
            . '&response_type=code'
            . '&approval_prompt=auto'
            . '&scope=read';

        $url = $this->healthGraphApi->authenticationUrl('https://example.org/', 'auto', 'read', null);

        $this->assertEquals($expected, $url);
    }
}
