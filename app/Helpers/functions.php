<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function userLog($acao){
    $now = date("Y-m-d H:i:s");
    DB::table('logs')->insert(['user_id' => Auth::user()->id, 'acao' => $acao, 'created_at' => $now, 'updated_at' => $now]);
}