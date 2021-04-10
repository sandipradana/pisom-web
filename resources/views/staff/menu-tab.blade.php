@foreach($items as $item)
<li class="nav-item">
    <a href="{!! $item->url() !!}" class="nav-link @if($item->isActive) active @endif">
        {!! $item->title !!}
    </a>
</li>
@endforeach