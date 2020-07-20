<?php

namespace App\Model;

class BorrowCard
{
    private $id;
    private $borrow_date;
    private $return_date;
    private $reader_id;
    function __construct($borrow_date, $return_date, $reader_id)
    {
        $this->borrow_date = $borrow_date;
        $this->return_date = $return_date;
        $this->reader_id = $reader_id;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of borrow_date
     */
    public function getBorrow_date()
    {
        return $this->borrow_date;
    }

    /**
     * Set the value of borrow_date
     *
     * @return  self
     */
    public function setBorrow_date($borrow_date)
    {
        $this->borrow_date = $borrow_date;

        return $this;
    }

    /**
     * Get the value of return_date
     */
    public function getReturn_date()
    {
        return $this->return_date;
    }

    /**
     * Set the value of return_date
     *
     * @return  self
     */
    public function setReturn_date($return_date)
    {
        $this->return_date = $return_date;

        return $this;
    }

    /**
     * Get the value of reader_id
     */
    public function getReader_id()
    {
        return $this->reader_id;
    }

    /**
     * Set the value of reader_id
     *
     * @return  self
     */
    public function setReader_id($reader_id)
    {
        $this->reader_id = $reader_id;

        return $this;
    }
}
