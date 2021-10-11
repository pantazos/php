@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.payment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.payments.update", [$payment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.payment.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $payment->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" value="{{ old('amount', $payment->amount) }}" step="0.01" required>
                @if($errors->has('amount'))
                    <span class="text-danger">{{ $errors->first('amount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.payment.fields.method') }}</label>
                <select class="form-control {{ $errors->has('method') ? 'is-invalid' : '' }}" name="method" id="method" required>
                    <option value disabled {{ old('method', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Payment::METHOD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('method', $payment->method) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('method'))
                    <span class="text-danger">{{ $errors->first('method') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.method_helper') }}</span>
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