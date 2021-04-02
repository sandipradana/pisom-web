@foreach($items as $item)
<li class="nav-item">
    <a href="{!! $item->url() !!}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>{!! $item->title !!}</p>
    </a>
</li>
@endforeach