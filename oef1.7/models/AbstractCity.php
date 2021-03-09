<?php


abstract class AbstractCity
{
    private $id;
    private $filename;
    private $lan_id;

    abstract public function getTitle();
    abstract public function getWidth();
    abstract public function getHeight();
    abstract public function getPublished();
    abstract public function getDate();


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function setFilename($filename): void
    {
        $this->filename = $filename;
    }

    /**
     * @return mixed
     */
    public function getLanId()
    {
        return $this->lan_id;
    }

    /**
     * @param mixed $lan_id
     */
    public function setLanId($lan_id): void
    {
        $this->lan_id = $lan_id;
    }


    public function toArray(): array
    {
        return [
            "id" => $this->getId(),
            "filename" => $this->getFilename(),
            "title" => $this->getTitle(),
            "width" => $this->getWidth(),
            "height" => $this->getHeight(),
            "published" => $this->getPublished(),
            "lan_id" => $this->getLanId(),
            "date" => $this->getDate()
        ];
    }

    public function toArray2(): array
    {
        $retarr = [];

        foreach( $this as $key => $value )
        {
            $retarr[$key] = $value;
        }
        return $retarr;
    }

}