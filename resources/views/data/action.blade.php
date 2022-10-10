<div class="btn-group">
    <button type="button" class="btn btn-warning" data-bs-toggle="modal" id="edit-terminal" value="{{ $datainput->id }}"><i class="icon-edit feather"></i></button>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalhapusData-{{ $datainput->id }}"><i class="icon-delete feather"></i></button>
</div>

<div class="modal fade hapusterminal" id="modalhapusData-{{ $datainput->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Hapus Terminal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Apakah anda ingin menghapus terminal <strong>{{ $datainput->id }}</strong> ?
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" id="delete-terminal" value="{{ $datainput->id }}">Ya, Hapus</button>
            </div>
        </div>
    </div>
</div>