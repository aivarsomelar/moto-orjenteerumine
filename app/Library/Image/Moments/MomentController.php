<?php
namespace App\Library\Image\Moments;

use App\Library\Handler\Error\ErrorHandler;
use App\Library\Image\Image;
use Illuminate\Support\Facades\Auth;

/**
 * Control actions with profile pictures
 */
class MomentController
{

    /**
     * File system path where profile pictures are stored
     */
    const PATH = '/pic/upload/';

    /**
     * Team id
     *
     * @var int
     */
    protected $teamId;

    /**
     * Instance of image
     *
     * @var Image
     */
    protected $uploadHandler;

    /**
     * Instance of error handler
     *
     * @var ErrorHandler
     */
    protected $errorHandler;

    /**
     * Set team id
     */
    public function __construct()
    {
        $this->teamId = Auth::id();
        $this->uploadHandler = new Image('moments', self::PATH, 'moments');
        $this->errorHandler = new ErrorHandler;
    }

    /**
     * Get file system path where profile pictures are saved
     *
     * @return string
     */
    public function getMomentsPicturesPath()
    {

        return self::PATH;
    }

}