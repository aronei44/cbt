<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fill;
use App\Models\Task;

class FillController extends Controller
{
    public function lihat(){
    	return Task::all();
    }
    public function tambah($id){
    	unset($_POST['_token']);
    	$jawab = implode(',', $_POST);
    	$jawaban = explode(',', $jawab);



    	$tugas = Task::find($id);
    	$tugas = explode('|', $tugas->isi);
    	$jumlah = count($tugas);
    	unset($tugas[$jumlah-1]);
    	$jumlah = count($tugas);
    	$j = 0;
    	$i = 0;
    	foreach ($tugas as $task) {
    		$isi = explode(';', $task);
    		if($isi[2]==$jawaban[$i]){
    			$j++;
    		}
    		$i++;
    	}
    	$nilai = $j/$jumlah*100;


    	Fill::create([
    		'user_id'=>auth()->user()->id,
    		'task_id'=>$id,
    		'jawaban'=>$jawab,
    		'nilai'=>$nilai
    	]);
    	return redirect('tugas');
    }
}
