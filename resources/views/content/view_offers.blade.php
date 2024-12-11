    <style>
        .select2-container .select2-selection--single {
            height: 38px; /* Kutu yüksekliği */
            display: flex; /* Flexbox kullanımı */
            align-items: center; /* Dikey olarak ortala */
            justify-content: center; /* Yatay olarak ortala */
        }

        /* Metin hizalamasını ve varsayılan satır yüksekliğini sıfırlayın */
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: normal; /* Varsayılan satır yüksekliğini kaldır */
            text-align: left; /* Metni yatay olarak ortala */
            font-size: 14px; /* Gerekirse font boyutunu ayarlayın */
            padding: 0; /* Varsayılan padding'i sıfırla */
        }
        select:required:invalid {
        color: gray;
        }
        option[value=""][disabled] {
        display: none;
        }
        option {
        color: black;
        }
        #createNewCari {
            display: flex;
            align-items: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2>{{$title}}</h2>
                    <div class="d-flex flex-row-reverse">
                            <button
                            class="btn btn-sm btn-pill btn-outline-primary font-weight-bolder" id="createNewOffer"><i
                                class="fas fa-plus"></i>Ekle
                            </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" id="tableOffer">
                                <thead class="font-weight-bold text-center">
                                    <tr>
                                        {{-- <th>No.</th> --}}
                                        <th>Fiş Numarası</th>
                                        <th>Belge Numarası</th>
                                        <th>Müşteri</th>
                                        <th>Tarih</th>
                                        <th>Durumu</th>
                                        <th>Açıklama 1</th>
                                        <th style="width:90px;">İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
    @push('scripts')
    <script>
        $(document).ready(function () {
              // csrf token
              $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // success alert
            function swal_success() {
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Başarıyla kaydedildi.',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
            // error alert
            function swal_error() {
                Swal.fire({
                    position: 'centered',
                    icon: 'error',
                    title: 'Bir şeyler ters gitti !',
                    showConfirmButton: true,
                })
            }
            
            // table serverside
            var table = $('#tableOffer').DataTable({
                processing: false,
                serverSide: true,
                ordering: false,
                dom: 'Bfrtip',
                buttons: [  
                    'copy', 'excel', 'pdf'
                ],
                ajax: "{{ route('offers.index') }}", // Doğru rotaya yönlendiriliyor
                columns: [
                    { data: 'receiptNo', name: 'receiptNo' },
                    { data: 'documentNo', name: 'documentNo' },
                    { data: 'authorizedCustomer', name: 'authorizedCustomer' },
                    { data: 'date', name: 'date'},
                    { data: 'confirmation', name: 'confirmation'},
                    { data: 'description1', name: 'description1'},
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });


          
            // initialize btn add
            $('#createNewOffer').click(function () {
                window.location.href = "{{ route('offer.add') }}";
            });
            
            // initialize btn edit
            $('body').on('click', '.editOffer', function () {
                var offer_id = $(this).data('id');
                // offer.edit rotasına yönlendirme
                window.location.href = "{{ route('offer.edit', ':id') }}".replace(':id', offer_id);
            });
            
            
            // initialize btn delete
            $('body').on('click', '.deleteOffer', function () {
                var offer_id = $(this).data("id");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "DELETE",
                            url: "{{route('offers.store')}}" + '/' + offer_id,
                            success: function (data) {
                                swal_success();
                                table.draw();
                            },
                            error: function (data) {
                                swal_error();
                            }
                        });
                    }
                })
            });
            // statusing
    });
    </script>
    @endpush
