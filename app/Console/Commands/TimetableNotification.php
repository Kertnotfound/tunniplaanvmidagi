<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

#[Signature('app:timetable-notification')]
#[Description('Command description')]
class TimetableNotification extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
    
    $startDate = now()->startOfWeek()->toIsoString();
    $endDate = now()->endOfWeek()->toIsoString();


    $url = 'https://tahveltp.edu.ee/hois_back/timetableevents/timetableSearch';
    $query = '?from=' . $startDate . '&lang=ET&page=0&schoolId=38&size=50&studentGroups=ea0550fb-8387-4aa2-880a-9abbd37a69ce&thru=' . $endDate;

    
    
        $response = Http::get($url . $query)->json();

        dd($response);
    }
}
