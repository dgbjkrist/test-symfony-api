<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
	/**
	 * @var $userpasswordencoder
	 */
	
	private UserPasswordEncoderInterface $userPasswordEncoder;

	/**
	 * AppFixtures constructor
	 * @param UserPasswordEncoderInterface $userPasswordEncoder
	 */
	public function __construct(UserPasswordEncoderInterface $userPasswordEncoder)
	{
		$this->userPasswordEncoder = $userPasswordEncoder;
	}

    public function load(ObjectManager $manager)
    {
    	$faker = \Faker\Factory::create('fr_FR');

    	for ($i=0; $i < 5 ; $i++) { 
    		# code...
    		$user = new User();
    		$user->setUsername($faker->username)
				 ->setPassword($this->userPasswordEncoder->encodePassword($user, $i."secret"))
				 ->setNom($faker->lastName)
				 ->setPrenoms($faker->firstNameMale)
				 ->setEmail($faker->email)
				 ->setNumeroTel($faker->phoneNumber);

			$manager->persist($user);
    	}

        $manager->flush();
    }
}
