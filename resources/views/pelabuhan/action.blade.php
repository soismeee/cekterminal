<div class="btn-group">
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalhapusPelabuhan-{{ $pelabuhan->id }}"><i class="icon-delete feather"></i></button>
</div>

<div class="modal fade hapusterminal" id="modalhapusPelabuhan-{{ $pelabuhan->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Hapus Terminal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Apakah anda ingin menghapus data ini ?
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-primary" id="delete-terminal" value="{{ $pelabuhan->id }}">Ya, Hapus</button>
            </div>
        </div>
    </div>
</div>