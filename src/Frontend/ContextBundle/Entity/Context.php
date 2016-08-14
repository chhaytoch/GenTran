<?php

namespace Frontend\ContextBundle\Entity;

use CoreSystem\MainBundle\Entity\UserLogEntity;
use Doctrine\ORM\Mapping as ORM;
use Frontend\ProjectBundle\Entity\Project;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Context
 *
 * @ORM\Table(name="context")
 * @ORM\Entity(repositoryClass="Frontend\ContextBundle\Repository\ContextRepository")
 */
class Context extends UserLogEntity
{
    /**
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @ORM\Column(name="description", nullable=true, type="text")
     */
    private $description;

    /**
     * @ORM\Column(name="image_path", type="string")
     * @Assert\NotBlank(message="please, upload the your image!")
     * @Assert\File(mimeTypes={"image/jpeg", "image/png"})
     */
    private $imagePath;

    /**
     * @ORM\ManyToOne(targetEntity="Frontend\ProjectBundle\Entity\Project")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    private $project;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->imagePath;
    }

    /**
     * @param mixed $imagePath
     */
    public function setImagePath($imagePath)
    {
        $this->imagePath = $imagePath;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * @param Project $project
     */
    public function setProject($project)
    {
        $this->project = $project;
    }
}
