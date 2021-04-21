<?php

namespace App\DataFixtures;

use App\Entity\Parcel;
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

    	$users=[];

    	for ($i=0; $i < 10 ; $i++) { 
    		$user = new User();
    		$user->setUsername($faker->username())
				 ->setPassword($this->userPasswordEncoder->encodePassword($user, $i."secret"))
				 ->setNom($faker->lastName())
				 ->setPrenoms($faker->firstNameMale())
				 ->setEmail($faker->email())
				 ->setNumeroTel($faker->phoneNumber());

			$manager->persist($user);

			$users[]=$user;
    	}
    		# code...
    		# code...
    		for ($j=0; $j < 10 ; $j++) { 
	    		# code...
	    		shuffle($users);
	    		$userSlice= array_slice($users, 7);
	    		
	    		$parcel = new Parcel();
		    	$parcel->setParcelName($faker->words(3, true))
					   ->setPointDepart($faker->city())
					   ->setPointFinal($faker->city())
					   // ->setPointFinal($faker->words(1, true))
					   ->setValeurColis(mt_rand(1, 100)*10000)
					   ->setPriceExpedition($setValeurColis/100)
					   ->setDestinataire($userSlice[0])
					   ->setExpediteur($userSlice[1])
					   ->setDescripColis($faker->paragraph())
					   ->setStatusTracking($faker->randomElement(['livré', 'non-livré']))
					   ->setDateDepart(\DateTimeImmutable::createFromMutable($faker->dateTime()))
					   ->setDateArrived(\DateTimeImmutable::createFromMutable($faker->dateTime('+2 days')))
					   ->setCodeRetrait($faker->unique()->numberBetween(1,));

				$manager->persist($parcel);
	    	}
    		

    	

        $manager->flush();
    }
}
