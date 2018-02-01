<?php

    class Upload
    {
        public static function uploadimages($file)
        {
            $uploadedfiletype = pathinfo($file['name'], PATHINFO_EXTENSION);

            $whitelist = array('png', 'jpg', 'jpeg');

            if(!in_array($uploadedfiletype, $whitelist))
            {
                return false;
            }
            else
            {
                $path = 'assets/images/';
                $directory = $path.basename($file['name']);
                Upload::resize($file);
                if (move_uploaded_file($file['tmp_name'], $directory))
                {
                    return $directory;
                }
                else
                {
                    return false;
                }
            }

        }

    }

?>
