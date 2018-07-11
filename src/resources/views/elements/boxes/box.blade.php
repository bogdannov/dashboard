<div class="box @if($solid) box-solid @endif box-{{$color_type}}">
    @if($header_available)
        <div class="box-header with-border">
            <h3 class="box-title">{{$box_title}}</h3>
            <div class="box-tools pull-right">
                {!! $box_tools !!}
            </div>
            <!-- /.box-tools -->
        </div>
    @endif
<!-- /.box-header -->
    <div class="box-body">
        {!! $box_body !!}
    </div>
    <!-- /.box-body -->
    @if($footer_available)
        <div class="box-footer">
            {!! $box_footer !!}
        </div>
        <!-- box-footer -->
    @endif
</div>
<!-- /.box -->