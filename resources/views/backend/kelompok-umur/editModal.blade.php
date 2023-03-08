<div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('kelompok-umur.update',$item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                </div>
                <div class="modal-body">
                    <div class="col-6 mb-3">
                        <label for="virus" class="form-label">kelompok Umur<small class="text-danger"> *</small>
                        </label>
                        <input type="text" name="kelompok_umur" id="kelompok_umur" value="{{ $item->kelompok_umur }}"
                            class="form-control @error('kelompok_umur') is-invalid @enderror"
                            placeholder="Masukkan Kelompok Umur">
                        @error('kelompok_umur')
                        <span class="invalid-feedback message">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type=" submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
