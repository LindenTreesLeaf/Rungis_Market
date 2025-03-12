<div class="modal fade modal-content-border-color" id={{$id}} tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header primary-bg-subtle">
                <h5 class="modal-title" id="modal_title">{{$title}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modal_body">
                {{$slot}}
            </div>
        </div>
    </div>
</div>