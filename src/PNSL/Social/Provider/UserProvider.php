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
    private $passwordEncoder;
 
    public function  __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function loadUserByUsername($username)
    {
        $user = $this->em->createQuery(
            'select a from \PNSL\Social\Entity\AcessoEntity a 
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
            explode(',', $user->getPerfil()), 
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
         return $this->loadUserByUsername($user->getNome());
    }
 
    public function supportsClass($class)
    {
        return $class === 'Symfony\Component\Security\Core\User\User';
    }

    public function createAdminUser($username, $password)
    {
        //$user = new User($username, $password, array('ROLE_ADMIN'), true, true, true, true);
        $criptoPassword = $this->encodePassword($user);
        
        $acesso = new \PNSL\Social\Entity\AcessoEntity();
        $acesso->setNome($username);
        $acesso->setSenha($criptoPassword);
        $acesso->setPerfil('ROLE_ADMIN');
        $this->em->persist($acesso);
        $this->em->flush();
    }

    public function setPasswordEncoder(MessageDigestPasswordEncoder $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    private function encodePassword(UserInterface $user)
    {
        $criptoPassword = null;
        if ($user->getPassword()) {
            $criptoPassword = $this->passwordEncoder->encodePassword(
                $user->getPassword(), 
                $user->getSalt()
            );
        }
        return $criptoPassword;
    }

    public function objectToArray(User $user)
    {
        return array(
            'id' => $user->id,
            'username' => $user->username,
            'password' => $user->password,
            'roles' => implode(',', $user->roles),
            'created_at' => $user->createdAt->format(self::DATE_FORMAT),
        );
    }

    public function arrayToObject($userArr, $user = null)
    {
        if (!$user) {
            $user = new \Api\User\UserEntity($this->em);

            $user->id = isset($userArr['id']) ? $userArr['id'] : null;
        }

        $username = isset($userArr['nome']) ? $userArr['nome'] : null;
        $password = isset($userArr['senha']) ? $userArr['senha'] : null;
        $roles = isset($userArr['perfil']) ? explode(',', $userArr['perfil']) : array();
        $createdAt = isset($userArr['created_at']) ? \DateTime::createFromFormat(self::DATE_FORMAT, date('Y-m-d H:i:s')) : null;

        if ($username) {
            $user->username = $username;
        }

        if ($password) {
            $user->password = $password;
        }

        if ($roles) {
            $user->roles = $roles;
        }

        if ($createdAt) {
            $user->createdAt = $createdAt;
        }

        return $user;
    }
}
