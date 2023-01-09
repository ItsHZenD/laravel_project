@extends('layout.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
                        Create
                    </a>
                        <label for="csv" class="btn btn-secondary" style="margin: 0">
                            Import CSV
                        </label>
                        <input type="file" name="csv" id="csv" class="d-none" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table-data">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Job Title</th>
                                <th>Location</th>
                                <th>Remoteable</th>
                                <th>Remotable</th>
                                <th>Is Part-time</th>
                                <th>Range Salary</th>
                                <th>Date Range</th>
                                <th>Status</th>
                                <th>Is Pinned</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js" integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        $(document).ready(function(){
            $.ajax({
                url: '{{ route('api.posts') }}',
                dataType: 'json',
                data: {param1:'value1'},
            })
            .success(function(response){
                // $("#table-data").
            })
            .error(function(response){

            })
            $("#csv").change(function(event){
                $.ajax({
                    url: '{{ route('admin.posts.import_csv') }}',
                    type: 'POST',
                    dataType: 'json',
                    data: {file: $(this).val()}
                })
                .success(function(response){
                    $.toast({
                        heading: 'Import Success',
                        text: 'Your data have been imported.',
                        showHideTransition: 'slide',
                        position: 'top-right',
                        icon: 'success'
                    })
                })
                .error(function(response){

                });
            });
        });
    </script>
@endpush
