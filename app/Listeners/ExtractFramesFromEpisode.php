<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\EpisodeAdded;
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

        // Chạy FFmpeg để trích xuất khung hình
        $outputPath = storage_path("app/public/frames/movie_{$episode->movie_id}/episode_{$episode->id}");
        if (!is_dir($outputPath)) {
            mkdir($outputPath, 0755, true);
        }

        $command = "ffmpeg -i \"{$episode->linkphim}\" -vf fps=1 \"$outputPath/frame_%04d.jpg\"";
        exec($command, $output, $returnCode);

        Log::info("Command: $command"); // Ghi lại lệnh đã thực thi
        Log::info("Output: " . implode("\n", $output)); // Ghi đầu ra của lệnh

        if ($returnCode === 0) {
            Log::info("Frames extracted for Episode ID {$episode->id}");
        } else {
            Log::error("Failed to extract frames for Episode ID {$episode->id}");
            Log::error("Command Output: " . implode("\n", $output)); // Ghi thêm đầu ra lỗi
        }
    }
}
