@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.tenants.title')</h3>
    @can('property_create')
    <p>
        <a href="{{ route('admin.tenants.create') }}" class="btn btn-success">@lang('global.app_add_new')</a>
        
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($tenants) > 0 ? 'datatable' : '' }}">
                <thead>
                    <tr>
                        <th>@lang('global.tenants.fields.name')</th>
                        {{-- <th>@lang('global.tenants.fields.email')</th> --}}
                        <th>@lang('global.properties.title')</th>
                        <th>@lang('global.properties.fields.rent_cost')</th>
                        <th>@lang('global.tenants.fields.rented_date')</th>
                        <th>@lang('global.tenants.fields.payment_date')</th>
                        <th>@lang('global.tenants.fields.payment_status')</th>
                        <th>@lang('global.tenants.fields.contract_expiry_date')</th>
                        <th class="action-tick">Action</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($tenants) > 0)
                        @foreach ($tenants as $tenant)
                        {{-- @dd($tenant) --}}
                            <tr data-entry-id="{{ $tenant->id }}">
                                <td field-key='name'>{{ $tenant->name }}</td>
                                {{-- <td field-key='email'>{{ $tenant->email }}</td> --}}
                                <td field-key='name_property'>{{$name = $tenant->property->name}}</td>
                                <td field-key='rent_cost'>
                                    {{ number_format($rent_cost = $tenant->property->rent_cost, 0, ',', '.') }} $</td>
                                <td field-key='rented_date'>{{$rented_date = $tenant->property->rented_date}}</td>
                                <td field-key='payment_date'>{{$payment_date = $tenant->property->payment_date}}</td>
                                <td field-key='payment_status' ><a href="/admin/tenants/update2/{{$tenant->id}}" class='payment-status-toggle'>{{$payment_status = $tenant->property->payment_status}}</a> </td>
                                
                                <td field-key='contract_expiry_date'>{{$contract_expiry_date = $tenant->property->contract_expiry_date}}</td>
                                <td>
                                    {{-- @can('role_view')
                                    <a href="{{ route('admin.tenants.show',[$tenant->id]) }}" class="btn btn-xs btn-primary">@lang('global.app_view')</a>
                                    @endcan --}}
                                    @can('property_edit')
                                    <a href="{{ route('admin.tenants.edit',[$tenant->id]) }}" class="btn btn-xs btn-info">@lang('global.app_edit')</a>
                                    @endcan
                                    @can('property_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("global.app_are_you_sure")."');",
                                        'route' => ['admin.tenants.destroy', $tenant->id])) !!}
                                    {!! Form::submit(trans('global.app_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('global.app_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    

@stop

