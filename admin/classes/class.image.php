<?php

/**
 * Class for working with images
 * 
 * @package UPcms\Image
 * @author UP Studio <info@up-studio.net>
 * @date 20/02/2016
 */

class Image
{
    /**
     * Adding image
     * 
     * @param string $src - name in tag input
     * @param string $path - path to save
     * @param string $name - if(0) ? microtime : name
     * @return array
     */
    public static function imageAdd($src, $path, $name = 0)
    {
        $img = $_FILES[$src]['tmp_name'];
        if (!$name)
        {
            $name = md5(microtime() . rand(0, 9999));
        }
        $size = getimagesize($img);
        if ($size[2] == 1 || $size[2] == 2 || $size[2] == 3 || $size[2] == 6)
        {
            switch ($size[2])
            {
                case 1:
                    $tp = '.gif';
                    break;
                case 2:
                    $tp = '.jpg';
                    break;
                case 3:
                    $tp = '.png';
                    break;
                case 6:
                    $tp = '.bmp';
                    break;
            }
            move_uploaded_file($img, $path . $name . $tp);
            $file = array();
            $file['name'] = $name;
            $file['name_full'] = $name . $tp;
            $file['path'] = $path;
            $file['full'] = $path . $name . $tp;
            return $file;
        }
        else
        {
            return array();
        }
    }
    
    /**
     * Changing image size
     * 
     * @param string $src - path to original
     * @param string $path - path to save
     * @param integer $width - new width
     * @param integer $height - new height
     * @param string $name - $name - if(0) ? microtime : name
     * @param boolean $crop - $name - if(0) ? no crop : crop
     * @return string
     */
    public static function imageResize($src, $path, $width, $height, $name = 0, $crop = 0)
    {
        if (!list($w, $h) = getimagesize($src))
            return "Unsupported picture type!";

        $type = strtolower(substr(strrchr($src, "."), 1));
        if ($type == 'jpeg')
            $type = 'jpg';
        switch ($type)
        {
            case 'bmp':
                $img = imagecreatefromwbmp($src);
                break;
            case 'gif':
                $img = imagecreatefromgif($src);
                break;
            case 'jpg':
                $img = imagecreatefromjpeg($src);
                break;
            case 'png':
                $img = imagecreatefrompng($src);
                break;
            default:
                return "Unsupported picture type!";
        }

        // Resize
        if ($crop)
        {
            if ($w < $width or $h < $height)
                return "Picture is too small!";
            $ratio = max($width / $w, $height / $h);
            $h = $height / $ratio;
            $x = ($w - $width / $ratio) / 2;
            $w = $width / $ratio;
        }
        else
        {
            if ($w < $width and $h < $height)
                return "Picture is too small!";
            $ratio = min($width / $w, $height / $h);
            $width = $w * $ratio;
            $height = $h * $ratio;
            $x = 0;
        }

        $new = imagecreatetruecolor($width, $height);

        // Transparency for gif and png
        if ($type == "gif" or $type == "png")
        {
            imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
            imagealphablending($new, false);
            imagesavealpha($new, true);
        }

        imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);
        if (!$name)
        {
            $name = explode(" ", microtime());
            $name = $name[1];
        }
        $file = $_SERVER['DOCUMENT_ROOT'] . '/' . $path . $name . '.' . $type;
        $img = $name . '.' . $type;
        switch ($type)
        {
            case 'bmp':
                imagewbmp($new, $file);
                break;
            case 'gif':
                imagegif($new, $file);
                break;
            case 'jpg':
                imagejpeg($new, $file, 100); // Quality jpg
                break;
            case 'png':
                imagepng($new, $file);
                break;
        }
        return $img;
    }
    
    /**
     * Deleting image
     * 
     * @param string $path - path to image
     * @return boolean
     */
    public static function imageDel($path)
    {
        if (file_exists($path))
        {
            unlink($path);
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Add watermark
     *
     * @param $target
     * @param $wtrmrk_file
     * @param $name
     * @param $pos - position: top, center, bottom
     */
    public static function watermarkImage($target, $wtrmrk_file, $name, $pos) {
        $watermark = imagecreatefrompng($wtrmrk_file);
        imagealphablending($watermark, false);
        imagesavealpha($watermark, true);
        $img = imagecreatefromjpeg($target);
        $img_w = imagesx($img);
        $img_h = imagesy($img);
        $wtrmrk_w = imagesx($watermark);
        $wtrmrk_h = imagesy($watermark);

        switch ($pos){
            case 'top':
                $dst_x = 0;
                $dst_y = 0;
                break;

            // For centering the watermark on any image
            case 'center':
                $dst_x = ($img_w / 2) - ($wtrmrk_w / 2);
                $dst_y = ($img_h / 2) - ($wtrmrk_h / 2);
                break;

            case 'bottom':
                $dst_x = 0;
                $dst_y = $img_h - $wtrmrk_h;
                break;
        }

        imagecopy($img, $watermark, $dst_x, $dst_y, 0, 0, $wtrmrk_w, $wtrmrk_h);
        imagejpeg($img, $name, 100);
        imagedestroy($img);
        imagedestroy($watermark);
    }
}
