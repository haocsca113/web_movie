<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\EpisodeAdded;
use App\Models\Frame;
use Illuminate\Support\Facades\Log;

class ExtractFramesFromEpisode
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EpisodeAdded $event)
    {
        $episode = $event->episode;

        // Đường dẫn đầu vào và đầu ra
        $outputPath = storage_path("app/public/frames/movie_{$episode->movie_id}/episode_{$episode->id}");
        if (!is_dir($outputPath)) {
            mkdir($outputPath, 0755, true);
        }

        // Chạy FFmpeg để trích xuất khung hình
        set_time_limit(0); // Không giới hạn thời gian
        $command = "ffmpeg -i \"{$episode->linkvideotructiep}\" -vf fps=1/10 \"$outputPath/frame_%04d.jpg\""; //trích xuất 1 khung hình mỗi 10s
        exec($command, $output, $returnCode);

        Log::info("Command: $command"); 
        Log::info("Output: " . implode("\n", $output)); 

        if ($returnCode === 0) {
            Log::info("Frames extracted for Episode ID {$episode->id} & Movie ID {$episode->movie_id}");

            // Lấy danh sách khung hình đã cắt
            $frames = glob("$outputPath/frame_*.jpg");
            foreach ($frames as $frame) {
                Frame::create([
                    'movie_id' => $episode->movie_id,
                    'frame_path' => "frames/movie_{$episode->movie_id}/episode_{$episode->id}/" . basename($frame),
                ]);
            }
        } 
        else {
            Log::error("Failed to extract frames for Episode ID {$episode->id} & Movie ID {$episode->movie_id}");
            Log::error("Command Output: " . implode("\n", $output)); // Ghi thêm đầu ra lỗi
        }
    }
}
