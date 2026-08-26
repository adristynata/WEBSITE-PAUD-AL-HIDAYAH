<?php

namespace App\Helpers;

class ImageHelper
{
    /**
     * Otomatis memotong (crop/trim) margin kosong/transparan di sekeliling tanda tangan
     * sehingga ukuran tanda tangan pas dan proporsional saat dicetak di PDF.
     */
    public static function trimSignature(string $fullPath): void
    {
        if (!file_exists($fullPath)) {
            return;
        }

        $extension = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
        if ($extension === 'png') {
            $im = @imagecreatefrompng($fullPath);
        } elseif ($extension === 'jpeg' || $extension === 'jpg') {
            $im = @imagecreatefromjpeg($fullPath);
        } elseif ($extension === 'webp') {
            $im = @imagecreatefromwebp($fullPath);
        } else {
            $content = file_get_contents($fullPath);
            $im = $content ? @imagecreatefromstring($content) : null;
        }

        if (!$im) {
            return;
        }

        $w = imagesx($im);
        $h = imagesy($im);

        $minX = $w;
        $minY = $h;
        $maxX = 0;
        $maxY = 0;

        for ($y = 0; $y < $h; $y++) {
            for ($x = 0; $x < $w; $x++) {
                $rgba = imagecolorat($im, $x, $y);
                $alpha = ($rgba & 0x7F000000) >> 24; // 0 = opaque, 127 = fully transparent
                $r = ($rgba >> 16) & 0xFF;
                $g = ($rgba >> 8) & 0xFF;
                $b = $rgba & 0xFF;

                // Cek pixel: bukan transparan dan bukan putih murni
                $isNotTransparent = ($alpha < 120);
                $isNotWhite = ($r < 245 || $g < 245 || $b < 245);

                if ($isNotTransparent && $isNotWhite) {
                    if ($x < $minX) $minX = $x;
                    if ($x > $maxX) $maxX = $x;
                    if ($y < $minY) $minY = $y;
                    if ($y > $maxY) $maxY = $y;
                }
            }
        }

        // Jika ditemukan coretan tinta
        if ($maxX >= $minX && $maxY >= $minY) {
            $padding = 10;
            $pMinX = max(0, $minX - $padding);
            $pMinY = max(0, $minY - $padding);
            $pMaxX = min($w - 1, $maxX + $padding);
            $pMaxY = min($h - 1, $maxY + $padding);
            $finalW = $pMaxX - $pMinX + 1;
            $finalH = $pMaxY - $pMinY + 1;

            $dest = imagecreatetruecolor($finalW, $finalH);
            imagealphablending($dest, false);
            imagesavealpha($dest, true);
            $trans = imagecolorallocatealpha($dest, 255, 255, 255, 127);
            imagefilledrectangle($dest, 0, 0, $finalW, $finalH, $trans);

            imagecopy($dest, $im, 0, 0, $pMinX, $pMinY, $finalW, $finalH);
            imagepng($dest, $fullPath);
            imagedestroy($dest);
        }

        imagedestroy($im);
    }
}
