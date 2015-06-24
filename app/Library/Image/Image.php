<?php
namespace App\Library\Image;

use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

/**
 * Image upload settings
 */
class Image
{

    /**
     * Instant of upload handler
     *
     * @var Request
     */
    private $uploadHandler;

    /**
     * Table name where pictures are stored
     *
     * @var string
     */
    private $pictureTable = 'pictures';

    /**
     * Level or type of pictures, like cover, profile, avatar
     *
     * @var string
     */
    private $pictureLevel;
    /**
     * Path in file system where picture is stored
     *
     * @var string
     */
    private $filePath;
    /**
     * Error message
     *
     * @var string
     */
    private $error;

    /**
     * Picture database id
     *
     * @var int
     */
    private $pictureId;

    /**
     * @param string $inputName     Html input filed name what is used for file upload
     * @param string $filePath      Path where file will be saved in file system
     * @param string $pictureLevel  Level or type of pictures, like cover, profile, avatar
     */
    public function __construct($inputName, $filePath, $pictureLevel)
    {

        $this->pictureLevel = $pictureLevel;
        $this->filePath = $filePath;
        $this->uploadHandler = Request::file($inputName);
    }

    /**
     * Upload picture and add it to database
     *
     * @param int $teamId
     * @param bool $reusable
     * @return bool
     */
    public function uploadPicture($teamId = 0, $reusable = false)
    {

        if ($this->validateFileType()->fails()) {
            $this->setError('File have to be picture (jpeg, png)');
            return false;
        }

        if (!$this->uploadHandler->isValid()) {
            $this->setError('File upload to tmp folder failed');
            return false;
        }

        $fileName = $this->generateFileName();

        if ($this->uploadHandler->move(public_path($this->filePath), $fileName)) {
            $query = DB::table($this->pictureTable)->insertGetId(
                [
                    'file_name' => $fileName,
                    'level' => $this->pictureLevel,
                    'reusable' => $reusable,
                    'uploader_team_id' => $teamId
                ]
            );

            if (!$query) {
                $this->setError('Inserting file name in database failed');
                return false;
            }

            $this->setPictureId($query);
            return true;
        }

        return false;
    }

    /**
     * Validate file type with laravel validator
     *
     * @return mixed
     */
    private function validateFileType()
    {
        $validation = Validator::make(
            ['cover' => $this->uploadHandler],
            [
                'cover' => 'mimes:jpeg,png'
            ]
        );

        return $validation;
    }

    /**
     * Check that picture with same name does not exist in table where pictures are stored
     *
     * @param $filename
     * @return bool
     */
    private function validateFileName($filename)
    {

        $results = DB::table($this->pictureTable)->where('file_name', $filename)->first();

        if ($results) {
            return false;
        }

        return $filename;
    }

    /**
     * Generate random file name
     *
     * @return int
     */
    private function generateFileName()
    {
        //generate new file name
        $generatedName = rand(1000, 100000). '.'. $this->uploadHandler->getClientOriginalExtension();

        if(!$this->validateFileName($generatedName)) {
            $this->generateFileName();
        }

        return $generatedName;
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

    /**
     * @return int
     */
    public function getPictureId()
    {
        return $this->pictureId;
    }

    /**
     * @param int $pictureId
     * @return $this
     */
    public function setPictureId($pictureId)
    {
        $this->pictureId = $pictureId;

        return $this;
    }
}
