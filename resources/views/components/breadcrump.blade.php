<div class="clearfix">
    <nav aria-label="breadcrumb" class="float-right">
        <ol class="breadcrumb">
            @foreach($items as $title=>$link)
                @if($title == "current")
                    @continue
                @endif

                @php
                    if(Lang::has('messages.'.$title, 'fa'))
                        $t = __('messages.'.$title);
                    else
                        $t = $title;
                @endphp

                <li class="breadcrumb-item"><a href="{{ $link }}"> {{ $t }} </a></li>

            @endforeach
            <li class="breadcrumb-item active" aria-current="page">{{ $items["current"] ?? "" }}</li>
        </ol>
    </nav>
    <div class="float-left">{{ $slot }}</div>
</div>
