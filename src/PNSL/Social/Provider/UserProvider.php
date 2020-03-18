<?php
namespace PNSL\Social\Provider;
 
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;

class UserProvider implements UserProviderInterface
{
    private $em;
    
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function loadUserByUsername($username)
    {
        $user = $this->em->createQuery(
            'select a, p 
            from \PNSL\Social\Entity\AcessoEntity a
            join a.perfil p 
            where a.nome = :nome'
        )->setParameter('nome', $username)->getOneOrNullResult();
        if (!$user) {
            throw new UsernameNotFoundException(
                sprintf(
                    'Usuário "%s" não encontrado. 
                    Verifique se vc digitou corretamente.', 
                    $username
                )
            );
        }

        return new User(
            $user->getNome(), 
            $user->getSenha(), 
            //explode(',', $user->getPerfil()), 
            explode(',', $user->getPerfil()->getDescricao()), 
            true, true, true, true
        );
    }
 
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(
                sprintf(
                    'Instância de "%s" não é suportado.', 
                    get_class($user)
                )
            );
        }
        return $this->loadUserByUsername($user->getUsername());
    }
 
    public function supportsClass($class)
    {
        return $class === 'Symfony\Component\Security\Core\User\User';
    }
}
