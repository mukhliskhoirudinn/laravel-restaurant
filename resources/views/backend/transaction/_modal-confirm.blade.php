<!-- Modal -->
<div class="modal fade" id="confirmModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fas fa-check"></i> Confirm
                    Transactions</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="confirmForm">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-select @error('status') is-invalid @enderror">
                            <option value="">-- select status --</option>
                            <option value="success">Success</option>
                            <option value="failed">Failed</option>
                        </select>

                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times"></i>
                    Cancel</button>
                <button type="submit" form="confirmForm" class="btn btn-secondary"><i class="fas fa-save"></i>
                    Submit</button>
            </div>
        </div>
    </div>
</div>
