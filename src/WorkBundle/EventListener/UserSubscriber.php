<?php
namespace WorkBundle\EventListener;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use \Symfony\Component\Security\Core\Exception\AccessDeniedException;
class UserSubscriber implements EventSubscriberInterface {
    private $em;
    private $tokenStorage;
    
    public function __construct(EntityManager $em, TokenStorage $tokenStorage) {
        $this->em = $em;
        $this->tokenStorage = $tokenStorage;
    }
    
    public function onKernelRequest(GetResponseEvent $event) 
    {
        $token = $event->getRequest()->headers->get("Authorization");
        $token = explode("Bearer ", $token);        
        if($token) {
            $black = $this->em->getRepository("WorkBundle:Blacklist");
            $black = $black->isBlack($token);
            if($black) {
                die;
             }
         }
    }
    
    public static function getSubscribedEvents()
   {
        return [
            "kernel.request" => 'onKernelRequest'
        ];
    }

}