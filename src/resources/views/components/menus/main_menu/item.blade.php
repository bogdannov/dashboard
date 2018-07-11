
<li class="{{$item['class']}}  @isset($item['sub_items']) treeview @endisset @if($item['open']) menu-open @endif @if($item['active']) active @endif">
    <a href="{{url($item['link'])}}">
        <i class="fa {{$item['icon']}}"></i> <span>{{$item['text']}}</span>
        @if(isset($item['sub_items']) && count($item['sub_items']) )
        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
        @endif
    </a>

    @if(isset($item['sub_items']) && count($item['sub_items']))
        <ul class="treeview-menu" @if($item['open']) style="display: block;" @endif>

            @each('dashboard::components.menus.main_menu.item', $item['sub_items'], 'item')
        </ul>
    @endif
</li>