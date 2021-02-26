@extends('layouts.master')


@push('css')
    <link rel="stylesheet" type="text/css" href="{{ assetFile('plugins/bootstrap-select/bootstrap-select.min.css') }}">
@endpush

@push('js')
    <script src="{{ assetFile('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
@endpush

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>{{ __('Edit') }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        <form action="{{ route('recipe.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-row mb-4">
                                <div class="form-group col-md-6">
                                    <label for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" value="{{ $data->name }}" class="form-control" required id="name" placeholder="{{ __('Name') }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Description">{{ __('Description') }}</label>
                                    <input type="text" name="description" value="{{ $data->description }}" class="form-control" required id="Description" placeholder="{{ __('Description') }}">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">{{ __('Submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
