<?php

namespace VaffelTest\Silex\Provider;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Vaffel\Silex\Provider\ImboServiceProvider;

class ImboServiceProviderTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        if (!class_exists('\ImboClient\ImboClient')) {
            $this->markTestSkipped('ImboClient was not installed.');
        }
    }

    public function testRegister() {
        $serverUrls = ['http://example.com', 'http://example.net'];
        $publicKey  = 'foobar';
        $privateKey = 'barfoo';

        $app = new Application();

        $app->register(new ImboServiceProvider(), array(
            'imbo.serverUrls' => $serverUrls,
            'imbo.publicKey'  => $publicKey,
            'imbo.privateKey' => $privateKey,
        ));

        $app->get('/', function() use($app) {
            $app['facebook'];
        });

        $request = Request::create('/');
        $app->handle($request);

        $this->assertTrue($app['imbo'] instanceof \ImboClient\ImboClient);
        $this->assertSame($serverUrls, $app['imbo']->getServerUrls());
        $this->assertSame($publicKey,  $app['imbo']->getPublicKey());
        $this->assertSame($privateKey, $app['imbo']->getConfig('privateKey'));
    }
}
