<?php

namespace App\Http\Controllers;

use Larva\Whois\Whois;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        $title = "Dashboard";
        $description = "Admin Panel Dashboard";

        return view('index',[
            'title'=>$title,
            'description'=>$description
        ]);
    }

    public function users() {
        return view('users');
    }

    public function pingForm()
    {
        return view('ping');
    }

    public function ping(Request $request)
    {
        $ipAddress = $request->input('ip_address');

        // Perform custom ping using PHP sockets
        $pingResult = $this->performPing($ipAddress);

        return view('ping-result', ['pingResult' => $pingResult]);
    }

    private function performPing($ipAddress)
    {
        $packetCount = 4; // Number of packets to send
        $timeout = 1; // Socket timeout in seconds
        $pingTimes = [];

        for ($i = 0; $i < $packetCount; $i++) {
            $startTime = microtime(true);
            $socket = @fsockopen($ipAddress, 80, $errno, $errstr, $timeout);

            if ($socket) {
                fclose($socket);
                $endTime = microtime(true);
                $pingTimeMs = round(($endTime - $startTime) * 1000, 2);
                $pingTimes[] = $pingTimeMs;
            } else {
                $pingTimes[] = null; // Indicates packet loss
            }
        }

        $packetLossCount = count(array_filter($pingTimes, function ($time) {
            return $time === null;
        }));
        $pingTimes = array_filter($pingTimes); // Remove null values (packet loss)

        $pingResult = [
            'host' => $ipAddress,
            'packetCount' => $packetCount,
            'packetLossCount' => $packetLossCount,
            'pingTimes' => $pingTimes,
        ];

        return $pingResult;
    }


    public function whois() {
        // $info = Whois::lookup('facebook.com');
        // dd($info);

        return view('whois');
    }

    public function urlshort() {
        return view('urlshort');
    }
}
