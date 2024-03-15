<div class="modal fade" data-backdrop="static" data-keyboard="false" id="{{ $modalId }}" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            @if ($type === 'delete')
                <div class="modal-header">
                    <h5 class="modal-title text-danger fw-bold">Delete Confirmation</h5>
                    <span class="pull-right">
                        <img class="spinner" src="{{ asset('img/spinner.gif') }}">
                    </span>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this {{ $label }}?</p>
                </div>
                <div class="modal-footer">
                    <button id="close-button" data-bs-dismiss="modal" class="btn btn-white shadow"><i
                            class="far fa-window-close"></i> Close </button>
                    <button id="{{ $buttonId }}" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                        Delete </button>
                </div>
            @endif
        </div>
    </div>
</div>
