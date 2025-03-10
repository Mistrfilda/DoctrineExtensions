<?php

declare(strict_types=1);

/*
 * This file is part of the Doctrine Behavioral Extensions package.
 * (c) Gediminas Morkevicius <gediminas.morkevicius@gmail.com> http://www.gediminasm.org
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Gedmo\Tests\Timestampable\Fixture\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\Types\Type as MongoDBType;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ODM\Document(collection="articles")
 */
#[ODM\Document(collection: 'articles')]
class Article
{
    /** @ODM\Id */
    #[ODM\Id]
    private $id;

    /**
     * @ODM\Field(type="string")
     */
    #[ODM\Field(type: MongoDBType::STRING)]
    private $title;

    /**
     * @ODM\ReferenceOne(targetDocument="Gedmo\Tests\Timestampable\Fixture\Document\Type")
     */
    #[ODM\ReferenceOne(targetDocument: Type::class)]
    private $type;

    /**
     * @var string
     *
     * @ODM\Field(type="timestamp")
     * @Gedmo\Timestampable(on="create")
     */
    #[Gedmo\Timestampable(on: 'create')]
    #[ODM\Field(type: MongoDBType::TIMESTAMP)]
    private $created;

    /**
     * @var \DateTime
     *
     * @ODM\Field(type="date")
     * @Gedmo\Timestampable
     */
    #[Gedmo\Timestampable]
    #[ODM\Field(type: MongoDBType::DATE)]
    private $updated;

    /**
     * @var \DateTime
     *
     * @ODM\Field(type="date")
     * @Gedmo\Timestampable(on="change", field="type.title", value="Published")
     */
    #[Gedmo\Timestampable(on: 'change', field: 'type.title', value: 'Published')]
    #[ODM\Field(type: MongoDBType::DATE)]
    private $published;

    /**
     * @var \DateTime
     *
     * @ODM\Field(type="date")
     * @Gedmo\Timestampable(on="change", field="isReady", value=true)
     */
    #[Gedmo\Timestampable(on: 'change', field: 'isReady', value: true)]
    #[ODM\Field(type: MongoDBType::DATE)]
    private $ready;

    /**
     * @var bool
     *
     * @ODM\Field(type="boolean")
     */
    #[ODM\Field(type: MongoDBType::BOOL)]
    private $isReady = false;

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getPublished()
    {
        return $this->published;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function setType(Type $type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setCreated($created)
    {
        $this->created = $created;
    }

    public function setPublished(\DateTime $published)
    {
        $this->published = $published;
    }

    public function setUpdated(\DateTime $updated)
    {
        $this->updated = $updated;
    }

    public function setReady($ready)
    {
        $this->ready = $ready;

        return $this;
    }

    public function getReady()
    {
        return $this->ready;
    }

    public function setIsReady($isReady)
    {
        $this->isReady = $isReady;

        return $this;
    }

    public function getIsReady()
    {
        return $this->isReady;
    }
}
