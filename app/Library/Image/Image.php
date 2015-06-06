<?php
namespace App\Library\Image;

use Exception;
use Sirius\Upload\Handler;

/**
 * Image upload settings
 */
class Image
{

    /**
     * Instant of upload handler
     *
     * @var Handler
     */
    private $uploadHandler;

    /**
     * Error message
     *
     * @var string
     */
    private $error;

    public function __construct($filePath)
    {

        $this->uploadHandler = new Handler($filePath);
        $this->configuration();
        $this->validation();
    }

    /**
     * Set configuration options
     */
    private function configuration()
    {

        $this->uploadHandler->setOverwrite(false);
        $this->uploadHandler->setAutoconfirm(false);
    }

    /**
     * Validation rules for image
     */
    private function validation()
    {
        $this->uploadHandler->addRule('extension', ['allowed' => 'jpg', 'jpeg', 'png'], 'Fail {label} peab olema pilt(jpg, jpeg ,png)');
        $this->uploadHandler->addRule('size', ['max' => '7M'], 'Fail {label} ei tohi olla suurem kui 7mb');
    }

    /**
     * Upload image file
     *
     * @param $file uploaded image file from $_FILE
     * @return bool
     */
    public function uploadImage($file)
    {

        $image = $this->uploadHandler->process($file);

        if (!$image->valid()) {
            $this->setError($image->getMessages());
            return false;
        }

        try {
            $image->confirm();
        } catch (Exception $exception) {
            $this->setError('File upload failed: ' . $exception);
            return false;
        }

        return true;
    }

    /**
     * Get error message
     *
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Set error message
     *
     * @param $message
     * @return $this
     */
    public function setError($message)
    {
        $this->error = $message;
        return $this;
    }
}
