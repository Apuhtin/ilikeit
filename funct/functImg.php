 <?php
 /**
 * Функции работы с изображениями
 */
 
function  resizeimg($SourceFile, $width, $height, $FileOutput ){

    $ext = pathinfo($SourceFile, PATHINFO_EXTENSION);
    

//Ресайз картинки по одной из сторон без обрезания
//У контейнера под кртинку остаются пустые поля - некрасиво
    // получение новых размеров
//    list($width_orig, $height_orig) = getimagesize($SourceFile);

//    $ratio_orig = $width_orig/$height_orig;
//
//    if ($width/$height > $ratio_orig) {
//       $width = $height*$ratio_orig;
//    } else {
//       $height = $width/$ratio_orig;
//    }
//
//    // Создаем картинку с новыми размерами
//    $image_p = imagecreatetruecolor($width, $height);
//    
//    if (strcasecmp($ext, "jpg") == 0 or strcasecmp($ext, "jpeg") == 0 ) {
//        $image = imagecreatefromjpeg($SourceFile);
//    }
//    if (strcasecmp($ext, "png") == 0) {
//        $image = imagecreatefrompng($SourceFile);
//    }    
//    
//    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
//
//    // вывод
//    imagepng ($image_p, $FileOutput,9, PNG_ALL_FILTERS);
//    imagedestroy($image_p); //очищаем память

//Ресайз картинки по одной из сторон с обрезанием выступающих элементов
//У контейнера под кртинку пустых полей нет но обрезается часть картинки если она не сответствует пропорциям контейнера
//Сомртиться красивее
    //Исходные размеры картинки
    list($w1, $h1) = getimagesize($SourceFile);
    $Prop = $width/$height;
       
    if ($w1/$h1 > $Prop) {
        //Выравнивание по высоте с обрезанием по оси х 
        $w2 = $h1 * $Prop;
        $h2 = $h1;
        
        $x1 = ($w1 - $w2)/2;
        $y1 = 0;
       
    } else {
        //Выравнивание по ширине с обрезанием по оси y
        $h2 = $w1/$Prop;
        $w2 = $w1;
        
        $x1 = 0;
        $y1 = ($h1 - $h2)/2;
        
    }
    
    // Создаем картинку с новыми размерами
    $image_p = imagecreatetruecolor($width, $height);
    
    if (strcasecmp($ext, "jpg") == 0 or strcasecmp($ext, "jpeg") == 0 ) {
        $image = imagecreatefromjpeg($SourceFile);
    }
    if (strcasecmp($ext, "png") == 0) {
        $image = imagecreatefrompng($SourceFile);
    }    
    
    imagecopyresampled($image_p, $image, 0, 0, $x1, $y1, $width, $height, $w2, $h2);

    // вывод
    imagepng ($image_p, $FileOutput,9, PNG_ALL_FILTERS);
    imagedestroy($image_p); //очищаем память    
    
    
}

function rotateimg($SourceFile, $degrees){
    
    if (file_exists($SourceFile)) {
        
        $imgRotated = imagecreatefrompng($SourceFile);    // Картинка
        $imgRotated = imagerotate($imgRotated, $degrees, 0);

        imagepng ($imgRotated, $SourceFile,9, PNG_ALL_FILTERS);
        imagedestroy($imgRotated); //очищаем память
        
        return True;
        
    } else {
        return FALSE;
    }
       
}

?>