@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.properties.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('global.properties.fields.name')</th>
                            <td field-key='name'>{{ $property->name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.properties.fields.address')</th>
                            <td field-key='address'>{{ $property->address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.properties.fields.photo')</th>
                            <td field-key='photo'>@if($property->photo)<a href="{{ asset(env('UPLOAD_PATH').'/' . $property->photo) }}" target="_blank"><img src="{{ asset(env('UPLOAD_PATH').'/thumb/' . $property->photo) }}"/></a>@endif</td>
                        </tr>
                        {{-- <tr>
                            <th>@lang('global.properties.fields.quantity')</th>
                            <td field-key='quantity'>{{ $property->quantity }}</td>
                        </tr> --}}
                        <tr>
                            <th>@lang('global.properties.fields.maintenance_history')</th>
                            <td field-key='maintenance_history'>{{ $property->maintenance_history }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.properties.fields.construction_date')</th>
                            <td field-key='construction_date'>{{ $property->construction_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.properties.fields.rent_cost')</th>
                            <td field-key='rent_cost'>{{ number_format($property->rent_cost, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tenants.fields.rented_date')</th>
                            <td field-key='rent_cost'>{{ $property->rented_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tenants.fields.payment_date')</th>
                            <td field-key='rent_cost'>{{ $property->payment_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tenants.fields.payment_status')</th>
                            <td field-key='rent_cost'>{{ $property->payment_status }}</td>
                        </tr>
                        <tr>
                            <th>@lang('global.tenants.fields.contract_expiry_date')</th>
                            <td field-key='rent_cost'>{{ $property->contract_expiry_date }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#documents" aria-controls="documents" role="tab" data-toggle="tab">Documents</a></li>
<li role="presentation" class=""><a href="#notes" aria-controls="notes" role="tab" data-toggle="tab">Notes</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="documents">
<table class="table table-bordered table-striped {{ count($documents) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.documents.fields.property')</th>
                        <th>@lang('global.documents.fields.user')</th>
                        <th>@lang('global.documents.fields.document')</th>
                        <th>@lang('global.documents.fields.name')</th>
                        
        </tr>
    </thead>

    <tbody>
        @if (count($documents) > 0)
            @foreach ($documents as $document)
                <tr data-entry-id="{{ $document->id }}">
                    <td field-key='property'>{{ $document->property->name or '' }}</td>
                                <td field-key='user'>{{ $document->user->name or '' }}</td>
                                <td field-key='document'>@if($document->document)<a href="{{ asset(env('UPLOAD_PATH').'/' . $document->document) }}" target="_blank">Download file</a>@endif</td>
                                <td field-key='name'>{{ $document->name }}</td>        
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="9">@lang('global.app_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
<div role="tabpanel" class="tab-pane " id="notes">
<table class="table table-bordered table-striped {{ count($notes) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('global.notes.fields.property')</th>
                        <th>@lang('global.notes.fields.user')</th>
                        <th>@lang('global.notes.fields.note-text')</th>
        
        </tr>
    </thead>

    <tbody>
        @if (count($notes) > 0)
            @foreach ($notes as $note)
                <tr data-entry-id="{{ $note->id }}">
                    <td field-key='property'>{{ $note->property->name or '' }}</td>
                                <td field-key='user'>{{ $note->user->name or '' }}</td>
                                <td field-key='note_text'>{!! $note->note_text !!}</td>
                                
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

            <p>&nbsp;</p>

            <a href="{{ route('admin.properties.index') }}" class="btn btn-default">@lang('global.app_back_to_list')</a>
        </div>
    </div>
@stop
