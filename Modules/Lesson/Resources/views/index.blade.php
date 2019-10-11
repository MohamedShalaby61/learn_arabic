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
                        <h3 style="font-family: 'Cairo', sans-serif;" class="box-title">{{ 'جدول الدروس الخاص بالدورة '.$course->title }}</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <a href="{{ route('lessons.create',$course->id) }}" class="btn btn-success"><i class="fa fa-plus"></i> @lang('lesson::lesson.add')</a>
                        </div>
                        @include('common::layouts._session')
                        @if($rows->count() > 0)
                            <table  id="table_id" class="table table-bordered table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('lesson::lesson.name')</th>
                                    <th>@lang('course::course.name')</th>
                                    <th>@lang('common::common.operations')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rows as $index=>$row)
                                    <tr>
                                        <td>{{ $index+1 }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->course->title }}</td>
                                        <td>
                                            <form action="{{ route('lessons.destroy',$row->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a href="{{ route('lessons.edit',$row->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                <button type="submit" onclick="return confirm('هل انت متأكد من حذف الدرس')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <h1 style="font-family: 'Cairo', sans-serif;">للاسف لا توجد دروس حتي الان في هذة الدورة</h1>
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

                     { "orderable": false, "targets":3},

                ],
            });
        } );
    </script>

@endpush