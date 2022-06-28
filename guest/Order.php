<?php

class Order
{
    private  $order_note;
    private $date_time;
    private $is_sent;
    /**
     * @return mixed
     */
    public function getOrderNote()
    {
        return $this->order_note;
    }

    /**
     * @param mixed $order_note
     */
    public function setOrderNote($order_note): void
    {
        $this->order_note = $order_note;
    }

    /**
     * @return mixed
     */
    public function getDateTime()
    {
        return $this->date_time;
    }

    /**
     * @param mixed $date_time
     */
    public function setDateTime($date_time): void
    {
        $this->date_time = $date_time;
    }

    /**
     * @return mixed
     */
    public function getIsSent()
    {
        return $this->is_sent;
    }

    /**
     * @param mixed $is_sent
     */
    public function setIsSent($is_sent): void
    {
        $this->is_sent = $is_sent;
    }

}