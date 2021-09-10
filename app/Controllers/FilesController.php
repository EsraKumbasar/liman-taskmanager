<?php
namespace App\Controllers;

use Liman\Toolkit\Shell\Command;

class FilesController{
    function getFile()
    {
        $cmd = Command::run("ls -lah");

       

        // Komutu newline ile böldük
        $cmd = explode("\n", $cmd);

        // İlk satırı attık
        array_splice($cmd, 0, 1);

        // her satır üzerinde işlem yapalım.
        foreach ($cmd as $key => &$process)
        {
            // fazlalık boşluklarımı sildim
            $process = preg_replace('/\s+/', ' ', $process);

            // boşluklara göre parçalayalım
            $process = explode(" ", $process);

            // veriyi formatlayalim
            $process = [
                "filepermissions" => $process[0],
                "usergroupid" => $process[1],
                "user" => $process[2],
                "usergroup" => $process[3],
                "filesize" => $process[4],
                "month" => $process[5],
                "day" => $process[6],
                "time" => $process[7],
                "filename" => $process[8]
            ];
        }
        return view("table", [
            "value" => $cmd,
            "display" => ["filepermissions", "usergroupid", "user", "usergroup", "filesize", "month", "day", "time", "filename"],
            "title" => ["Dosya İzini", "Grup Id", "Kullanıcı","Kullanıcı Grubu", "Dosya Boyutu", "Ay", "Gün", "Saat", "Dosya İsmi"],
            "menu" => [
                "Dosya Konumu" => [
                    "target" => "jsGetFileLocation",
                    "icon" => "fa-location-arrow"
                ],
                "Servis Durumu" => [
                    "target" => "jsGetServiceStatus",
                    "icon" => "fa-location-arrow"
                ]
            ]
        ]);
    }
}