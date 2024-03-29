@extends('layouts.backend.app')
@push('title')
Social links
@endpush
@push('meta-description')

@endpush
@push('meta-image')

@endpush
@push('style')

@endpush

@section('content')
<!-- Start Breadcrumbbar -->
<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Social link  table</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:0">Social links</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('website.socialLink.create') }}" class="btn btn-primary">Create link</a>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Url</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($social_links as $link)
                                <tr>
                                    <th><a target="_blank" href="{{ $link->url }}" class="btn btn-primary" > Check </a> </th>
                                    <td>
                                       {{ $link->icon }}

                                    </td>
                                    <td>{{ $link->name }}</td>
                                    <td>
                                        @if($link->is_active == true)
                                            <span class="badge badge-success">Active</span>

                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('website.socialLink.edit', $link->id) }}" class="btn btn-info mb-2"><i class="fa fa-pencil"></i> Edit</a>
                                        <a class="btn btn-danger delete-btn"><i class="fa fa-trash"></i> Delete</a>
                                        <form class="delete-form" action="{{ route('website.socialLink.destroy',$link->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>
<!-- End row -->
</div>
<!-- End Contentbar -->
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('.delete-btn').click(function(){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(this).parent().find('.delete-form').submit();
                    }
                })
            });
        });
    </script>
@endpush

