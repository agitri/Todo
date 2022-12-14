<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\CustomIdGenerator;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ApiResource]
#[Entity]
#[Table(name: 'user_project_todo')]
class UserProjectTodo
{
    #[Id,
        Column(type: UuidType::NAME, unique: true),
        GeneratedValue(strategy: 'CUSTOM'),
        CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private Uuid $uuid;

    #[Column(type: 'text', nullable: false)]
    public string $title = '';

    #[ManyToOne(inversedBy: 'userProjectsTodos')]
    public Users $users;

    #[ManyToOne(inversedBy: 'userProjectTodos')]
    public UserProject $userProject;

    public function getUuid(): Uuid
    {
        return $this->uuid;
    }


}