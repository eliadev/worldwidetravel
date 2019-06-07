@extends('layouts.header')
	@section('content')
<div class="page-wrapper">
      <div class="container-fluid">
         <div class="row page-titles">
            <div class="col-md-5 align-self-center">
               <h3 class="text-themecolor">Packages</h3>
            </div>
            <div class="col-md-7 align-self-center">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                  <li class="breadcrumb-item active">Packages</li>
               </ol>
            </div>
         </div>
		@if(session()->has('message'))
			<div class="alert alert-success">
				{{session()->get('message')}}
			</div>
		@endif
		@if($errors->all())
			<div class="alert alert-danger">
				<ul>
				@foreach($errors->all() as $error)
					<li>{{$error}}</li>			
				@endforeach
				</ul> 
			</div>
		@endif
         <div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header bg-info">
						<h4 class="m-b-0 text-white"><i class="mdi mdi-grease-pencil"></i> Edit Content</h4>
					</div>
					<div class="card-body">
						<form action="{{route('packages.update', $package->id)}}" method="POST">
							@method('put')
							@csrf
							<div class="form-body">
								<h3 class="card-title">Personal Info</h3>
								<hr>
								<div class="row p-t-20">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Client</label>
											<select class="form-control" name="client_id">
													<option disabled selected hidden>-- Select Client --</option>
												@foreach($clients as $client)
													<option value="{{ $client->id }}"
													@if($client->id == $package->client_id)
													selected
													@endif
													>{{ $client->firstname }} {{ $client->lastname }}</option>
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<label class="control-label">Package Name</label>
										<input type="text" name="name" value="{{ $package->name }}" class="form-control">
									</div>
								</div>
								

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">From</label>
											<input type="date" name="from" value="{{ $package->from }}" class="form-control">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">To</label>
											<input type="date" name="to" value="{{ $package->to }}" class="form-control">
										</div>
									</div>
								</div>
								
							</div>
							<div class="form-actions">
								<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
								<a href="{{route('packages.index')}}" class="btn btn-inverse">Cancel</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
      </div>
		<footer class="footer">© 2019 Copyright.</footer>
	</div>
	<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/popper/popper.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/waves.js')}}"></script>
    <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
    <script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.min.js')}}"></script>
	<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
	<script src="{{asset('assets/plugins/summernote/form-summernote.init.js')}}"></script>
   </body>
</html>
@endsection