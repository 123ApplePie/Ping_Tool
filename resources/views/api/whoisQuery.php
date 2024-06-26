<?php
/*
    Copyright (c) 2023 Maksim Pinigin
*/

error_reporting(E_ERROR | E_PARSE);
header("Content-Type: text/plain; charset=utf-8");

if(!isset($_POST['domain'])) {
    echo 'badargs';
    exit;
}

$_POST['domain'] = idn_to_ascii($_POST['domain']);

// init cache
if(!file_exists(__DIR__."/../cache")) mkdir(__DIR__."/../cache");
if(!file_exists(__DIR__."/../cache/tld.json")) file_put_contents(__DIR__."/../cache/tld.json", "{}");

$matches = [];
$_POST['domain'] = strtolower($_POST['domain']);
if(!preg_match("/^(?:www\.)?([A-Za-z0-9_-]+\.)?([A-Za-z0-9_-]+\.)?([A-Za-z0-9_-]+)$/", $_POST['domain'], $matches)) {
    echo 'bad_domain';
    exit;
}
$domain = '';
$is_tld = false;
if($matches[1] === "" && $matches[3] !== "") {
     $domain = $matches[3];
     $is_tld = true;
}
else $domain = $_POST['domain'];
$tld_cache = json_decode(file_get_contents(__DIR__."/../cache/tld.json"), true);
if(!isset($tld_cache[$matches[3]]) || isset($tld_cache[$matches[3]]) && time()-$tld_cache[$matches[3]]["cached_at"] > (86400*30) || $is_tld) {
    $sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
    $addr = gethostbyname("whois.iana.org");
    if(!socket_connect($sock, $addr, 43)) {
        echo 'root_connection_error';
        exit;
    }
    $req = $matches[3]."\r\n";
    socket_write($sock, $req, strlen($req));
    $buf = '';
    while (true) {
        $data = socket_read($sock, 12288);
        if($data) $buf .= $data;
        else break;
    }
    socket_close($sock);
    $tld_matches = [];
    if(!preg_match("/whois:\s+([A-Za-z0-9\._-]+)/", $buf, $tld_matches)) {
        echo 'bad_tld';
        $tld_cache[$matches[3]] = [
            "whois" => null,
            "cached_at" => time()
        ];
        file_put_contents(__DIR__."/../cache/tld.json", json_encode($tld_cache));
        exit;
    }
    if($is_tld) {
        echo $buf;
        exit;
    }
    $tld_cache[$matches[3]] = [
        "whois" => $tld_matches[1],
        "cached_at" => time()
    ];
    file_put_contents(__DIR__."/../cache/tld.json", json_encode($tld_cache));
}

if($tld_cache[$matches[3]]["whois"] === null) {
    echo 'bad_tld';
    exit;
}

// request to tld's whois server
$sock = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
$addr = gethostbyname($tld_cache[$matches[3]]["whois"]);
if(!socket_connect($sock, $addr, 43)) {
    echo 'tld_connection_error';
    exit;
}
$req = $domain."\r\n";
socket_write($sock, $req, strlen($req));
$buf = '';
while (true) {
    $data = socket_read($sock, 12288);
    if($data) $buf .= $data;
    else break;
}
socket_close($sock);
echo str_replace("@", "(аt)", $buf)."\n";