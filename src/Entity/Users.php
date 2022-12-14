<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;

#[ApiResource]
#[Entity]
#[Table(name: 'users')]
class Users
{
    public function __construct(

        #[Id,
            Column(type: UuidType::NAME, unique: true),
            GeneratedValue(strategy: 'CUSTOM'),
            CustomIdGenerator(class: 'doctrine.uuid_generator')]
        private Uuid $id,

        #[Column(nullable: false)]
        public string $username,

        #[OneToMany(mappedBy: 'users', targetEntity: UserProject::class)]
        public iterable $userProjects,

        #[OneToMany(mappedBy: 'users', targetEntity: UserProjectTodo::class)]
        public iterable $userProjectsTodos,

    ) {
        $this->userProjects = new ArrayCollection();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

}