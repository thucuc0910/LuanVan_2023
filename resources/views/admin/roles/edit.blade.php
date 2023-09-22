@extends('admin.BackEnd.layout.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page edit role')
@section('content')
    <div class="pd-20 card-box mb-30">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit Role</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> Back</a>
                </div>
            </div>
        </div>


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {!! Form::model($role, ['method' => 'PATCH', 'route' => ['admin.roles.update', $role->id]]) !!}
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Permission:</strong>
                    <br />
                    @foreach ($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                            {{ $value->name }}</label>
                        <br />
                    @endforeach
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}

        <div class="col-md-4 col-sm-12">
            <div class="form-group">
                <label>Select/deselect all</label>
                <div class="dropdown bootstrap-select show-tick form-control dropup"><select
                        class="selectpicker form-control" data-size="5" data-style="btn-outline-warning" multiple=""
                        data-actions-box="true" data-selected-text-format="count" tabindex="-98">
                        <optgroup label="Condiments">
                            <option>Mustard</option>
                            <option>Ketchup</option>
                            <option>Relish</option>
                        </optgroup>
                        {{-- <optgroup label="Breads">
                        <option>Plain</option>
                        <option>Steamed</option>
                        <option>Toasted</option>
                    </optgroup> --}}
                    </select><button type="button" class="btn dropdown-toggle btn-outline-warning bs-placeholder"
                        data-toggle="dropdown" role="combobox" aria-owns="bs-select-5" aria-haspopup="listbox"
                        aria-expanded="false" title="Nothing selected">
                        <div class="filter-option">
                            <div class="filter-option-inner">
                                <div class="filter-option-inner-inner">Nothing selected</div>
                            </div>
                        </div>
                    </button>
                    <div class="dropdown-menu" style="max-height: 279.8px; overflow: hidden;">
                        <div class="bs-actionsbox">
                            <div class="btn-group btn-group-sm btn-block"><button type="button"
                                    class="actions-btn bs-select-all btn btn-light">Select All</button><button
                                    type="button" class="actions-btn bs-deselect-all btn btn-light">Deselect All</button>
                            </div>
                        </div>
                        <div class="inner show" role="listbox" id="bs-select-5" tabindex="-1" aria-multiselectable="true"
                            style="max-height: 236.8px; overflow-y: auto;">
                            <ul class="dropdown-menu inner show" role="presentation"
                                style="margin-top: 0px; margin-bottom: 0px;">
                                <li class="dropdown-header optgroup-1"><span class="text">Condiments</span></li>
                                <li class="optgroup-1"><a role="option" class="opt dropdown-item" id="bs-select-5-1"
                                        tabindex="0" aria-selected="false" aria-setsize="6" aria-posinset="1"><span
                                            class=" bs-ok-default check-mark"></span><span class="text">Mustard</span></a>
                                </li>
                                <li class="optgroup-1"><a role="option" class="opt dropdown-item" id="bs-select-5-2"
                                        tabindex="0" aria-selected="false" aria-setsize="6" aria-posinset="2"><span
                                            class=" bs-ok-default check-mark"></span><span class="text">Ketchup</span></a>
                                </li>
                                <li class="optgroup-1"><a role="option" class="opt dropdown-item" id="bs-select-5-3"
                                        tabindex="0" aria-selected="false" aria-setsize="6" aria-posinset="3"><span
                                            class=" bs-ok-default check-mark"></span><span class="text">Relish</span></a>
                                </li>
                                <li class="dropdown-divider optgroup-1div"></li>
                                <li class="dropdown-header optgroup-2"><span class="text">Breads</span></li>
                                <li class="optgroup-2"><a role="option" class="opt dropdown-item" id="bs-select-5-6"
                                        tabindex="0" aria-selected="false" aria-setsize="6" aria-posinset="4"><span
                                            class=" bs-ok-default check-mark"></span><span class="text">Plain</span></a>
                                </li>
                                <li class="optgroup-2"><a role="option" class="opt dropdown-item" id="bs-select-5-7"
                                        tabindex="0" aria-selected="false" aria-setsize="6" aria-posinset="5"><span
                                            class=" bs-ok-default check-mark"></span><span
                                            class="text">Steamed</span></a></li>
                                <li class="optgroup-2"><a role="option" class="opt dropdown-item" id="bs-select-5-8"
                                        tabindex="0" aria-selected="false" aria-setsize="6" aria-posinset="6"><span
                                            class=" bs-ok-default check-mark"></span><span
                                            class="text">Toasted</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
