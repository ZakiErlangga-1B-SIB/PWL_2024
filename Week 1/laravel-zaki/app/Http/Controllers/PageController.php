<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index() {
        return 'Selamat Datang';
    }
    public function about(){
        return 'Nama : Zaki Muhammad Athallah Erlangga Nim : 2341760018';
    }
    public function articles($id){
        return 'Halaman artikel dengan ID : '.$id;
    }
    //
}
