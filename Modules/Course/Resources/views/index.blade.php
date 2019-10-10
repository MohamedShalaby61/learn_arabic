@extends('common::layouts.master')

@section('content')
    

    <section class="content-header">
        <h1>
            @lang('common::common.home')
            <small>@lang('common::common.control')</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('admin_home') }}"><i class="fa fa-dashboard"></i> @lang('common::common.home')</a></li>
            <li>@lang('course::course.courses')</li>
        </ol>
    </section>

	<section class="content">

        <div class="row">
            <div style="min-height: 800px;" class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 style="font-family: 'Cairo', sans-serif;" class="box-title">{{ 'جدول العروض' }}</h3>
                    </div>


                    <div class="box-body">
                        @include('common::layouts._session')
                        @if($rows->count() > 0)
                            <table  id="table_id" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('course::course.name')</th>
                                    <th>@lang('course::course.description')</th>
                                    <th>@lang('course::course.related_lessons')</th>
                                    <th>@lang('common::common.operations')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rows as $index=>$row)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $row->title }}</td>
                                        <td>{{ str_limit($row->description,100) }}</td>
                                        <td><a>dsadsdasdsa</a></td>
                                        <td>
                                            <form action="{{ route('admins.destroy',$row->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                @if(auth()->user()->role_id == 5 )
                                                    <a href="####" class="btn btn-success disabled btn-sm"><i class="fa fa-edit"></i></a>
                                                @else
                                                    <a href="{{ route('admins.edit',$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                @endif

                                                    <button type="submit" onclick="return confirm('هل انت متأكد من حذف المطبعة')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h1 style="font-family: 'Cairo', sans-serif;">للاسف لا توجد عروض حتي الان</h1>
                        @endif
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
        </div>
    </section>

@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/w/bs/jq-3.3.1/dt-1.10.18/af-2.3.3/b-1.5.6/b-colvis-1.5.6/b-flash-1.5.6/b-html5-1.5.6/b-print-1.5.6/datatables.min.css"/>

@endpush

@push('js')
    <script type="text/javascript" src="https://cdn.datatables.net/w/bs/jq-3.3.1/dt-1.10.18/datatables.min.js"></script>

    <script type="text/javascript">

        $(document).ready( function () {
            $('#table_id').DataTable({
                "columnDefs": [

                    { "orderable": false, "targets": 3 },

                ],
            });
        } );
    </script>

@endpush