<?php


class File
{

	public $name,
		$tmpName,
		$ext,
		$size,
		$error,
		$path;


	public function file($file)
	{

		$this->error = $_FILES[$file]['error'];

		if (!$this->error) {
			$this->size 	= 	$_FILES[$file]['size'];
			$this->name 	= 	time();
			$this->tmpName = 	$_FILES[$file]['tmp_name'];
			$this->ext     = 	$this->getFileExtension($_FILES[$file]['name']);
			$this->path	= './public/uploads/';
		}
	}

	public function validate()
	{
		if (in_array($this->ext, array('jpg', 'jpeg', 'png', 'webp'))) {
			return true;
		} else {
			return false;
		}
	}

	public function getFileExtension($fileName)
	{

		$ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

		return $ext;
	}

	public function upload()
	{

		$path = $this->path . $this->name . '.' . $this->ext;
		move_uploaded_file($this->tmpName, $path);
	}

	public function name()
	{
		return $this->name . '.' . $this->ext;
	}
	public static function delete($name)
	{

		$path =   './public/uploads/' . $name;


		if (file_exists($path)) {

			unlink($path);
			return true;
		}
		return false;
	}
}
