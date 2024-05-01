@extends('layouts.main.app')
@section('head')
@include('layouts.main.headersection',[
'title'=> __('Data Satuan'),
'buttons'=>[
   [
      'name'=>'<i class="fa fa-print"></i>&nbsp'.__('Cetak'),
      'url'=>route('admin.satuan.print')
],
[
      'name'=>'<i class="fa fa-plus"></i>&nbsp'.__('Tambah'),
      'url'=>route('admin.satuan.create')
   ]
]
])
@endsection
@section('content')
<div class="row justify-content-center">
	<div class="col-12">
		<div class="row d-flex justify-content-between flex-wrap">
			<div class="col">
				<div class="card card-stats">
					<div class="card-body">
						<div class="row">
							<div class="col">
								<span class="h2 font-weight-bold mb-0 total-transfers" id="total-device">
									{{ $totalSatuan }}
								</span>
							</div>
							<div class="col-auto">
								<div class="icon icon-shape bg-gradient-primary text-white rounded-circle shadow">
									<i class="fi fi-rs-notes mt-2"></i>
								</div>
							</div>
						</div>
						<p class="mt-3 mb-0 text-sm">
						</p><h5 class="card-title  text-muted mb-0">{{ __('Total Satuan') }}</h5>
						<p></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col">
		<div class="card">
			<!-- Card header -->
			<div class="card-header border-0">
				<h3 class="mb-0">{{ __('Data Satuan') }}</h3>
			</div>
			<!-- Light table -->
			<div class="table-responsive py-4">
              <table class="table table-flush" id="datatable-basic">
					<thead class="thead-light">
						<tr>
							<th>No</th>
							<th class="col-1 text-left">{{ __('Action') }}</th>
							<th>Nama</th>
							<th>Keterangan</th>
						</tr>
					</thead>
						@foreach ($satuan as $key => $item)
						<tr>
							<td>{{ $key + 1 }}</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a class="dropdown-item" href="{{ route('admin.satuan.edit',$item->id) }}">{{ __('Edit') }}</a>
										<a class="dropdown-item delete-confirm" href="#" data-action="{{ route('admin.satuan.destroy',$item->id) }}">{{ __('Delete') }}</a>
									</div>
								</div>
							</td>
							<td>{{ $item->nama }}</td>
							<td>{{ $item->keterangan }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
				@if(count($satuan) == 0)
				<div class="text-center mt-2">
					<div class="alert  bg-gradient-primary text-white">
						<span class="text-left">{{ __('!Opps no records found') }}</span>
					</div>
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
@endsection
