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
                    <input type="file" name="csv" id="csv" class="d-none"
                        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                    <nav class="float-right">
                        <ul class="pagination pagination-rounded mb-0" id="pagination">

                        </ul>
                    </nav>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table-data">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Job Title</th>
                                <th>Location</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
        integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css"
        integrity="sha512-wJgJNTBBkLit7ymC6vvzM1EcSWeM9mmOu+1USHaRBbHkm6W9EgM0HY27+UtUaprntaYQJF75rc8gjxllKs5OIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script>
        $(document).ready(function() {
            // crawl data
            $.ajax({
                url: '{{ route('api.posts') }}',
                dataType: 'json',
                // data: {param1:'value1'},
                data: {page: {{ request()->get('page') ?? 1 }} },
                success: function(response) {
                    response.data.data.forEach(function(each) {
                        let location = each.district + ' - ' + each.city;
                        let remotable = each.remotable ? 'x' : '';
                        let is_partime = each.is_partime ? 'x' : '';
                        let range_salary = (each.min_salary && each.max_salary) ?
                            each.min_salary + ' - ' + each.max_salary : '';
                        let range_date = (each.start_date && each.end_date) ?
                            each.start_date + ' - ' + each.end_date : '';
                        let is_pinned = each.is_pinned ? 'x' : '';
                        let created_at = convertDateToDateTime(each.created_at);
                        $('#table-data').append($('<tr>')
                            .append($('<td>').append(each.id))
                            .append($('<td>').append(each.job_title))
                            .append($('<td>').append(location))
                            .append($('<td>').append(remotable))
                            .append($('<td>').append(is_partime))
                            .append($('<td>').append(range_salary))
                            .append($('<td>').append(range_date))
                            .append($('<td>').append(each.status))
                            .append($('<td>').append(is_pinned))
                            .append($('<td>').append(created_at))
                        );
                    });
                    renderPagination(response.data.pagination);
                },
                error: function(response) {
                    console.log(response.responseJSON);
                    $.toast({
                            heading: 'Import Error',
                            text: response.responseJSON.message,
                            showHideTransition: 'slide',
                            position: 'top-right',
                            icon: 'error'
                        })
                }
            });
            $(document).on('click', '#pagination > li > a', function (event) {
                event.preventDefault();
                let page = $(this).text();
                let urlParams = new URLSearchParams(window.location.search);
                urlParams.set('page', page);
                window.location.search = urlParams;
            });

            $("#csv").change(function(event) {
                var formData = new FormData();
                formData.append('file', $(this)[0].files[0]);
                $.ajax({
                    url: '{{ route('admin.posts.import_csv') }}',
                    type: 'POST',
                    dataType: 'json',
                    enctype: 'multipart/form-data',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $.toast({
                            heading: 'Import Success',
                            text: 'Your data have been imported.',
                            showHideTransition: 'slide',
                            position: 'top-right',
                            icon: 'success'
                        })
                    },
                    error: function(response) {

                    }
                });
            });
        });
    </script>
@endpush
