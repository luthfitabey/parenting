<a href="{{ route('balita.edit', $model) }}" class="btn btn-warning btn-sm">Edit</a>
<button type="button" class="btn btn-danger btn-sm delete-confirm" data-href="{{ route('balita.destroy', $model) }}">Hapus</button>

<form id="delete-form" action="" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $('button[href]').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');

        Swal.fire({
            title: 'Hapus Data Ini?',
            text: "Perhatian! Data yang sudah dihapus tidak bisa dikembalikan!",
            icon: 'warning',
        
