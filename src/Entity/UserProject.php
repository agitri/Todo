<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Uid\Uuid;

#[ApiResource]
#[Entity]
#[Table(name: 'user_project')]
class UserProject
{


    public function __construct(
        #[Id,
            Column(type: UuidType::NAME, unique: true),
            GeneratedValue(strategy: 'CUSTOM'),
            CustomIdGenerator(class: 'doctrine.uuid_generator')]
        private Uuid $id,

        #[Column(type: 'integer')]
        public int $views,

        #[Column(type: 'text')]
        public string $title,

        #[Column(type: 'text')]
        public string $description,

        #[ManyToOne(inversedBy: 'userProjects')]
        public Users $users,

        #[OneToMany(mappedBy: 'userProject', targetEntity: UserProjectTodo::class)]
        public iterable $userProjectTodos,
    ) {
        $this->userProjectTodos = new ArrayCollection();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }


}