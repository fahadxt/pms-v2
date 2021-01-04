<div class="alerts">
    @if(count($errors)>0)
    <div class="ui error message">
        <i onclick="messageClose()" class="close icon"></i>
        <div class="header">
            {{__('There were some errors with your submission')}}
        </div>
        <ul class="list">
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

</div>