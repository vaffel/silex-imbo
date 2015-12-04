<?php

namespace Vaffel\Silex\Provider;

use Silex\Application,
    Silex\ServiceProviderInterface;

use ImboClient\ImboClient;

class ImboServiceProvider implements ServiceProviderInterface {

    public function register(Application $app) {
        $app['imbo.serverUrls'] = array();
        $app['imbo.publicKey']  = '';
        $app['imbo.privateKey'] = '';
        $app['imbo.user'] = '';

        $app['imbo'] = $app->share(function() use ($app) {
                return ImboClient::factory(array(
                    'serverUrls' => $app['imbo.serverUrls'],
                    'publicKey'  => $app['imbo.publicKey'],
                    'privateKey' => $app['imbo.privateKey'],
                    'user'       => $app['imbo.user'] ?: $app['imbo.publicKey'],
                ));
            }
        );
    }

    public function boot(Application $app) { }
}
