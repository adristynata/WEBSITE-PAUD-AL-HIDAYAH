<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::defaultView('admin.partials.pagination');

        // Sinkronisasi logo resmi dengan background transparan
        try {
            $srcLogo = 'C:/Users/HP/.gemini/antigravity/brain/03753526-d35b-42fa-b7fe-6ac8a552c3ba/.user_uploaded/media_1787839895963.jpg';
            if (file_exists($srcLogo)) {
                $targetLogoPng = public_path('images/logo.png');
                $targetFavicon = public_path('favicon.ico');
                $targetFaviconPng = public_path('favicon.png');
                $flagFile = public_path('images/.logo_trans_v2');

                if (!file_exists($flagFile) || !file_exists($targetLogoPng)) {
                    if (!is_dir(public_path('images'))) {
                        @mkdir(public_path('images'), 0755, true);
                    }
                    $this->makeOuterBackgroundTransparent($srcLogo, $targetLogoPng);
                    @copy($targetLogoPng, $targetFavicon);
                    @copy($targetLogoPng, $targetFaviconPng);
                    @file_put_contents($flagFile, 'done');
                }
            }
        } catch (\Throwable $e) {
            // Ignore if copy fails
        }

        try {
            if (\Illuminate\Support\Facades\Schema::hasTable('profil_sekolahs')) {
                if (!\Illuminate\Support\Facades\Schema::hasColumn('profil_sekolahs', 'hero_slide_1')) {
                    \Illuminate\Support\Facades\Schema::table('profil_sekolahs', function ($table) {
                        $table->string('hero_slide_1')->nullable();
                        $table->string('hero_slide_2')->nullable();
                        $table->string('hero_slide_3')->nullable();
                    });
                }
            }
        } catch (\Throwable $e) {
            // Ignore if DB not reachable yet
        }
    }

    /**
     * Menghapus background putih bagian luar logo menjadi PNG transparan
     */
    private function makeOuterBackgroundTransparent(string $srcPath, string $destPngPath): void
    {
        if (!function_exists('imagecreatefromstring')) {
            @copy($srcPath, $destPngPath);
            return;
        }

        $content = @file_get_contents($srcPath);
        if (!$content) {
            @copy($srcPath, $destPngPath);
            return;
        }

        $src = @imagecreatefromstring($content);
        if (!$src) {
            @copy($srcPath, $destPngPath);
            return;
        }

        $width = imagesx($src);
        $height = imagesy($src);

        $out = imagecreatetruecolor($width, $height);
        imagealphablending($out, false);
        imagesavealpha($out, true);

        $transparent = imagecolorallocatealpha($out, 0, 0, 0, 127);

        // BFS Flood Fill dari perimeter terluar untuk menghapus warna putih di luar logo
        $visited = [];
        for ($y = 0; $y < $height; $y++) {
            $visited[$y] = array_fill(0, $width, false);
        }

        $queue = new \SplQueue();

        $isWhite = function ($x, $y) use ($src) {
            $rgb = imagecolorat($src, $x, $y);
            $r = ($rgb >> 16) & 0xFF;
            $g = ($rgb >> 8) & 0xFF;
            $b = $rgb & 0xFF;
            return ($r >= 235 && $g >= 235 && $b >= 235);
        };

        // Enqueue perimeter luar jika berwarna putih
        for ($x = 0; $x < $width; $x++) {
            if ($isWhite($x, 0)) { $queue->enqueue([$x, 0]); $visited[0][$x] = true; }
            if ($isWhite($x, $height - 1)) { $queue->enqueue([$x, $height - 1]); $visited[$height - 1][$x] = true; }
        }
        for ($y = 0; $y < $height; $y++) {
            if (!$visited[$y][0] && $isWhite(0, $y)) { $queue->enqueue([0, $y]); $visited[$y][0] = true; }
            if (!$visited[$y][$width - 1] && $isWhite($width - 1, $y)) { $queue->enqueue([$width - 1, $y]); $visited[$y][$width - 1] = true; }
        }

        $dirs = [[1,0], [-1,0], [0,1], [0,-1]];
        while (!$queue->isEmpty()) {
            [$cx, $cy] = $queue->dequeue();
            foreach ($dirs as [$dx, $dy]) {
                $nx = $cx + $dx;
                $ny = $cy + $dy;
                if ($nx >= 0 && $nx < $width && $ny >= 0 && $ny < $height) {
                    if (!$visited[$ny][$nx] && $isWhite($nx, $ny)) {
                        $visited[$ny][$nx] = true;
                        $queue->enqueue([$nx, $ny]);
                    }
                }
            }
        }

        // Render pixel ke output image
        for ($y = 0; $y < $height; $y++) {
            for ($x = 0; $x < $width; $x++) {
                if ($visited[$y][$x]) {
                    imagesetpixel($out, $x, $y, $transparent);
                } else {
                    $rgb = imagecolorat($src, $x, $y);
                    $r = ($rgb >> 16) & 0xFF;
                    $g = ($rgb >> 8) & 0xFF;
                    $b = $rgb & 0xFF;
                    $col = imagecolorallocatealpha($out, $r, $g, $b, 0);
                    imagesetpixel($out, $x, $y, $col);
                }
            }
        }

        imagepng($out, $destPngPath, 9);
        imagedestroy($src);
        imagedestroy($out);
    }
}
