@extends('layouts.app')

@section('content')

    {{-- <a href="{{route('view-configs.create')}}">Thêm màn hình</a> --}}
    <div class="container mt-5">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add view config
        </button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên màn hình</th>
                    <th scope="col">Mã</th>
                    <th scope="col">Updated at</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($viewConfigs as $index => $view)
                <tr class='clickable-row' data-href='{{route('viewConfig.detail', ['id'=> $view->id])}}'>
                    <th scope="row">{{$view->id}}</th>
                    <td>{{ $view->name }}</td>
                    <td>{{ $view->code }}</td>
                    <td>{{ $view->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @include('pages.viewConfigs.partials.modal-add-view-config')
    </div>

@endsection

@section('append_js')
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
            // $('#exampleModal').on('shown.bs.modal', function () {
            //     $('#exampleModal').trigger('focus');
            //     console.log(123);
            // })
        });

//         var myModal = document.getElementById('addViewConfigModel')
// var myInput = document.getElementById('addViewConfigModel')

// myModal.addEventListener('shown.bs.modal', function () {
//   myInput.focus()
// })
    </script>
@endsection
