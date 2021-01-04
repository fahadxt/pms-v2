

@section('script')
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script   src="{{ asset('js/dashboard.js') }}"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://cdn.datatables.net/plug-ins/1.10.20/sorting/natural.js"></script>
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.jqueryui.min.css" rel="stylesheet">


@endsection

<div>

    <div class="ui center aligned padded grid">

        <div class="doubling three column row mb-10">
            <div class="column">
                <div class="new_card box-shadow">
                    <div class="title-card">
                        <h5>{{__('Projects')}}</h5>
                    </div>

                    <div class="flex">
                        <div class="st-col">
                            <p>{{__('Total')}}</p>
                            <h3 id="total_project" class="primary">{{$projects->count()}}</h3>
                        </div>

                        <div class="st-divider"></div>

                        <div class="st-col ">
                            <p>{{__('Today')}}</p>
                            <h3 id="today_project" class="primary">{{$projects->where('created_at' , '>=' , $dt)->count()}}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="new_card box-shadow">
                    <div class="title-card">
                        <h5>{{__('Tasks')}}</h5>
                    </div>

                    <div class="flex">
                        <div class="st-col ">
                            <p>{{__('Total')}}</p>
                            <h3 id="total_tasks" class="primary">{{$tasks->count()}}</h3>
                        </div>

                        <div class="st-divider"></div>

                        <div class="st-col ">
                            <p>{{__('Today')}}</p>
                            <h3 id="today_tasks" class="primary">{{$tasks->where('due_on' , '=' , $dt)->count()}}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="new_card box-shadow">
                    <div class="title-card">
                        <h5>{{__('Tasks completed')}}</h5>
                    </div>

                    <div class="flex">
                        <div class="st-col ">
                            <p>{{__('Total')}}</p>
                            <h3 id="total_users" class="primary">{{$tasks->where('status_id' , 4)->count()}}</h3>
                        </div>

                        <div class="st-divider"></div>

                        <div class="st-col ">
                            <p>{{__('Today')}}</p>
                            <h3 id="today_users" class="primary">{{$tasks->where('due_on' , '=' , $dt)->where('status_id' , 4)->count()}}</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="doubling two column row">
            <div class="eleven wide column">
                <div class="new_card box-shadow">
                    <div class="title-card">
                        <h5>{{__('Tasks')}}</h5>
                    </div>
                    <div id="tasks"></div>
                </div>
            </div>
            <div class="five wide column">
                <div class="new_card box-shadow">
                    <div class="title-card">
                        <h5>{{__('Top 5 users')}}</h5>
                    </div>
                    <table id="top_5_users" class="table data-table">
                        <thead class="thead-light pointer_fix">
                          <tr>
                            <th class="">المستخدم</th>
                            <th class="">مجموع المهام المنجزة</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>