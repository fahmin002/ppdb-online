<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            "page" => "home"
        ];
        return view('home', $data);
    }
    public function tentang()
    {
        $data = [
            "page" => "tentang"
        ];
        return view('tentang', $data);
    }

    public function prestasi()
    {
        $data = [
            "page" => "prestasi"
        ];
        return view('prestasi', $data);
    }
    public function galeri()
    {
        $data = [
            "page" => "galeri"
        ];
        return view('galeri', $data);
    }
    public function jadwal()
    {
        $data = [
            "page" => "jadwal"
        ];
        return view('jadwal', $data);
    }
    public function kontak()
    {
        $data = [
            "page" => "kontak"
        ];
        return view('kontak', $data);
    }

    public function ppdb()
    {
        $data = [
            "page" => "ppdb"
        ];
        return view('ppdb', $data);
    }
}
