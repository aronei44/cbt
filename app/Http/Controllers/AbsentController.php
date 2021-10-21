<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absent;
use App\Models\Presensi;
use App\Models\User;


class AbsentController extends Controller
{
    public function tambah(){
    	Absent::create([
    		'hari'=>' ',
    		'tanggal'=>$_POST['tanggal']
    	]);
    	return redirect("/tambah-absensi");
    }
    public function add(){
        $now = Absent::where('tanggal',date("Y/m/d"))->get();
        if(count($now)>0){
            return view('tambahabsensi',['alert'=>'Absen Hari ini telah ditambahkan. Kembali besok','abs'=>0]);
        }else{
            return view('tambahabsensi',['alert'=>'']);
        
        }
    }
    public function lihat(){
    	$absensi = Absent::latest()->first();
        $harian = Presensi::latest()->firstWhere('user_id',auth()->user()->id);
        $stat = 'Belum Mengisi Kehadiran';
        if(!isset($harian->absent_id)){
            $stat = 'Belum Mengisi Kehadiran';
        }else if($harian->absent_id==$absensi->id){
            $stat = $harian->status;
        }
        if(!$absensi){
            $absensi = [
                'hari'=>'Belum ada absensi',
                'tanggal'=>'Belum ada absensi'
            ];
            $stat= 'Belum ada absensi';
        }
    	return view('absensi',['absensi'=>$absensi,'stat'=>$stat]);
    }
    public function absen(){

        $absensi = Absent::latest()->first();
        $harian = Presensi::latest()->firstWhere('user_id',auth()->user()->id);
        $stat = 'Belum Mengisi Kehadiran';
        if(!isset($harian->absent_id)){
            $stat = 'Belum Mengisi Kehadiran';
        }else if($harian->absent_id==$absensi->id){
            $stat = $harian->status;
        }
        Presensi::create([
            'user_id'=>auth()->user()->id,
            'absent_id'=>Absent::latest()->first()->id,
            'status'=>$_POST['hadir']
        ]);
        return redirect('/absensi');
    }




    public function lihatsemua(){
        $absen = [];
        $row = Absent::with('presensis')->latest()->get();
        foreach ($row as $r) {
            $baris = [
                'hari'=>$r->hari,
                'tanggal'=>$r->tanggal
            ];
            $yangabsen=[];
            foreach ($r->presensis as $p) {
                $jam = explode(' ', $p->created_at);
                $jam = explode(':', $jam[1]);
                if($jam[0]<=17){
                    $jam[0]+=7;
                }else{
                    $jam[0]-=17;
                }

                $absensi = [
                    'nama'=>User::find($p->user_id)->name,
                    'status'=>$p->status,
                    'jam'=>implode(':', $jam)
                ];
                $yangabsen[]=$absensi;
            }
            $baris['absen']=$yangabsen;
            $absen[]=$baris;
        }
        return view('lihatabsen',['absen'=>$absen]);

    }







}
