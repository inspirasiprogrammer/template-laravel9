@extends('layouts.main.app')
@section('head')
@include('layouts.main.headersection',[
'title'   => __('Pengaturan Penyimpanan'),
'buttons' =>[
	[
		'name'=> __('Back to dashboard'),
		'url'=> url('admin/dashboard'),
	]
]])
@endsection
@section('content')
<div class="row ">
	<div class="col-lg-5 mt-5">
        <strong>{{ __('Pengaturan Folder Penyimpanan') }}</strong>
    </div>
    <div class="col-lg-7 mt-5">
        <form class="ajaxform" action="{{ route('admin.developer-settings.update',$id) }}">
        	@csrf
        	@method('PUT')
        	<div class="card">
            <div class="card-body">
                <div class="from-group row">
                    <label class="col-lg-12">{{ __('Storage Upload Mode') }}</label>
                    <div class="col-lg-12">
                       <select class="form-control" name="FILESYSTEM_DISK" id="disk-method">
                           <option value="public" {{ env('FILESYSTEM_DISK') == 'public' ? 'selected' : '' }}>{{ __('Own server (Uploads folder)') }}</option>
                       </select>
                    </div>
                </div> 
                
                <div class="from-group row mt-3">
                    <div class="col-lg-12">
                       <button class="btn btn-primary submit-button btn-sm float-left">{{ __('Update Settings') }}</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection