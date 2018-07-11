<li class="{{$item['class']}}  @if(isset($item['sub_items']) && count($item['sub_items'])) dropdown @endif">
    <a @if(isset($item['sub_items']) && count($item['sub_items'])) class="dropdown-toggle" data-toggle="dropdown" @endif
        @if($item['link']) href="{{url($item['link'])}}" @else href="#" @endif
    >
        <i class="fa {{$item['icon']}}"></i> <span>{{$item['text']}}</span>
    </a>

    @if(isset($item['sub_items']) && count($item['sub_items']))
        <ul class="dropdown-menu">
            @each('dashboard::components.menus.navbar_menu.item', $item['sub_items'], 'item')
        </ul>
    @endif
</li>