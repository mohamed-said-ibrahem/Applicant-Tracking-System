<?php

// src/AppBundle/EventListener/JWTAuthenticatedListener.php
namespace WorkBundle\EventListener;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTAuthenticatedEvent;

class JWTAuthenticatedListener
{
/**
 * @param JWTAuthenticatedEvent $event
 *
 * @return void
 */
public function onJWTAuthenticated(JWTAuthenticatedEvent $event)
{
    $token = $event->getToken();
    // dump($token);die;    
    $payload = $event->getPayload();
    dump($payload);die;    
    
    $token->setAttribute('uuid', $payload['uuid']);
}
}