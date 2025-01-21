document.addEventListener('DOMContentLoaded', function() {
    document.querySelector("#delet-form").addEventListener('submit', function(e) {
        if (!confirm('Yakin ingin menghapus data ini?')) {
            e.preventDefault();
        }
    });
});
