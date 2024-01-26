<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Inertia\Response;

class HuntingController extends Controller
{
    public function index(): Response
    {
        $data = Cache::remember('huntingLog', now()->addDay(), function() {

            $huntingJobs = ['ACN', 'ARC', 'CNJ', 'GLA', 'LNC', 'MRD', 'PGL', 'ROG', 'THM'];
            $jobs = Job::whereIn('abbr', $huntingJobs)->orderBy('abbr')->pluck('name', 'abbr');

            $companies = [
                'IMF' => 'Immortal Flames',
                'MLS' => 'Maelstrom',
                'ORD' => 'Order of the Twin Adder',
            ];

            $huntingData = json_decode(file_get_contents(resource_path('data/huntingData.json')));

            return compact('jobs', 'companies', 'huntingData');
        });

        return Inertia::render('Hunting/Index', $data);
    }
}