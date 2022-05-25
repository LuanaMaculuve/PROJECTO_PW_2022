<?php

namespace upimg;

class uploadImg
{
    function urlImg($img)
    {
        $img_name = $img['img']['name'];
        $img_size = $img['img']['size'];
        $tmp_name = $img['img']['tmp_name'];
        $error = $img['img']['error'];

        if ($error === 0) {
            if ($img_size > 130000000) {
                echo "Image too Large";
            } else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);

                $allowed_exs = array("jpg", "jpeg", "png");

                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
                    $uploaded_img_path = 'Uploaded_img/' . $new_img_name;
                    move_uploaded_file($tmp_name, $uploaded_img_path);
                } else {
                    echo "Extensao invalida";
                }
            }
            return $new_img_name;
        } else {
        }
    }
}
