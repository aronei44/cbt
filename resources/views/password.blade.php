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
                    <div class="container">
						<div class="container bg-white">
							<br>
							<h1><i class="fas fa-edit"></i> Edit Password</h1>
							<br>
							<form action="" method="post">
								@CSRF
								<div class="form-group">
									<label for="email">Email :</label>
									<input type="email" name="email" id="email" class="form-control" autocomplete="false" required>
								</div>								
								<div class="form-group">
									<label for="password">Password Lama:</label>
									<input type="password" name="password" id="password" class="form-control" autocomplete="false" required>
								</div>
								<div class="form-group">
									<label for="passwordbaru">Password Baru:</label>
									<input type="password" name="passwordbaru" id="passwordbaru" class="form-control"  required>
								</div><br>
								<button class="btn btn-primary" type="submit" name="submit"><i class="fas fa-save"></i> Simpan</button>
							</form>
							<br>
						</div>
                    </div>
                    <!-- End Of Content -->
                    <br><br>
                </div>



        </div>
        
        @include('assets.footer')
    </div>
@endsection