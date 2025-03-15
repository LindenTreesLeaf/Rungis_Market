<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-8">
            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="card-title font-semibold mb-4 cardtitleborder">
                            @isset($title)
                                {{$title}}
                            @endisset
                        </div>
                    </div>
                    @isset($content)
                        {{$content}}
                    @endisset
                </div>
            </div>
        </div>
        <div class="col"></div>
    </div>
</div>