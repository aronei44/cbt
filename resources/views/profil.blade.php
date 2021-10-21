@extends('main')
@section('konten')
    <!-- Sidebar -->
    @include('assets.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('assets.nav')
            <div class="container-fluid">
                    <br>
                    <!-- Content Start -->
                    <div class="container text-center">
                        <img src="img/{{auth()->user()->image}}" class="img-thumbnail rounded-circle" width="200" style="margin: auto;">
                        <h1>{{auth()->user()->name}}</h1>
                        
                        @if(auth()->user()->status == 'Guru')
                            <h3>{{ auth()->user()->status }}</h3>
                        @else
                            <h3>{{ auth()->user()->kelas }}</h3>
                        @endif

                    </div>
                    <div class="container bg-white" style="overflow: auto;">
                        <table class="table table-hover">
                            @if(auth()->user()->status != 'Guru')

                            <tr>
	                              <th scope="row">NISN</th>
	                              <td>{{auth()->user()->nisn}}</td>
                            </tr>
                            @endif
                            <tr>
	                              <th scope="row">Jenis Kelamin</th>
	                              <td>{{auth()->user()->jenis_kelamin}}</td>
                            </tr>
                            <tr>
	                              <th scope="row">Agama</th>
	                              <td>{{auth()->user()->agama}}</td>
                            </tr>
                            <tr>
	                              <th scope="row">Email</th>
	                              <td>{{auth()->user()->email}}</td>
                            </tr>
                            <tr>
	                              <th scope="row">No Hp</th>
	                              <td>{{auth()->user()->no_hp}}</td>
                            </tr>
                            <tr>
	                              <th scope="row">Alamat</th>
	                              <td>{{auth()->user()->alamat}}</td>
                            </tr>
                        </table>
                    </div>
                    <!-- End Of Content -->
                    <br><br>
                </div>




        </div>
        
        @include('assets.footer')
    </div>
@endsection