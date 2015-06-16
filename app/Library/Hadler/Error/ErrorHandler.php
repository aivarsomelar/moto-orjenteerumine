<?php
namespace App\Library\Handler\Error;

/**
 * Errors handler for setting and getting errors
 */
class ErrorHandler
{

    /**
     * Error holder
     *
     * @var string
     */
    private $error;

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string $error
     * @return $this
     */
    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }
}