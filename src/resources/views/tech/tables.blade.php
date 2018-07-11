{{--<a href="https://wm-dev.atlassian.net/wiki/spaces/LAR/pages/3019850?preview=/3019850/6291469/tables.jpg">See screen</a>--}}

<div class="box">
    <div class="box-header">
        <div class="row">
            <div class="col-lg-8">
                <h3 class="box-title">Entry</h3>
            </div>
            <div class="col-lg-4">
                <div class="col-lg-4">
                    <div class="btn-group ">
                        <button type="button" class="btn bg-teal color-palette">Сохранить</button>
                        <button type="button" class="btn bg-teal color-palette  dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="margin">
                        <a href="#" class="text-light-blue margin-r-5" data-original-title="" title="">
                            <i class="fa fa-sort margin-r-5" data-original-title="" title=""></i>
                            Изменить поля
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="margin">
                        <a href="#" class="text-green">
                            <i class="fa fa-plus margin-r-5"></i>
                            Create
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <a href="#" class="js_showHideBtn">Filter <i class="fa fa-angle-right js_arrow"></i></a>
    </div>
    <div class="row js_showHideBlk">
        <div class="col-lg-2 pull-right">
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool js_showHideBtn" ><i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group margin">
                <label>Date range:</label>
                <div class="input-group">
                    <div class="input-group-addon datepicker">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right js_date_range_picker" id="reservation">
                </div>
                <!-- /.input group -->
            </div>
        </div>

        <div class="col-lg-1">
            <h5><b>Status</b></h5>
            <div class="form-group margin">
                <div>
                    <label>
                        <input type="checkbox" class="minimal" >
                        Status
                    </label>
                </div>

                <div>
                    <label>
                        <input type="checkbox" class="minimal" >
                        Status
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" class="minimal" >
                        Status
                    </label>
                </div>
                <div>
                    <label>
                        <input type="checkbox" class="minimal" >
                        Status
                    </label>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group margin ">
                <label>Multiple</label>
                <select class="form-control select2 select2-hidden-accessible js-select2" multiple data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
                    <option>Alabama</option>
                    <option>Alaska</option>
                    <option>California</option>
                    <option>Delaware</option>
                    <option>Tennessee</option>
                    <option>Texas</option>
                    <option>Washington</option>
                </select>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="form-group margin">
                <label for="name1">Имя</label>
                <input type="text" class="form-control" id="name1" >
            </div>
        </div>
        <div class="col-lg-2 ">
            <div class="margin" style="padding-top: 17px;">
                <button type="button" class="btn btn-flat bg-light-blue color-palette " data-original-title="" title="">Фильтровать</button>
            </div>
        </div>
    </div>
    <div class="box-body no-padding">
        <table class="js_data_table table table-bordered table-striped"
               data-searching="searching"
               role="grid"
               data-page-length='10'
               aria-describedby="example2_info"
               data-sInfo="test">
            <thead>
            <tr>
                <th>
                    <label>
                        <label>
                            <input type="checkbox" name="tableStatus" class="minimal js_selectAllRows" >
                        </label>
                        Все
                    </label>
                </th>
                <th><b></b></th>
                <th><b>ID</b></th>
                <th><b>Date</b> <i class="fa fa-angle-up"></i></th>
                <th><b>Type</b> <i class="fa fa-angle-up"></i></th>
                <th><b>Status</b> <i class="fa fa-angle-up"></i></th>
                <th><b>Status</b></th>
                <th><b></b></th>
                <th><b></b></th>
                <th><b></b></th>
            </tr>
            </thead>
            <tbody>
            <tr class="js_deleteRow">
                <td>
                    <label>
                        <input type="checkbox" name="tableStatus" class="minimal js_selectRow" >
                    </label>
                </td>
                <td>
                    <a href="#" class="link-black"><i class="fa fa-sort"></i></a>
                </td>
                <td>1</td>
                <td>12-04-17</td>
                <td>
                    <a href="#" class="link text-blue ">Link</a>
                </td>
                <td><span class="label label-success">Approved</span></td>
                <td>
                    <input type="checkbox" class="js-switch" checked  data-size="small" data-color="red"/>
                </td>
                <td>
                    <a href="#" class="link-black margin-r-5"><i class="fa fa-file text-green"></i></a>
                    <a href="#" class="link-black margin-r-5"><i class="fa fa-pencil text-blue"></i></a>
                    <a href="#" class="link-black"><i class="fa fa-close text-red"></i></a>
                </td>
                <td>
                    <a href="#" class="text-light-blue">
                        <i class="fa fa-pencil margin-r-5"></i>
                        Edit
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red js_deleteRowBtn">
                        <i class="fa fa-close margin-r-5"></i>
                        Delete
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox"  name="tableStatus" class="minimal js_selectRow" >
                    </label>
                </td>
                <td>
                    <a href="#" class="link-black"><i class="fa fa-sort"></i></a>
                </td>
                <td>1</td>
                <td>12-04-17 <a href="#"><i class="fa fa-pencil text-blue"></i></a></td>
                <td>
                    <a href="#" class="link text-blue ">Link <a href="#"><i class="fa fa-pencil text-blue"></i></a></a>
                </td>
                <td>
                    <span class="label label-warning">Pending</span> <a href="#"><i class="fa fa-pencil text-blue"></i></a>
                </td>
                <td>
                    <input type="checkbox" class="js-switch" checked  data-size="small" data-color="red"/>
                </td>
                <td>
                    <span class="text-red">Заполните обязательные* поля</span>
                </td>
                <td>
                    <a href="#" class="text-green">
                        <i class="fa fa-check margin-r-5"></i>
                        Done
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red">
                        <i class="fa fa-close margin-r-5"></i>
                        Delete
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="tableStatus" class="minimal js_selectRow" >
                    </label>
                </td>
                <td>
                    <a href="#" class="link-black"><i class="fa fa-sort"></i></a>
                </td>
                <td>1</td>
                <td>12-04-17</td>
                <td>
                    <a href="#" class="link text-blue ">Link</a>
                </td>
                <td>
                    <span class="label label-primary">Approved</span>
                </td>
                <td>
                    <input type="checkbox" class="js-switch" checked  data-size="small" data-color="red"/>
                </td>
                <td>
                    <a href="#" class="text-purple">
                        <i class="fa fa-eye margin-r-5"></i>
                        View
                    </a>
                </td>
                <td>
                    <a href="#" class="text-light-blue">
                        <i class="fa fa-pencil margin-r-5"></i>
                        Edit
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red">
                        <i class="fa fa-close margin-r-5"></i>
                        Delete
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="tableStatus" class="minimal js_selectRow" >
                    </label>
                </td>
                <td>
                    <a href="#" class="link-black"><i class="fa fa-sort"></i></a>
                </td>
                <td>1</td>
                <td>12-04-17</td>
                <td>
                    <a href="#" class="link text-blue ">Link</a>
                </td>
                <td>
                    <span class="label label-danger">Denied</span>
                </td>
                <td>
                    <input type="checkbox" class="js-switch" checked  data-size="small" data-color="red"/>
                </td>
                <td>
                    <a href="#" class="text-purple">
                        <i class="fa fa-eye margin-r-5"></i>
                        View
                    </a>
                </td>
                <td>
                    <a href="#" class="text-light-blue">
                        <i class="fa fa-pencil margin-r-5"></i>
                        Edit
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red">
                        <i class="fa fa-close margin-r-5"></i>
                        Delete
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="tableStatus" class="minimal" >
                    </label>
                </td>
                <td>
                    <a href="#" class="text-light-blue" data-original-title="" title="">
                        <i class="fa fa-plus margin-r-5" data-original-title="" title=""></i>
                        Date
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red" data-original-title="" title="">
                        Edit
                    </a>
                </td>
                <td>
                    <a href="#" class="text-light-blue margin-r-5" data-original-title="" title="">
                        <i class="fa fa-plus" data-original-title="" title=""></i>
                        Name
                        <i class="fa fa-stop text-green js-color-pick" data-original-title="" title=""></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="link text-blue ">Link</a>
                </td>
                <td>
                    <a href="#" class="text-light-blue" data-original-title="" title="">
                        <i class="fa fa-plus margin-r-5" data-original-title="" title=""></i>
                        Value*
                    </a>
                </td>
                <td>
                    <input type="text" placeholder="Link">
                </td>
                <td>
                    <span class="text-red" data-original-title="" title="">Неверно введено поле type</span>
                </td>
                <td>
                    <a href="#" class="text-light-blue" data-original-title="" title="">
                        <i class="fa fa-check margin-r-5" data-original-title="" title=""></i>
                        Accept
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red" data-original-title="" title="">
                        <i class="fa fa-close margin-r-5" data-original-title="" title=""></i>
                        Decline
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="tableStatus" class="minimal" >
                    </label>
                </td>
                <td>
                    <a href="#" class="link-black"><i class="fa fa-sort"></i></a>
                </td>
                <td>1</td>
                <td>12-04-17 <a href="#"><i class="fa fa-pencil text-blue"></i></a></td>
                <td>
                    <a href="#" class="link text-blue ">Link <a href="#"><i class="fa fa-pencil text-blue"></i></a></a>
                </td>
                <td>
                    <span class="label label-warning">Pending</span> <a href="#"><i class="fa fa-pencil text-blue"></i></a>
                </td>
                <td>
                    <input type="checkbox" class="js-switch" checked  data-size="small" data-color="red"/>
                </td>
                <td>
                    <span class="text-red">Заполните обязательные* поля</span>
                </td>
                <td>
                    <a href="#" class="text-green">
                        <i class="fa fa-check margin-r-5"></i>
                        Done
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red">
                        <i class="fa fa-close margin-r-5"></i>
                        Delete
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="tableStatus" class="minimal" >
                    </label>
                </td>
                <td>
                    <a href="#" class="link-black"><i class="fa fa-sort"></i></a>
                </td>
                <td>1</td>
                <td>12-04-17</td>
                <td>
                    <a href="#" class="link text-blue ">Link</a>
                </td>
                <td>
                    <span class="label label-primary">Approved</span>
                </td>
                <td>
                    <input type="checkbox" class="js-switch" checked  data-size="small" data-color="red"/>
                </td>
                <td>
                    <a href="#" class="text-purple">
                        <i class="fa fa-eye margin-r-5"></i>
                        View
                    </a>
                </td>
                <td>
                    <a href="#" class="text-light-blue">
                        <i class="fa fa-pencil margin-r-5"></i>
                        Edit
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red">
                        <i class="fa fa-close margin-r-5"></i>
                        Delete
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="tableStatus" class="minimal" >
                    </label>
                </td>
                <td>
                    <a href="#" class="link-black"><i class="fa fa-sort"></i></a>
                </td>
                <td>1</td>
                <td>12-04-17</td>
                <td>
                    <a href="#" class="link text-blue ">Link</a>
                </td>
                <td>
                    <span class="label label-danger">Denied</span>
                </td>
                <td>
                    <input type="checkbox" class="js-switch" checked  data-size="small" data-color="red"/>
                </td>
                <td>
                    <a href="#" class="text-purple">
                        <i class="fa fa-eye margin-r-5"></i>
                        View
                    </a>
                </td>
                <td>
                    <a href="#" class="text-light-blue">
                        <i class="fa fa-pencil margin-r-5"></i>
                        Edit
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red">
                        <i class="fa fa-close margin-r-5"></i>
                        Delete
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="tableStatus" class="minimal" >
                    </label>
                </td>
                <td>
                    <a href="#" class="text-light-blue" data-original-title="" title="">
                        <i class="fa fa-plus margin-r-5" data-original-title="" title=""></i>
                        Date
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red" data-original-title="" title="">
                        Edit
                    </a>
                </td>
                <td>
                    <a href="#" class="text-light-blue margin-r-5" data-original-title="" title="">
                        <i class="fa fa-plus" data-original-title="" title=""></i>
                        Name
                        <i class="fa fa-stop text-green js-color-pick" data-original-title="" title=""></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="link text-blue ">Link</a>
                </td>
                <td>
                    <a href="#" class="text-light-blue" data-original-title="" title="">
                        <i class="fa fa-plus margin-r-5" data-original-title="" title=""></i>
                        Value*
                    </a>
                </td>
                <td>
                    <input type="text" placeholder="Link">
                </td>
                <td>
                    <span class="text-red" data-original-title="" title="">Неверно введено поле type</span>
                </td>
                <td>
                    <a href="#" class="text-light-blue" data-original-title="" title="">
                        <i class="fa fa-check margin-r-5" data-original-title="" title=""></i>
                        Accept
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red" data-original-title="" title="">
                        <i class="fa fa-close margin-r-5" data-original-title="" title=""></i>
                        Decline
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="tableStatus" class="minimal" >
                    </label>
                </td>
                <td>
                    <a href="#" class="link-black"><i class="fa fa-sort"></i></a>
                </td>
                <td>1</td>
                <td>12-04-17 <a href="#"><i class="fa fa-pencil text-blue"></i></a></td>
                <td>
                    <a href="#" class="link text-blue ">Link <a href="#"><i class="fa fa-pencil text-blue"></i></a></a>
                </td>
                <td>
                    <span class="label label-warning">Pending</span> <a href="#"><i class="fa fa-pencil text-blue"></i></a>
                </td>
                <td>
                    <input type="checkbox" class="js-switch" checked  data-size="small" data-color="red"/>
                </td>
                <td>
                    <span class="text-red">Заполните обязательные* поля</span>
                </td>
                <td>
                    <a href="#" class="text-green">
                        <i class="fa fa-check margin-r-5"></i>
                        Done
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red">
                        <i class="fa fa-close margin-r-5"></i>
                        Delete
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="tableStatus" class="minimal" >
                    </label>
                </td>
                <td>
                    <a href="#" class="link-black"><i class="fa fa-sort"></i></a>
                </td>
                <td>1</td>
                <td>12-04-17</td>
                <td>
                    <a href="#" class="link text-blue ">Link</a>
                </td>
                <td>
                    <span class="label label-primary">Approved</span>
                </td>
                <td>
                    <input type="checkbox" class="js-switch" checked  data-size="small" data-color="red"/>
                </td>
                <td>
                    <a href="#" class="text-purple">
                        <i class="fa fa-eye margin-r-5"></i>
                        View
                    </a>
                </td>
                <td>
                    <a href="#" class="text-light-blue">
                        <i class="fa fa-pencil margin-r-5"></i>
                        Edit
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red">
                        <i class="fa fa-close margin-r-5"></i>
                        Delete
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="tableStatus" class="minimal" >
                    </label>
                </td>
                <td>
                    <a href="#" class="link-black"><i class="fa fa-sort"></i></a>
                </td>
                <td>1</td>
                <td>12-04-17</td>
                <td>
                    <a href="#" class="link text-blue ">Link</a>
                </td>
                <td>
                    <span class="label label-danger">Denied</span>
                </td>
                <td>
                    <input type="checkbox" class="js-switch" checked  data-size="small" data-color="red"/>
                </td>
                <td>
                    <a href="#" class="text-purple">
                        <i class="fa fa-eye margin-r-5"></i>
                        View
                    </a>
                </td>
                <td>
                    <a href="#" class="text-light-blue">
                        <i class="fa fa-pencil margin-r-5"></i>
                        Edit
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red js_deleteRowBtn">
                        <i class="fa fa-close margin-r-5"></i>
                        Delete
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label>
                        <input type="checkbox" name="tableStatus" class="minimal" >
                    </label>
                </td>
                <td>
                    <a href="#" class="text-light-blue" data-original-title="" title="">
                        <i class="fa fa-plus margin-r-5" data-original-title="" title=""></i>
                        Date
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red" data-original-title="" title="">
                        Edit
                    </a>
                </td>
                <td>
                    <a href="#" class="text-light-blue margin-r-5" data-original-title="" title="">
                        <i class="fa fa-plus" data-original-title="" title=""></i>
                        Name
                        <i class="fa fa-stop text-green js-color-pick" data-original-title="" title=""></i>
                    </a>
                </td>
                <td>
                    <a href="#" class="link text-blue ">Link</a>
                </td>
                <td>
                    <a href="#" class="text-light-blue" data-original-title="" title="">
                        <i class="fa fa-plus margin-r-5" data-original-title="" title=""></i>
                        Value*
                    </a>
                </td>
                <td>
                    <input type="text" placeholder="Link">
                </td>
                <td>
                    <span class="text-red" data-original-title="" title="">Неверно введено поле type</span>
                </td>
                <td>
                    <a href="#" class="text-light-blue" data-original-title="" title="">
                        <i class="fa fa-check margin-r-5" data-original-title="" title=""></i>
                        Accept
                    </a>
                </td>
                <td>
                    <a href="#" class="text-red" data-original-title="" title="">
                        <i class="fa fa-close margin-r-5" data-original-title="" title=""></i>
                        Decline
                    </a>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
    <!-- /.box-body -->
</div>{{--</div>--}}

{{--<table class="js_data_table table table-bordered table-hover dataTable"--}}
       {{--data-searching="{{$options['searching']}}" role="grid"--}}
       {{--@if($options['paging'])data-page-length='{{$options['paging']}}' @else data-paging="false" @endif aria-describedby="example2_info">--}}
    {{--<thead>--}}
    {{--<tr role="row">--}}
    {{--<th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="ID">ID</th>--}}
    {{--<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Категория">Категория</th>--}}
    {{--<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Название">Название</th>--}}
    {{--<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Цена">Цена</th>--}}
    {{--<th class="text-center">Редактировать</th>--}}
    {{--<th class="text-center">Удалить</th>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--@foreach($titles as $title)--}}
            {{--@if(gettype($title) === 'array')--}}
                {{--<th>{{$title['title']   , ''}}</th>--}}
            {{--@else--}}
                {{--<th>{{$title, ''}}</th>--}}
            {{--@endif--}}
        {{--@endforeach--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--@foreach ($items as $item)--}}
        {{--<tr role="row" class="even products-row js_product_{{$item['id']}}">--}}
            {{--@foreach($titles as $key => $title)--}}
                {{--<td>--}}
                    {{--@if(isset($title['link_key']))--}}
                        {{--<a href="{{$item[$key]['link']}}">{{$item[$key]['value']}}</a>--}}
                    {{--@else--}}
                        {{--{{$item[$key]}}--}}
                    {{--@endif--}}
                {{--</td>--}}
            {{--@endforeach--}}
            {{--<td class="sorting_1">{!! $item['id'] !!}</td>--}}
            {{--<td><a href="{{url('/dashboard/ecommerce/category/' . $item['category']['id'] . '/edit')}}" >{!! $item['category']['name'] !!}</a></td>--}}
            {{--<td><a href="{{url('/dashboard/ecommerce/product/' . $item['id'] . '/edit')}}" >{!! $item['name'] !!}</a></td>--}}
            {{--<td>{!! $item['price'] !!}</td>--}}
            {{--<td class="text-center">--}}
            {{--<a href="{{url('/dashboard/ecommerce/product/' . $item['id'] . '/edit')}}" class="products-edit btn btn-info btn-flat"><i class="fa fa-pencil-square-o"></i></a>--}}
            {{--</td>--}}
            {{--<td class="text-center">--}}
            {{--<button type="button" data-item=".js_product_{{$item['id']}}" data-method="DELETE" data-request="{{url('dashboard/ecommerce/product/' . $item['id'])}}" class="js_delete products-delete btn btn-danger btn-flat"><i class="fa fa-trash"></i></button>--}}
            {{--</td>--}}
        {{--</tr>--}}
    {{--@endforeach--}}
    {{--</tbody>--}}
{{--</table>--}}