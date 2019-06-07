@extends('layouts.header')
	@section('content')
<div class="page-wrapper">
      <div class="container-fluid">
         <div class="row page-titles">
            <div class="col-md-5 align-self-center">
               <h3 class="text-themecolor">Clients</h3>
            </div>
            <div class="col-md-7 align-self-center">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                  <li class="breadcrumb-item active">Clients</li>
               </ol>
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <div class="table-responsive">
					 	@if(session()->has('message'))
							<div class="alert alert-success">
								{{session()->get('message')}}
							</div>
						@endif
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone</th>
                                 <th>Passport N.</th>
								 <th>Type</th>
                              </tr>
                           </thead>
                           <tfoot>
                              <tr>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone</th> 
                                 <th>Passport N.</th>
								 <th>Type</th>
                              </tr>
                           </tfoot>
                           <tbody>
							@foreach($clients as $client)
                              <tr>
                                 <td><a href="{{route('clients.show', $client->id)}}">{{ $client->firstname }} {{ $client->lastname }}</a></td>
                                 <td>{{ $client->email }}</td>
                                 <td>{{ $client->mobile }}</td>
								 <td>{{ $client->passport_nb }}</td>
                                 <td><span class="label label-warning">{{ $client->type }}</span></td>
                              </tr>
							@endforeach
                           </tbody>
                        </table>
                     </div>
					<a href="{{route('clients.create')}}" class="btn btn-info btn-rounded m-t-10 float-left m-l-20">Add New</a>
                  </div>
               </div>
			   
            </div>
         </div>
      </div>
		<footer class="footer">© 2019 Copyright.</footer>
	  </div>
      <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
      <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('assets/js/perfect-scrollbar.jquery.min.js')}}"></script>
      <script src="{{asset('assets/js/waves.js')}}"></script>
      <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
      <script src="{{asset('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js')}}"></script>
      <script src="{{asset('assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
      <script src="{{asset('assets/js/custom.min.js')}}"></script>
      <script src="{{asset('assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('assets/js/dataTables.buttons.min.js')}}"></script>
      <script src="{{asset('assets/js/buttons.flash.min.js')}}"></script>
      <script src="{{asset('assets/js/jszip.min.js')}}"></script>
      <script src="{{asset('assets/js/pdfmake.min.js')}}"></script>
      <script src="{{asset('assets/js/vfs_fonts.js')}}"></script>
      <script src="{{asset('assets/js/buttons.html5.min.js')}}"></script>
      <script src="{{asset('assets/js/buttons.print.min.js')}}"></script>
      <script>
         $(function() {
         $('#myTable').DataTable();
         $(document).ready(function() {
         var table = $('#example').DataTable({
         "columnDefs": [{
         "visible": false,
         "targets": 2
         }],
         "order": [
         [2, 'asc']
         ],
         "displayLength": 25,
         "drawCallback": function(settings) {
         var api = this.api();
         var rows = api.rows({
         page: 'current'
         }).nodes();
         var last = null;
         api.column(2, {
         page: 'current'
         }).data().each(function(group, i) {
         if (last !== group) {
         $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
         last = group;
         }
         });
         }
         });
         });
         });
         $('#example23').DataTable({
         dom: 'Bfrtip',
		 "displayLength":20,
		 "ordering": false,
         buttons: []
         });
         $().addClass('btn btn-primary mr-1');
      </script>
   </body>
</html>
	@endsection
