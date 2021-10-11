@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.booking.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bookings.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="customer_id">{{ trans('cruds.booking.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id" required>
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ old('customer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <span class="text-danger">{{ $errors->first('customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="provider_id">{{ trans('cruds.booking.fields.provider') }}</label>
                <select class="form-control select2 {{ $errors->has('provider') ? 'is-invalid' : '' }}" name="provider_id" id="provider_id">
                    @foreach($providers as $id => $entry)
                        <option value="{{ $id }}" {{ old('provider_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('provider'))
                    <span class="text-danger">{{ $errors->first('provider') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.provider_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="service_id">{{ trans('cruds.booking.fields.service') }}</label>
                <select class="form-control select2 {{ $errors->has('service') ? 'is-invalid' : '' }}" name="service_id" id="service_id" required>
                    @foreach($services as $id => $entry)
                        <option value="{{ $id }}" {{ old('service_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('service'))
                    <span class="text-danger">{{ $errors->first('service') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.service_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="status_id">{{ trans('cruds.booking.fields.status') }}</label>
                <select class="form-control select2 {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status_id" id="status_id" required>
                    @foreach($statuses as $id => $entry)
                        <option value="{{ $id }}" {{ old('status_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="booking_at">{{ trans('cruds.booking.fields.booking_at') }}</label>
                <input class="form-control datetime {{ $errors->has('booking_at') ? 'is-invalid' : '' }}" type="text" name="booking_at" id="booking_at" value="{{ old('booking_at') }}" required>
                @if($errors->has('booking_at'))
                    <span class="text-danger">{{ $errors->first('booking_at') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.booking_at_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.booking.fields.notes') }}</label>
                <input class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" type="text" name="notes" id="notes" value="{{ old('notes', '') }}">
                @if($errors->has('notes'))
                    <span class="text-danger">{{ $errors->first('notes') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="latitude">{{ trans('cruds.booking.fields.latitude') }}</label>
                <input class="form-control {{ $errors->has('latitude') ? 'is-invalid' : '' }}" type="text" name="latitude" id="latitude" value="{{ old('latitude', '') }}" required>
                @if($errors->has('latitude'))
                    <span class="text-danger">{{ $errors->first('latitude') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.latitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="longitude">{{ trans('cruds.booking.fields.longitude') }}</label>
                <input class="form-control {{ $errors->has('longitude') ? 'is-invalid' : '' }}" type="text" name="longitude" id="longitude" value="{{ old('longitude', '') }}" required>
                @if($errors->has('longitude'))
                    <span class="text-danger">{{ $errors->first('longitude') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.longitude_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_name">{{ trans('cruds.booking.fields.address_name') }}</label>
                <input class="form-control {{ $errors->has('address_name') ? 'is-invalid' : '' }}" type="text" name="address_name" id="address_name" value="{{ old('address_name', '') }}" required>
                @if($errors->has('address_name'))
                    <span class="text-danger">{{ $errors->first('address_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.address_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="address_details">{{ trans('cruds.booking.fields.address_details') }}</label>
                <input class="form-control {{ $errors->has('address_details') ? 'is-invalid' : '' }}" type="text" name="address_details" id="address_details" value="{{ old('address_details', '') }}" required>
                @if($errors->has('address_details'))
                    <span class="text-danger">{{ $errors->first('address_details') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.address_details_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tax">{{ trans('cruds.booking.fields.tax') }}</label>
                <input class="form-control {{ $errors->has('tax') ? 'is-invalid' : '' }}" type="text" name="tax" id="tax" value="{{ old('tax', '') }}" required>
                @if($errors->has('tax'))
                    <span class="text-danger">{{ $errors->first('tax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.tax_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total">{{ trans('cruds.booking.fields.total') }}</label>
                <input class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" type="text" name="total" id="total" value="{{ old('total', '') }}" required>
                @if($errors->has('total'))
                    <span class="text-danger">{{ $errors->first('total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.booking.fields.total_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection