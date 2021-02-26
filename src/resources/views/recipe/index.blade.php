@extends('layouts.master')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ assetFile('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ assetFile('plugins/table/datatable/dt-global_style.css') }}">
@endpush

@push('js')
    <script src="{{ assetFile('plugins/table/datatable/datatables.js') }}"></script>
@endpush

@push('script')
    <script>
        $(document).ready(function () {
            $('#alter_pagination').DataTable({
                "paging": false
            });
        });
    </script>
@endpush

@section('content')
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <a class="btn btn-primary btn-rounded mb-2"
                           href="{{ route('recipe.create') }}">{{ __('Create') }}</a>
                        <table id="alter_pagination" class="table table-hover" style="width:100%">
                            <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th class="text-center">{{ __('actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $recipe)
                                <tr>
                                    <td>{{ $recipe->name }}</td>
                                    <td>{{ $recipe->description }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('recipe.edit', $recipe->id) }}"
                                           class="bs-tooltip" data-toggle="tooltip"
                                           data-placement="top" title=""
                                           data-original-title="{{ __('Edit') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-edit">
                                                <path
                                                    d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path
                                                    d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                        </a>
                                        <a href="javascript:void(0);" data-id="{{ $recipe->id }}"
                                           class="bs-tooltip ask-delete" data-toggle="tooltip"
                                           data-placement="top" title="" data-original-title="{{ __('Delete') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                 stroke-linecap="round" stroke-linejoin="round"
                                                 class="feather feather-x-octagon table-cancel">
                                                <polygon
                                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                                <line x1="9" y1="9" x2="15" y2="15"></line>
                                            </svg>
                                        </a>
                                        <form id="destroy-form-{{ $recipe->id }}"
                                              action="{{ route('recipe.destroy', $recipe->id) }}"
                                              method="POST" style="display: none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
