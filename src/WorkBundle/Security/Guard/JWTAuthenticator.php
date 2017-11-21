<?php
namespace WorkBundle\Security\Guard;
use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\TokenExtractorInterface;
use Lexik\Bundle\JWTAuthenticationBundle\TokenExtractor\AuthorizationHeaderTokenExtractor;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator as BaseAuthenticator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
class JWTAuthenticator extends BaseAuthenticator
{
    /**
     * Adds a new AuthorizationHeader token extractor for prefixing with "JWT" instead of "Bearer"
     *
     * {@inheritdoc}
     */
    protected function getTokenExtractor()
    {
        $chainExtractor = parent::getTokenExtractor();
        $chainExtractor->addExtractor(new AuthorizationHeaderTokenExtractor('JWT', 'Authorization'));
    //    dump($chainExtractor);die;
        return $chainExtractor;
    }
}