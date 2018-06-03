@extends('admin.layouts.index')
@include('admin.layouts.tables')
@section('content')
    <style>
        #bb {
            width: 9em
        }

        #bb:hover span {
            display: none
        }

        #bb:hover:before {
            content: "Login First "
        }

        @media screen and (max-width: 992px) {
            table {
                display: block;
            }

            table > *, table tr, table td, table th {
                display: block;
            }

            table thead {
                display: none;
            }

            table tbody tr {
                height: auto;
                padding: 37px 0;
            }

            table tbody tr td {
                padding-left: 40% !important;
                margin-bottom: 24px;
            }

            table tbody tr td:last-child {
                margin-bottom: 0;

            }

            table tbody tr td:before {
                font-family: OpenSans-Regular;
                font-size: 14px;
                color: #999999;
                line-height: 1.2;
                font-weight: unset;
                position: absolute;
                width: 40%;
                left: 30px;
                top: 0;
            }

            table tbody tr td:nth-child(1):before {
                content: "Name";
            }

            table tbody tr td:nth-child(2):before {
                content: "Phone";
            }

            table tbody tr td:nth-child(3):before {
                content: "Email";
            }

            table tbody tr td:nth-child(4):before {
                content: "Hire_date";
            }

            table tbody tr td:nth-child(5):before {
                content: "Salary";
            }

            table tbody tr td:nth-child(6):before {
                content: "Commission";
            }

            table tbody tr td:nth-child(7):before {
                content: "Manager";
            }

            table tbody tr td:nth-child(8):before {
                content: "Department";
            }

            table tbody tr td:nth-child(9):before {
                content: "Job";
            }


            .column4,
            .column5,
            .column6 {
                text-align: left;
            }

            .column1,
            .column2,
            .column3,
            .column4,
            .column5,
            .column6,
            .column7 {
                width: 100%;
            }

            tbody tr {
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .container-table100 {
                padding-left: 15px;
                padding-right: 15px;
            }
        }

    </style>
    <div style="overflow-x: auto" ;>
        <div class="limiter">
            <div class="container-table100">
                {{--<h1> <span style="color: white"><span style="color: gainsboro" > <b> {{ $users->count() }} </b> </span> Of--}}
                {{--<span style="color: gainsboro" > <b> {{ $users->total() }} </b> </span> Books</span></h1>--}}
                <div class="wrap-table100">
                    <div class="table100">
                        @if(count($users))
                            <table>
                                <thead>
                                <tr class="table100-head">
                                    <th class="column1">{{ __('lang.name') }}</th>
                                    {{--<th class="column2">{{ __('lang.last_name') }}</th>--}}
                                    <th class="column2">{{ __('lang.phone') }}</th>
                                    <th class="column3">{{ __('lang.email') }}</th>
                                    <th class="column4">{{ __('lang.hire_date') }}</th>
                                    <th class="column5">{{ __('lang.salary') }}</th>
                                    <th class="column6">{{ __('lang.commission') }}</th>
                                    <th class="column7">{{ __('lang.manager') }}</th>
                                    <th class="column8">{{ __('lang.department') }}</th>
                                    <th class="column9">{{ __('lang.job') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr>
                                        <td class="column1">
                                            @if(isset($user->fname))
                                                @if(isset($user->lname))
                                                    <span style="color:#33cc33">{{ $user->fname }} {{ $user->lname }} </span>
                                                @endif
                                            @else

                                                <span style="color:#ff0000">Unknown </span>

                                            @endif
                                        </td>


                                        <td class="column2">{!! $user->phone !!}</td>


                                        <td class="column3">{!! $user->email !!}</td>

                                        <td class="column4">{!! \Carbon\Carbon::parse($user->hire_date)->format('d-m-Y') !!}</td>


                                        <td class="column5">{{ $user->salary }}</td>


                                        <td class="column6">{{ $user->commission_pct }}</td>
                                        {{--@if(isset($user->department->manager->fname))--}}

                                            {{--<td class="column7">{{ $user->department->manager->fname }}</td>--}}
                                        {{--@else--}}
                                            {{--<td class="column7"> - </td>--}}
                                        {{--@endif--}}

                                        @if(isset($user->manager->fname))
                                            <td class="column7">{{ $user->manager->fname }}</td>
                                        @else
                                            <td class="column7"> - </td>
                                        @endif

                                        <td class="column8">{{ $user->department->name }}</td>
                                        <td class="column9">{{ $user->Job->title }}</td>


                                        {{--<td class="column7">--}}
                                        {{--@if($user->status == 'unavailable')--}}
                                        {{--<button disabled class='btn btn-default btn-xs'><i--}}
                                        {{--class="glyphicon glyphicon-shopping-cart"></i></button>--}}
                                        {{--@elseif($user->status == 'available')--}}
                                        {{--@if(Auth::user())--}}
                                        {{--<a href="/user/{{ Auth::user()->id }}/{{$user->id}}/borrowBook"--}}
                                        {{--class='btn btn-success btn-xs'>Borrow Book <i--}}
                                        {{--class="glyphicon glyphicon-shopping-cart"></i></a>--}}
                                        {{--@else--}}
                                        {{--<button id="bb" data-toggle="modal" title="You Need To Login First"--}}
                                        {{--href="javascript:void(0)"--}}
                                        {{--class='btn btn-success btn-xs' onclick="openLoginModal();">--}}
                                        {{--<span>Borrow Book </span><i--}}
                                        {{--class="glyphicon glyphicon-shopping-cart"></i></button>--}}

                                        {{--@endif--}}

                                        {{--@endif--}}
                                        {{--</td>--}}
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>

                            <span style="text-align: center"> {{ $users->links() }} </span>
                        @else
                            <div style="text-align:center;">
                                <img style="width: 80%;" src="{{ asset('no.svg') }}" alt="No Books Published Yet!">
                                <h1 style="color: white">Whoops, No Books Found!</h1>
                                <h2 style="color: gainsboro">Please Check Out Agin Soon! <h1><a style="color: #c850c0"
                                                                                                href="/"><b>Here</b>
                                        </a></h1></h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection