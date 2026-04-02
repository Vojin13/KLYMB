<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.body.addEventListener('click', function (event) {
            const button = event.target.closest('.add-to-cart-btn');

            if (button) {
                event.preventDefault();

                const productId = button.getAttribute('data-id');
                const originalContent = button.innerHTML;

                button.disabled = true;
                const spinner = `<svg class="animate-spin h-4 w-4 mr-2 border-2 border-white border-t-transparent rounded-full inline-block" viewBox="0 0 24 24"></svg>`;
                button.innerHTML = spinner + " ADDING...";

                fetch("{{ route('cart.store') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        product_id: productId,
                        quantity: 1
                    })
                })
                    .then(response => {
                        if (response.status === 401 || response.status === 403) {
                            throw new Error('UNAUTHORIZED');
                        }
                        if (!response.ok) {
                            throw new Error('NETWORK_ERROR');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            const cartCounter = document.getElementById('cart-count');
                            if (cartCounter && data.cartCount !== undefined) {
                                cartCounter.innerText = data.cartCount;

                                cartCounter.classList.add('scale-125');
                                setTimeout(() => cartCounter.classList.remove('scale-125'), 200);
                            }

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 2500,
                                timerProgressBar: true,
                                background: '#1A252F',
                                color: '#fff',
                                iconColor: '#ef4444',
                            });

                            Toast.fire({
                                icon: 'success',
                                title: 'GEAR ADDED TO PACK'
                            });
                        }
                    })
                    .catch(error => {
                        if (error.message === 'UNAUTHORIZED') {
                            Swal.fire({
                                title: 'LOGIN REQUIRED',
                                text: 'You must be logged in to add gear to your cart.',
                                icon: 'warning',
                                confirmButtonColor: '#ef4444',
                                background: '#fff',
                                confirmButtonText: 'SIGN IN',
                                textTransform: 'uppercase'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href = "{{ route('auth.login') }}";
                                }
                            });
                        } else {
                            console.error('Error:', error);
                        }
                    })
                    .finally(() => {
                        button.disabled = false;
                        button.innerHTML = originalContent;
                    });
            }
        });
    });
</script>
