#Zmq broadcasting driver for Laravel

#Installation
`composer require cxbyte/laravel-zmq-driver`

#Configure
1. add to your **config/app.php** in providers section
`Cxbyte\ZmqDriver\ZmqDriverServiceProvider::class`

2. add to your **.env** file
`BROADCAST_DRIVER=zmq`
`BROADCAST_ZMQ_PORT=5555`

#Using
You have to create your own event class extends from `Cxbyte\ZmqDriver\Events\AbstractEvent`
and define `broadcastOn` method with channels for broadcasting.
Sample event class **SampleEvent.php** you can see in Events folder.

`public function broadcastOn()
{
    return new Channel('items'); define your channels here
}`

The channels should be instances of **Channel**, **PrivateChannel**, or **PresenceChannel**.

More info <a href="https://laravel.com/docs/5.3/broadcasting#defining-broadcast-events">Laravel broadcast events</a>

And then you can fire event like
`event(new Cxbyte\ZmqDriver\Events\SampleEvent('hello'))`