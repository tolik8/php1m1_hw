<?php

namespace my;

class ImageUploader
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function upload(array $upload_file, $id)
    {
        if ($upload_file['error'] == 0) {

            $result = false;
            $md5 = md5_file($upload_file['tmp_name']);

            switch ($upload_file['type']) {
                case 'image/jpeg':
                    $ext = '.jpg';
                    $destination = IMG_PATH . $md5 . $ext;
                    $source = imagecreatefromjpeg($upload_file['tmp_name']);
                    if (file_exists($destination)) {$result = true;} else {
                        $result = imagejpeg($source, $destination);
                    }
                    break;
                case 'image/png':
                    $ext = '.png';
                    $destination = IMG_PATH . $md5 . $ext;
                    $source = imagecreatefrompng($upload_file['tmp_name']);
                    imagealphablending($source, false);
                    imagesavealpha($source, true);
                    if (file_exists($destination)) {$result = true;} else {
                        $result = imagepng($source, $destination);
                    }
                    break;
                case 'image/gif':
                    $ext = '.gif';
                    $destination = IMG_PATH . $md5 . $ext;
                    $source = imagecreatefromgif($upload_file['tmp_name']);
                    if (file_exists($destination)) {$result = true;} else {
                        $result = imagegif($source, $destination);
                    }
                    break;
                default:
                    $ext = '';
                    $result = false;
            }
            if ($result) {
                $this->db->update('posts', ['img' => $md5 . $ext], $id);
            }
        }
    }

    public function delete($id)
    {
        $post = $this->db->getOne('posts', $id);
        // найти сколько раз используется это изображение
        $count = $this->db->count('posts', ['img' => $post['img']]);

        // если такое изображение больше не используется то удалить файл
        if ($count == 1) {
            $image_name = IMG_PATH . $post['img'];
            if (file_exists($image_name)) {unlink($image_name);}
        }
        $post = $this->db->update('posts', ['img' => NULL], $id);
    }
}