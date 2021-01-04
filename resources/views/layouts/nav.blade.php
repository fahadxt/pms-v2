<section class="navigation" wire:ignore.self>
    <div class="nav-container">
        <div class="user-nav">
            @auth
            <div class="ui inline header2 dropdown">
                <div class="text ">
                    <img class="ui  circular image" src="{{ asset('storage/'. auth()->user()->avatar ) }}">
                    {{auth()->user()->name}}
                </div>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <div class="item">
                        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            تسجيل خروج
                        </a>

                    </div>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            @endauth
        </div>
        <div class="brand">
            <a href="/">{{ config('app.name', 'بوابة إدارة المشاريع') }}</a>
        </div>

    </div>
</section>
<div class="ui secondary pointing menu">
    @foreach($items as $menu_item)
    @if(Request::url() == 'http://127.0.0.1:8000')
    <a href="{{ $menu_item->link() }}"  
        class="item {{  ( request()->is($menu_item->link()) ) ? "active" : "" }}">
        {{ __($menu_item->title) }}
    </a>
    @else
    <a href="{{ $menu_item->link() }}"
        class="item {{ Request::url() == 'http://127.0.0.1:8000' . $menu_item->link() ? "active" : "" }}">
        {{ __($menu_item->title) }}
    </a>
    @endif

    @endforeach
</div>