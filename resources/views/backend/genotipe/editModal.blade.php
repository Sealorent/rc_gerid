<div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('genotipe.update',$item->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        {{-- <div class="col-6 mb-2">
                            <label for="genotipe" class="form-label">Virus<small class="text-danger">*</small>
                            </label>
                            <select name="kode_virus" id="kode_virus"
                                class="form-control @error('kode_virus') is-invalid @enderror" required>
                                @foreach ($virus as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_virus }}</option>
                                @endforeach
                            </select>
                            @error('kode_virus')
                            <span class="invalid-feedback message">
                                {{ $message }}
                            </span>
                            @enderror
                        </div> --}}
                        <div class="col-6 mb-3">
                            <label for="virus" class="form-label">Kode Genotipe<small class="text-danger"> *</small>
                            </label>
                            <input type="text" name="kode_genotipe" id="kode_genotipe"
                                value="{{ $item->kode_genotipe }}"
                                class="form-control @error('kode_genotipe') is-invalid @enderror"
                                placeholder="Masukkan Nama Virus">
                            @error('kode_genotipe')
                            <span class="invalid-feedback message">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                        <div class="col-6 mb-2">
                            <label for="genotipe" class="form-label">Virus<small class="text-danger">*</small>
                            </label>
                            <select name="kode_virus" id="kode_virus"
                                class="form-control @error('kode_virus') is-invalid @enderror" required>
                                @foreach ($virus as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_virus }}</option>
                                @endforeach
                            </select>
                            @error('kode_virus')
                            <span class="invalid-feedback message">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
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
