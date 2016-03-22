# zf-hermes
Zend Framework module to work with Node-Hermes.

## Usage
1. Add the `NotifierListener` as a listener at relevant sections.
2. Trigger `Events::HERMES_NOTIFY` and set parameter `message` with
data implementing the `MessageInterface`.
3. Message is sent over Redis.
