<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Check if SweetAlert2 is loaded
    if (typeof Swal === 'undefined') {
        console.error('SweetAlert2 is not loaded');
        return;
    }

    // Check if CSRF token exists
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        console.error('CSRF token meta tag not found');
        return;
    }

    // Delete confirmation with Sweet Alert
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            console.log('Delete button clicked'); // Debug log
            
            const itemId = this.getAttribute('data-id');
            const itemName = this.getAttribute('data-name');
            
            console.log('Item ID:', itemId, 'Item Name:', itemName); // Debug log
            
            Swal.fire({
                title: 'Are you sure?',
                text: `You want to delete "${itemName}"? This action cannot be undone!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                customClass: {
                    container: 'rounded-lg',
                    popup: 'rounded-lg',
                    actions: 'rounded-lg'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform delete action
                    fetch(`/inventory/${itemId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'Item has been deleted successfully.',
                                icon: 'success',
                                customClass: {
                                    container: 'rounded-lg',
                                    popup: 'rounded-lg'
                                }
                            }).then(() => {
                                location.reload();
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Delete error:', error);
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong. Please try again.',
                            icon: 'error',
                            customClass: {
                                container: 'rounded-lg',
                                popup: 'rounded-lg'
                            }
                        });
                    });
                }
            });
        });
    });
});
</script>
