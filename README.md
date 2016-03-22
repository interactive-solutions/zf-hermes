# zf-hermes
Zend Framework module to work with Node-Hermes.

## Configuration
Copy the `hermes.global.php.dist` to change the default Redis configuration. 
Default values are:

- `host = 'localhost'`
- `port = 6379`

## Usage
Just inject the `NotifierService` and use publish to send a message over Redis.

```php
// $this->notifierService is an injected NotifierService
$this->notifierService->publish($message);
```

`$message` must be an object implementing the `MessageInterface`.

The message interface consists of the following properties:
- `channel` Redis channel to publish to message onto
- `userId` Id of the user that triggered the Redis event
- `timeStamp` The timestamp of when the message was created
- `payload` Additional data to be sent

The notifier service sends a json encoded message consisting of the
properties `userId`, `timeStamp` and `payload` onto Redis channel `channel`.

Note that the channel property is not part of the message.

### Recommendations
It is recommended to use listeners to listen for events that should
generate a Redis message. Although it is possible to inject the notifier
service directly into another class.
