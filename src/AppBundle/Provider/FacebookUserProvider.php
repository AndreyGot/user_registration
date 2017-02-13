<?php 

namespace AppBundle\Provider; 

use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\OAuthAwareUserProviderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use Doctrine\ORM\EntityManager;

class FacebookUserProvider implements UserProviderInterface, OAuthAwareUserProviderInterface {     

    public function __construct(EntityManager $entityManager)     {         
        $this->entityManager = $entityManager;     
    }     

    public function loadUserByUsername($id)     {         
        return $this->entityManager->getRepository('AppBundle:User')->findOneByEmail($id);     
    }     

    public function loadUserByOAuthUserResponse(UserResponseInterface $response)     {
        $userData = $response->getResponse();         
        if (!$userData || empty($userData['email'])) {             
            throw new UnsupportedUserException('Incorrect facebook user');         
        }          
        $user = $this->loadUserByUsername($userData["email"]);         
        if (!$user) {
            throw new UnsupportedUserException('User not registered');         
        }
        return $user;     
    }     

    public function refreshUser(UserInterface $user)     {         
        if (!$this->supportsClass(get_class($user))) {             
            throw new UnsupportedUserException(sprintf('Unsupported user class "%s"', get_class($user)));         
        }
        return $this->loadUserByUsername($user->getEmail());     
    }     

    public function supportsClass($class)     {         
        return $class === 'HWI\\Bundle\\OAuthBundle\\Security\\Core\\User\\OAuthUser';     
    } 
}