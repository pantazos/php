@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.service.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.services.update", [$service->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.service.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $service->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="key">{{ trans('cruds.service.fields.key') }}</label>
                <input class="form-control {{ $errors->has('key') ? 'is-invalid' : '' }}" type="text" name="key" id="key" value="{{ old('key', $service->key) }}" required>
                @if($errors->has('key'))
                    <span class="text-danger">{{ $errors->first('key') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.key_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.service.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $service->description) }}" required>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="icon">{{ trans('cruds.service.fields.icon') }}</label>
                <input class="form-control {{ $errors->has('icon') ? 'is-invalid' : '' }}" type="text" name="icon" id="icon" value="{{ old('icon', $service->icon) }}" required>
                @if($errors->has('icon'))
                    <span class="text-danger">{{ $errors->first('icon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.icon_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="duration">{{ trans('cruds.service.fields.duration') }}</label>
                <input class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="number" name="duration" id="duration" value="{{ old('duration', $service->duration) }}" step="1" required>
                @if($errors->has('duration'))
                    <span class="text-danger">{{ $errors->first('duration') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="price">{{ trans('cruds.service.fields.price') }}</label>
                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" type="number" name="price" id="price" value="{{ old('price', $service->price) }}" step="0.01" required>
                @if($errors->has('price'))
                    <span class="text-danger">{{ $errors->first('price') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.price_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="category_id">{{ trans('cruds.service.fields.category') }}</label>
                <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id" required>
                    @foreach($categories as $id => $entry)
                        <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $service->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="commission_id">{{ trans('cruds.service.fields.commission') }}</label>
                <select class="form-control select2 {{ $errors->has('commission') ? 'is-invalid' : '' }}" name="commission_id" id="commission_id">
                    @foreach($commissions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('commission_id') ? old('commission_id') : $service->commission->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('commission'))
                    <span class="text-danger">{{ $errors->first('commission') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.service.fields.commission_helper') }}</span>
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
