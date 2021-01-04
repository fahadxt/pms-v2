<div class="alerts">


    @if (session()->has('message'))
        <div class="ui positive message">
            <i onclick="messageClose()" class="close icon"></i>
            <div class="header">
                {{ session('message') }}
            </div>
        </div>
    @endif


</div>