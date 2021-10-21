<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function lihatsemua(){
    	$tasks = Task::where('nama',auth()->user()->name)->latest()->get();
    	return view('lihattugas',['tasks'=>$tasks]);
    }
    public function lihat(){
    	$tasks = Task::with('fills')->latest()->get();
    	return view('tugas',['tasks'=>$tasks]);
    }
    public function lihatnilai(){
        $tasks = Task::with('fills')->latest()->get();
        return view('lihatnilai',['tasks'=>$tasks,'user'=>User::all()]);
    }
    public function tambahtugas(){

		$pelajaran= $_POST['pelajaran'];
		$waktu    = $_POST['jam'];
		unset($_POST['pelajaran']);
		unset($_POST['jam']);
		$post = $_POST;
		unset($post['_token']);
		$isi = implode('|', $post);
    	Task::create([
    		'pelajaran'=>$pelajaran,
    		'waktu'=>$waktu,
    		'no_unik'=>$pelajaran."*".$waktu."tes_cbt",
    		'nama'=>auth()->user()->name,
    		'isi'=> htmlspecialchars($isi)
    	]);
    	return redirect('/lihat-tugas');
    }

    public function hapus($id){
    	Task::find($id)->delete();
    	return redirect('lihat-tugas');
    }

    public function edit($id){
        $task = Task::find($id);
        return view('edittugas',['task'=>$task]);
    }
    public function edittugas($id){

        $pelajaran= $_POST['pelajaran'];
        $waktu    = $_POST['jam'];
        unset($_POST['pelajaran']);
        unset($_POST['jam']);
        $post = $_POST;
        unset($post['_token']);
        $isi = implode('|', $post);
        Task::find($id)->update([
            'pelajaran'=>$pelajaran,
            'waktu'=>$waktu,
            'no_unik'=>$pelajaran."*".$waktu."tes_cbt",
            'nama'=>auth()->user()->name,
            'isi'=> $isi
        ]);
        return redirect('/lihat-tugas');
    }
    public function kerjakan($id){
        $soal = Task::find($id);
        return view('isi',['soal'=>$soal]);
    }

}
