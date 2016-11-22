<?php

namespace spec\Cxbyte\ZmqDriver;

use Cxbyte\ZmqDriver\ZmqDriverServiceProvider;
use PhpSpec\Laravel\LaravelObjectBehavior;
use Cxbyte\ZmqDriver\ZmqBroadcastManager;
use \Illuminate\Broadcasting\BroadcastManager;

/**
 * @mixin ZmqDriverServiceProvider
 */
class ZmqDriverServiceProviderSpec extends LaravelObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith(app());
        $this->shouldHaveType(ZmqDriverServiceProvider::class);
        $this->register();
    }

    function it_register_config()
    {
        expect(config('broadcasting.connections.zmq'))->shouldNotBe(null);
    }

    function it_register_broadcasting_manager()
    {
        expect(app()->make('Illuminate\Broadcasting\BroadcastManager'))
            ->shouldHaveType(ZmqBroadcastManager::class);
    }

    function it_register_broadcasting_factory()
    {
        expect(app()->make('Illuminate\Contracts\Broadcasting\Factory'))
            ->shouldHaveType(BroadcastManager::class);
    }
}
