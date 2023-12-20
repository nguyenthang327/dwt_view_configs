@extends('layouts.app')

@section('content')

    {{-- <a href="{{route('view-configs.create')}}">Thêm màn hình</a> --}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-12 d-flex">
                <h1>{{$viewConfig->name}} - {{$viewConfig->code}}</h1>
                <button type="button" class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#addViewConfigAtt">
                    Add attribute
                </button>
            </div>
        </div>
        <div class="row  mt-2">
            <div class="col-12">
                <h5>Danh sách thuộc tính</h5>
            </div>
            @foreach($viewConfig->viewConfigAttributes as $item)
            <div class="col-2">
                {{$item->name}} - {{$item->code}}
            </div>
            @endforeach
        </div>

        <div class="row  mt-3">
            <div class="col-12">
                <h5>Phòng ban</h5>
            </div>

            <div class="col-12">
                @include('pages.viewConfigs.partials.table-department')
            </div>
            
        </div>
    </div>

    @include('pages.viewConfigs.partials.modal-add-view-config-attribute')

@endsection

@section('append_js')

@endsection
