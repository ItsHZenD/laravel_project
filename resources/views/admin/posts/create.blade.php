@extends('layout.master')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label>Company</label>
                            <select class="form-control" name="company" id='select-company'></select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#select-company').select2({
                tags: true,
                ajax: {
                    delay: 250,
                    url: '{{ route('api.companies') }}',
                    data: function(params) {
                        var queryParameters = {
                            q: params.term
                        };

                        return queryParameters;
                    },
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                }
            });
        });
    </script>
@endpush
