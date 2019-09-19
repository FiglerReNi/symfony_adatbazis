<?php

namespace BlogBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Student_1
 *
 * @ORM\Table(name="student_1")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\Student_1Repository")
 */
class Student_1
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="Student_1", mappedBy="mentor")
     */
    private $student;

    /**
     * @ORM\ManyToOne(targetEntity="Student_1", inversedBy="student")
     * @ORM\JoinColumn(name="mentor_id", referencedColumnName="id")
     */
    private $mentor;

    public function __construct()
    {
        $this->student = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Student_1
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add student
     *
     * @param \BlogBundle\Entity\Student_1 $student
     *
     * @return Student_1
     */
    public function addStudent(\BlogBundle\Entity\Student_1 $student)
    {
        $this->student[] = $student;

        return $this;
    }

    /**
     * Remove student
     *
     * @param \BlogBundle\Entity\Student_1 $student
     */
    public function removeStudent(\BlogBundle\Entity\Student_1 $student)
    {
        $this->student->removeElement($student);
    }

    /**
     * Get student
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set mentor
     *
     * @param \BlogBundle\Entity\Student_1 $mentor
     *
     * @return Student_1
     */
    public function setMentor(\BlogBundle\Entity\Student_1 $mentor = null)
    {
        $this->mentor = $mentor;

        return $this;
    }

    /**
     * Get mentor
     *
     * @return \BlogBundle\Entity\Student_1
     */
    public function getMentor()
    {
        return $this->mentor;
    }
}
