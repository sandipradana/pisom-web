@foreach($items as $item)
<li @if($item->hasChildren()) class="nav-item has-treeview" @else class="nav-item" @endif>
    <a href="{!! $item->url() !!}" class="nav-link">
        <i class="nav-icon fas fa-{{ $item->icon }}"></i>
        <p>
            {!! $item->title !!}
            @if($item->hasChildren())
            <i class="fas fa-angle-left right"></i>
            @endif
        </p>
    </a>
    @if($item->hasChildren())
    <ul class="nav nav-treeview" style="display: none;">
        @include('staff.menu-main-dropdown', ['items' => $item->children()])
    </ul>
    @endif
</li>
@endforeach