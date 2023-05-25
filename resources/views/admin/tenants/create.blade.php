@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('global.tenants.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.tenants.store']]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('global.app_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('property_id', trans('global.tenants.fields.property').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('property_id', $properties, old('property_id'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('name', trans('global.tenants.fields.name').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('name'))
                        <p class="help-block">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('global.tenants.fields.email').'*', ['class' => 'control-label']) !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('email'))
                        <p class="help-block">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('rented_date', trans('global.tenants.fields.rented_date').'*', ['class' => 'control-label']) !!}
                    {!! Form::date('rented_date', old('rented_date'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('rented_date'))
                        <p class="help-block">
                            {{ $errors->first('rented_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('payment_date', trans('global.tenants.fields.payment_date').'*', ['class' => 'control-label']) !!}
                    {!! Form::date('payment_date', old('payment_date'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('payment_date'))
                        <p class="help-block">
                            {{ $errors->first('payment_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('contract_expiry_date', trans('global.tenants.fields.contract_expiry_date').'*', ['class' => 'control-label']) !!}
                    {!! Form::date('contract_expiry_date', old('contract_expiry_date'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('contract_expiry_date'))
                        <p class="help-block">
                            {{ $errors->first('contract_expiry_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('payment_status', trans('global.tenants.fields.payment_status').'*', ['class' => 'control-label']) !!}
                    {!! Form::select('payment_status', $paymentStatuses, old('payment_status'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('payment_status'))
                        <p class="help-block">
                            {{ $errors->first('payment_status') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('global.app_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

