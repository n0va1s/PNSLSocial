<?php
namespace n0va1s\QuadroMagico\Provider;
 
use Symfony\Component\Security\Core\Encoder\MessageDigestPasswordEncoder;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Doctrine\ORM\EntityRepository;
 
class UserProvider implements UserProviderInterface
{
    private $em;
    private $passwordEncoder;
 
    public function __construct(\Doctrine\ORM\EntityManager $em)
    {
        $this->em = $em;
    }

    public function loadUserByUsername($username)
    {
        $query = $this->em->createQueryBuilder();
        $query->select("u")
              ->from('Api\User\UserEntity', 'u')
              ->where("u.username = :username")
              ->setParameter('username', $username);
        $query = $query->getQuery();
        $user = $query->getSingleResult();

        if (!$user) {
            throw new UsernameNotFoundException(sprintf('Usuário "%s" não encontrado. 
                                                        Verifique se vc digitou corretamente.', $username));
        }
        return new User($user->username, $user->password, explode(',', $user->roles), true, true, true, true);
    }
 
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }
 
        return $this->loadUserByUsername($user->getUsername());
    }
 
    public function supportsClass($class)
    {
        return $class === 'Symfony\Component\Security\Core\User\User';
    }

    public function createAdminUser($username, $password)
    {
        $user = new User($username, $password, array('ROLE_ADMIN'), true, true, true, true);
        $criptoPassword = $this->encodePassword($user);

        $user = new \Api\User\UserEntity();
        $user->username = $username;
        $user->plainPassword = $password;
        $user->password = $criptoPassword;
        $user->roles = array('ROLE_ADMIN');
   
        $this->em->persist($user);
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
            $criptoPassword = $this->passwordEncoder->encodePassword($user->getPassword(), $user->getSalt());
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

        $username = isset($userArr['username']) ? $userArr['username'] : null;
        $password = isset($userArr['password']) ? $userArr['password'] : null;
        $roles = isset($userArr['roles']) ? explode(',', $userArr['roles']) : array();
        $createdAt = isset($userArr['created_at']) ? \DateTime::createFromFormat(self::DATE_FORMAT, $userArr['created_at']) : null;

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
