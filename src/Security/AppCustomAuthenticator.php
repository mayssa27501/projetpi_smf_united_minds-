<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\Exception\LockedException;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;
use App\Repository\UserRepository;


class AppCustomAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;
    private $userRepository;
    public const LOGIN_ROUTE = 'app_login';
 

    public function __construct(private UrlGeneratorInterface $urlGenerator,UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

    }

  
    
    // load user by username
    public function loadUserByUsername(string $username):UserInterface
    {
        $user = $this->userRepository->findOneByUsername($username);
        if(!$user){
            throw new UsernameNotFoundException('User n existe pas');
        
        }
        if($user->isLocked()){
            throw new LockedException('User est désactiver');
        }
        return $user;
        

    }

    public function authenticate(Request $request): Passport
    {
        $email = $request->request->get('email', '');
       $user = $this->userRepository->findOneby(['email'=>$email]);

        $request->getSession()->set(Security::LAST_USERNAME, $email);
        if ($user && $user->isBlocked()) {
            throw new CustomUserMessageAuthenticationException("Votre compte a été bloqué. Veuillez contacter l'administrateur pour obtenir de l'aide.
            ");
        }

        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }
        $user = $token->getUser();

        // For example:
        //throw new \Exception('TODO: provide a valid redirect inside '.__FILE__);
     

        if (in_array("Client", $user->getRoles())) {
            return new RedirectResponse($this->urlGenerator->generate('app_home'));
        }
        if (in_array("Proprietaire", $user->getRoles())) {
            return new RedirectResponse($this->urlGenerator->generate('app_proprietaire'));
        }
        if (in_array("Admin", $user->getRoles())) {
            return new RedirectResponse($this->urlGenerator->generate('app_user_index'));
        }
    }

    protected function getLoginUrl(Request $request): string
    {
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}
